<?php

namespace spec\Diego\ExcelConverter;

use Diego\ExcelConverter\Converter;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;

class ConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Converter::class);
    }

    function it_can_convert_a_character_to_a_number()
    {
        $this->convert('A')->shouldReturn(0);
        $this->convert('B')->shouldReturn(1);
        $this->convert('G')->shouldReturn(6);
        $this->convert('Z')->shouldReturn(25);
    }

    function it_can_convert_a_number_to_a_character()
    {
        $this->convert(0)->shouldReturn('A');
        $this->convert(1)->shouldReturn('B');
        $this->convert(6)->shouldReturn('G');
        $this->convert(25)->shouldReturn('Z');
    }

    // TODO: implement the real number to character
    function it_can_convert_a_number_to_multiple_characters()
    {
        // $this->convert(26)->shouldReturn('AA');
        // $this->convert(57)->shouldReturn('BF');
        // $this->convert(124)->shouldReturn('DU');
        // $this->convert(702)->shouldReturn('AAA');
    }

    function it_can_convert_multiple_characters_to_a_number()
    {
        $this->convert('AA')->shouldReturn(26);
        $this->convert('AB')->shouldReturn(27);
        $this->convert('AH')->shouldReturn(33);
        $this->convert('AZ')->shouldReturn(51);
        $this->convert('BA')->shouldReturn(52);
        $this->convert('BF')->shouldReturn(57);
        $this->convert('BZ')->shouldReturn(77);
        $this->convert('DU')->shouldReturn(124);
        $this->convert('VC')->shouldReturn(574);
        $this->convert('AAA')->shouldReturn(702);
    }

    function it_cannot_convert_an_empty_string()
    {
        $this->shouldThrow(InvalidArgumentException::class)->duringConvert('');
    }
}
