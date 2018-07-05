<?php

require 'Bottle.php';
use PHPUnit\Framework\TestCase;

class BottleTest extends TestCase
{
    public $calculator;

    protected function setUp()
    {
        $this->bottle = new Bottle();
    }

    protected function tearDown()
    {
        $this->bottle = NULL;
    }

    # BAD: meaning less name
    # BAD: try to test everything at once
    # BAD: Hard to add another test case
    public function testTheFirstVerse()
    {
        $expected = '99 bottles of beer on the wall, ';
        $expected .= '99 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '98 bottles of beer on the wall.' . ' </br>';
        # BAD: this assert produce meaningless failure messsage
        $result = $this->bottle->verse(99);
        $this->assertEquals($expected, $result); # Expected false to be truthy.
    }

    public function testAnotherVerse()
    {
        $expected = '3 bottles of beer on the wall, ';
        $expected .= '3 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '2 bottles of beer on the wall.' . ' </br>';
        $result = $this->bottle->verse(3);
        $this->assertEquals($expected, $result);
    }

    public function testVerse2()
    {
        $expected = '2 bottles of beer on the wall, ';
        $expected .= '2 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '1 bottle of beer on the wall.' . ' </br>';
        $result = $this->bottle->verse(2);
        $this->assertEquals($expected, $result);
    }

    public function testVerse1()
    {
        $expected = '1 bottle of beer on the wall, ';
        $expected .= '1 bottle of beer.' . ' </br>';
        $expected .= 'Take it down and pass it around, ';
        $expected .= 'no more bottles of beer on the wall.' . ' </br>';
        $result = $this->bottle->verse(1);
        $this->assertEquals($expected, $result);
    }

    public function testVerse0()
    {
        $expected = 'No more bottles of beer on the wall, ';
        $expected .= 'no more bottles of beer.' . ' </br>';
        $expected .= 'Go to the store and buy some more, ';
        $expected .= '99 bottles of beer on the wall.' . ' </br>';
        $result = $this->bottle->verse(0);
        $this->assertEquals($expected, $result);
    }

    public function testACoupleVerses()
    {
        $expected = '99 bottles of beer on the wall, ';
        $expected .= '99 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '98 bottles of beer on the wall.' . ' </br></br>';
        $expected .= '98 bottles of beer on the wall, ';
        $expected .= '98 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '97 bottles of beer on the wall.' . ' </br></br>';
        $result = $this->bottle->verses(99, 98);
        $this->assertEquals($expected, $result);
    }

    public function testAFewVerses()
    {
        $expected = '2 bottles of beer on the wall, ';
        $expected .= '2 bottles of beer.' . ' </br>';
        $expected .= 'Take one down and pass it around, ';
        $expected .= '1 bottle of beer on the wall.' . ' </br></br>';
        $expected .= '1 bottle of beer on the wall, ';
        $expected .= '1 bottle of beer.' . ' </br>';
        $expected .= 'Take it down and pass it around, ';
        $expected .= 'no more bottles of beer on the wall.' . ' </br></br>';
        $expected .= 'No more bottles of beer on the wall, ';
        $expected .= 'no more bottles of beer.' . ' </br>';
        $expected .= 'Go to the store and buy some more, ';
        $expected .= '99 bottles of beer on the wall.' . ' </br></br>';
        $result = $this->bottle->verses(2, 0);
        $this->assertEquals($expected, $result);
    }
}
