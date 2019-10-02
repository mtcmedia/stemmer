<?php

namespace Mtc\Stemmer;

use Mtc\Stemmer\Stemmer;
use PHPUnit\Framework\TestCase;

/**
 * @author William Cameron
 * @package Mtc\Stemmer
 */
class StemmerTest extends TestCase
{
    public function testTrue(){
        $this->assertTrue(true);
    }

    public function testMultiStemReturnsHelloWorld() {
        $this->assertEquals(['hello', 'world'], Stemmer::multiStem("Hello World!"));
    }

    public function testMultiStemReturnsEmptyArrayForBlankString() {
        $this->assertEquals([], Stemmer::multiStem(""));
    }

    public function testMultiStemReturnsSingularOfPlurals() {
        $this->assertEquals(['singular', 'of', 'plural'], Stemmer::multiStem("Singulars of Plurals"));
    }

    /**
     * @dataProvider singularPluralMap
     */
    public function testStemStemsAPluralWordToSingular($singular, $plural) {
        $this->assertEquals($singular, Stemmer::stem($plural));
    }
        
    public function testStemWithInvalidLanguagePassesWordThru() {
        $this->assertEquals("composers", Stemmer::stem("composers", "INVALIDLANG"));
    }


    /**
     * DataProvider and helper method for testing multiple
     * singular to plural words in tests.
     */
    public function singularPluralMap(){
        return [
            ["", ""],
            ["shoe", "shoes"],
            ["plural", "plurals"],
            ["window", "windows"],
            ["item", "items"]
        ];
    }
}