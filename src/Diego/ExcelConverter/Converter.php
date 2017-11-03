<?php

namespace Diego\ExcelConverter;

class Converter
{
    const ASCII_VALUE_A = 65;

    public function convert($argument)
    {
        $len = strlen($argument);

        if ($len === 0) {
            throw new \InvalidArgumentException();
        }

        if (is_numeric($argument)) {
            return chr(self::ASCII_VALUE_A + $argument);
        }

        return $this->character2Number($argument);
    }

    private function character2Number(string $characters): int
    {
        $characters = strtoupper($characters);
        $characters = strrev($characters);

        $result = 0;
        for ($i = 0; $i < strlen($characters); $i++) {
            $result += $this->characterValue($characters[$i]) * pow(26, $i);
        }

        return $result - 1;
    }

    private function characterValue(string $character): int
    {
        return ord($character) - self::ASCII_VALUE_A + 1;
    }
}
