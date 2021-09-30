<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class MarkdownHelper extends Helper
{
    /**
     * Converts markdown formatted string to text
     * @param string $string
     * @return string
     */
    public function toText($string)
    {
        $string = $this->cleanup($string);
        // Remove markdown style links
        $string = preg_replace('/\[([^]]+)]\([^)]+\)/', '$1', $string);
        // Remove citations
        $string = preg_replace('/\(Citation: [^)]+\)/', '', $string);
        return $string;
    }

    public function cleanup($string)
    {
        // Remove <code> blocks and replace by ticks
        $string = preg_replace('/<code>([^<]+)<\/code>/', '`$1`', $string);
        return $string;
    }
}
