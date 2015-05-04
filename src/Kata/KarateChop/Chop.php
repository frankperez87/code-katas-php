<?php

namespace Kata\KarateChop;

use Exception;
use InvalidArgumentException;

class Chop
{

    public function chop($integer, array $integers)
    {
        $this->guardsAgainstEmptyArrayInput($integers);
        $this->guardsAgainstIntegerSearchesThatDoNotExist($integer, $integers);

        $left = 0;
        $right = count($integers) - 1;
        $middle = null;

        while($this->arrayStillSearchable($left, $right)) {

            $middle = $this->calculateMiddlePosition($left, $right);

            if($this->isRequestedValue($integer, $integers, $middle)) {
                return (integer) $middle;
            }

            if($this->isCurrentIntegerLargerThenProvided($integer, $integers, $middle)) {
                $right = $middle - 1;
            }

            if($this->isCurrentIntegerSmallerThenProvided($integer, $integers, $middle)) {
                $left = $middle + 1;
            }
        }
    }

    private function guardsAgainstEmptyArrayInput(array $integers)
    {
        if (empty($integers)) {
            throw new InvalidArgumentException('Array provided cannot be empty.');
        }
    }

    private function guardsAgainstIntegerSearchesThatDoNotExist($integer, array $integers)
    {
        if (!in_array($integer, $integers)) {
            throw new Exception('The provided integer is not found.');
        }
    }

    private function arrayStillSearchable($left, $right)
    {
        return $left <= $right;
    }

    private function calculateMiddlePosition($left, $right)
    {
        return ceil(($left + $right) / 2);
    }

    private function isRequestedValue($integer, array $integers, $middle)
    {
        return $integers[$middle] == $integer;
    }

    private function isCurrentIntegerLargerThenProvided($integer, array $integers, $middle)
    {
        return $integers[$middle] > $integer;
    }

    private function isCurrentIntegerSmallerThenProvided($integer, array $integers, $middle)
    {
        return $integers[$middle] < $integer;
    }
}
