<?php

namespace Mtc\Stemmer;


/**
 * Class Stemmer
 *
 * @package Mtc\Stemmer
 */
class Stemmer
{
    /**
     * Stem a sentence
     *
     * @param string $sentence
     * @param string $language
     * @return array
     */
    public static function multiStem($sentence = '', $language = 'english'): array
    {
        $words = self::getWords($sentence);
        $stemmed_words = [];

        foreach ($words as $word) {
            if ($stemmed_word = self::stem($word, $language)) {
                $stemmed_word = Cleaner::parse($stemmed_word);
                if ($stemmed_word != '') {
                    $stemmed_words[] = $stemmed_word;
                }
            }
        }
        return array_unique($stemmed_words);
    }

    /**
     * Stem the word
     *
     * @param string $word
     * @param string $language
     * @return string
     * @throws \Exception
     */
    public static function stem($word = '', $language = 'english')
    {
        $class_name = 'Wamania\\Snowball\\Stemmer\\' . ucfirst($language);
        if (class_exists($class_name)) {
            return (new $class_name)->stem(strtolower($word));
        }
        return strtolower($word);
    }

    /**
     * Split text into words
     *
     * @param $sentence
     * @return array|array[]|false|string[]
     */
    protected static function getWords($sentence)
    {
        $words = $sentence;
        if (empty($words)) {
            return [];
        }

        return preg_split("/[\s,]+/", trim($words));
    }
}
