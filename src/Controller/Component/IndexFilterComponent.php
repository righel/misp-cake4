<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\ServerRequest;

/**
 * Get filter parameters from index searches
 */

class IndexFilterComponent extends Component
{
    /** @var Controller */
    public $Controller;
    public $isRest = null;

    /** @var ServerRequest */
    private $request;

    public function initialize(array $config): void
    {
        $this->Controller = $this->getController();
        $this->request = $config['request'];
    }

    // generic function to standardise on the collection of parameters. Accepts posted request objects, url params, named url params
    public function harvestParameters($paramArray, &$exception = array())
    {
        $data = array();
        if (!empty($this->request->is('post'))) {
            if (empty($this->request->data)) {
                $exception = $this->Controller->RestResponse->throwException(
                    400,
                    __('Either specify the search terms in the url, or POST a json with the filter parameters.'),
                    '/' . $this->request->getParam('controller') . '/' . $this->Controller->action
                );
                return false;
            } else {
                if (isset($this->request->data['request'])) {
                    $data = $this->request->data['request'];
                } else {
                    $data = $this->request->data;
                }
            }
        }
        if (!empty($paramArray)) {
            foreach ($paramArray as $p) {
                if (
                    isset($options['ordered_url_params'][$p]) &&
                    (!in_array(strtolower((string)$options['ordered_url_params'][$p]), array('null', '0', false, 'false', null)))
                ) {
                    $data[$p] = $options['ordered_url_params'][$p];
                    $data[$p] = str_replace(';', ':', $data[$p]);
                }
                if (isset($this->Controller->params['named'][$p])) {
                    $data[$p] = str_replace(';', ':', $this->Controller->params['named'][$p]);
                }
            }
        }
        foreach ($data as $k => $v) {
            if (!is_array($data[$k])) {
                $data[$k] = trim($data[$k]);
                if (strpos($data[$k], '||')) {
                    $data[$k] = explode('||', $data[$k]);
                }
            }
        }
        if (!empty($options['additional_delimiters'])) {
            if (!is_array($options['additional_delimiters'])) {
                $options['additional_delimiters'] = array($options['additional_delimiters']);
            }
            foreach ($data as $k => $v) {
                $found = false;
                foreach ($options['additional_delimiters'] as $delim) {
                    if (strpos($v, $delim) !== false) {
                        $found = true;
                    }
                }
                if ($found) {
                    $data[$k] = explode($options['additional_delimiters'][0], str_replace($options['additional_delimiters'], $options['additional_delimiters'][0], $v));
                    foreach ($data[$k] as $k2 => $value) {
                        $data[$k][$k2] = trim($data[$k][$k2]);
                    }
                }
            }
        }
        // TODO: [cakephp 2.x -> 4.x migration] remove? should use $this->request->getParam()/getQuery()
        // $this->Controller->set('passedArgs', json_encode($this->Controller->passedArgs));
        return $data;
    }

    public function isRest()
    {
        // This method is surprisingly slow and called many times for one request, so it make sense to cache the result.
        if ($this->isRest !== null) {
            return $this->isRest;
        }
        $api = $this->isApiFunction($this->request->getParam('controller'), $this->request->getParam('action'));
        if (isset($this->Controller->RequestHandler) && ($api || $this->isJson())) {
            $this->isRest = true;
            return true;
        } else {
            $this->isRest = false;
            return false;
        }
    }

    public function isJson()
    {
        return $this->request->getHeader('Accept') === 'application/json' || $this->Controller->RequestHandler->prefers() === 'json';
    }

    /**
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public function isApiFunction($controller, $action)
    {
        return isset($this->Controller->automationArray[$controller]) && in_array($action, $this->Controller->automationArray[$controller], true);
    }
}
