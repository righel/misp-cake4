<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class XmlOutputHelper extends Helper
{
    public function recursiveEcho($array)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                if (empty($v)) echo '<' . $k . '/>';
                else {
                    foreach ($v as $element) {
                        echo '<' . $k . '>';
                        $this->recursiveEcho($element);
                        echo '</' . $k . '>';
                    }
                }
            } else {
                if ($v === false) $v = 0;
                if ($v === "" || $v === null) echo '<' . $k . '/>';
                else {
                    echo '<' . $k . '>' . $v . '</' . $k . '>';
                }
            }
        }
    }
}
