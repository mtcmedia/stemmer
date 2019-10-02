<?php
namespace Mtc\Stemmer;

use Mtc\Stemmer\Cleaner;
use PHPUnit\Framework\TestCase;

/**
 * 
 * @author William Cameron
 * @package Mtc\Stemmer
 */
class CleanerTest extends TestCase
{
    public function testParseDoesntChangeCleanString(): void
    {
        $result = Cleaner::parse('A clean string');
        $this->assertEquals('A clean string', $result);
    }

    public function testParseRemovesAllSymbols(): void
    {
        $result = Cleaner::parse('A string with some !"$%^&* symbols');
        $this->assertEquals('A string with some         symbols', $result);
        
    }
    public function testParseDoesntRemoveGBPSymbol(): void
    {
        $result = Cleaner::parse('£19.99');
        $this->assertEquals('£19 99', $result);
        
    }
}