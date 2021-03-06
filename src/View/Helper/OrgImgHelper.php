<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

// Helper to retrieve org images with the given parameters
class OrgImgHelper extends Helper
{
    const IMG_PATH = APP . WWW_ROOT . DS . 'img' . DS . 'orgs' . DS;

    public function getNameWithImg(array $organisation, $link = null)
    {
        if (!isset($organisation['Organisation'])) {
            return '';
        }

        $orgImgName = $this->findOrgImage($organisation['Organisation']);
        if (!$link) {
            $link = '/organisations/view/' . (empty($organisation['Organisation']['id']) ? h($organisation['Organisation']['name']) : h($organisation['Organisation']['id']));
        }
        if ($orgImgName) {
            $orgImgUrl = '/img/orgs/' . $orgImgName;
            return sprintf('<a href="%s" style="background-image: url(\'%s\')" class="orgImg">%s</a>', $link, $orgImgUrl, h($organisation['Organisation']['name']));
        } else {
            return sprintf('<a href="%s">%s</a>', $link, h($organisation['Organisation']['name']));
        }
    }

    /**
     * @param array $organisation
     * @param int $size
     * @param bool $withLink
     * @return string
     */
    public function getOrgLogo(array $organisation, $size, $withLink = true)
    {
        if (isset($organisation['Organisation'])) {
            $options = $organisation['Organisation'];
        } else {
            $options = $organisation;
        }
        $options['size'] = $size;
        return $this->getOrgImg($options, true, !$withLink);
    }

    /**
     * @deprecated
     */
    public function getOrgImg($options, $returnData = false, $raw = false)
    {
        $orgImgName = $this->findOrgImage($options);
        if ($orgImgName) {
            $size = !empty($options['size']) ? $options['size'] : 48;
            $result = sprintf(
                '<img src="/img/orgs/%s" title="%s" width="%s" height="%s">',
                $orgImgName,
                isset($options['name']) ? h($options['name']) : h($options['id']),
                (int)$size,
                (int)$size
            );

            if (!$raw && !empty($options['id'])) {
                $result = sprintf(
                    '<a href="/organisations/view/%s">%s</a>',
                    empty($options['id']) ? h($options['name']) : h($options['id']),
                    $result
                );
            }
        } else {
            if ($raw) {
                $result = sprintf(
                    '<span class="welcome">%s</span>',
                    h($options['name'])
                );
            } else {
                $result = sprintf(
                    '<a href="/organisations/view/%s"><span class="welcome">%s</span></a>',
                    empty($options['id']) ? h($options['name']) : h($options['id']),
                    h($options['name'])
                );
            }
        }
        if ($returnData) {
            return $result;
        } else {
            echo $result;
        }
    }

    /**
     * @param array $options
     * @return string|null
     */
    private function findOrgImage(array $options)
    {
        foreach (['id', 'name', 'uuid'] as $field) {
            if (isset($options[$field])) {
                foreach (['png', 'svg'] as $extensions) {
                    if (file_exists(self::IMG_PATH . $options[$field] . '.' . $extensions)) {
                        return $options[$field] . '.' . $extensions;
                    }
                }
            }
        }
        return null;
    }
}
