<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class TimeHelper extends Helper
{
    public function time($time)
    {
        if (empty($time)) {
            return '';
        }
        if (is_numeric($time)) {
            $time = date('Y-m-d H:i:s', $time);
        }

        $time = h($time);
        return '<time>' . $time . '</time>';
    }
}
