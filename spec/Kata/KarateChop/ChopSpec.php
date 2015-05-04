<?php

namespace spec\Kata\KarateChop;

use Exception;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChopSpec extends ObjectBehavior
{
    private $integers = [1, 2, 3, 5, 7, 9, 11, 12, 13];

    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\KarateChop\Chop');
    }

    function it_checks_against_a_empty_array()
    {
        $this->shouldThrow(new InvalidArgumentException)
             ->during('chop', [-1, []]);
    }

    function it_checks_against_integers_that_do_not_exist()
    {
        $this->shouldThrow(new Exception('The provided integer is not found.'))
             ->during('chop', [1, [3]]);
    }

    function it_finds_the_index_for_1_in_the_array()
    {
        $this->chop(1, $this->integers)->shouldReturn(0);
    }

    function it_finds_the_index_for_2_in_the_array()
    {
        $this->chop(2, $this->integers)->shouldReturn(1);
    }

    function it_finds_the_index_for_9_in_the_array()
    {
        $this->chop(9, $this->integers)->shouldReturn(5);
    }

    function it_finds_the_index_for_11_in_the_array()
    {
        $this->chop(11, $this->integers)->shouldReturn(6);
    }

    function it_finds_the_index_for_12_in_the_array()
    {
        $this->chop(12, $this->integers)->shouldReturn(7);
    }

    function it_finds_the_index_for_13_in_the_array()
    {
        $this->chop(13, $this->integers)->shouldReturn(8);
    }

}
