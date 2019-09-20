<?php

namespace Mtc\Stemmer;

/**
 * Class Cleaner
 *
 * Clean text from specific characters
 *
 * @package Mtc\Stemmer
 */
class Cleaner
{
    /**
     * Characters that should be removed from a word
     *
     * @var array
     */
    protected static $symbols = [
        '/',
        '\\',
        '\'',
        '"',
        ',',
        '.',
        '<',
        '>',
        '?',
        ';',
        ':',
        '[',
        ']',
        '{',
        '}',
        '|',
        '=',
        '+',
        '-',
        '_',
        ')',
        '(',
        '*',
        '&',
        '^',
        '%',
        '$',
        '#',
        '@',
        '!',
        '~',
        '`'
    ];

    /**
     * Remove unwanted characters from string
     *
     * @param $string
     * @return string
     */
    public static function parse($string)
    {
        return trim(str_replace(self::$symbols, ' ', ' ' . $string . ' '));
    }
}
