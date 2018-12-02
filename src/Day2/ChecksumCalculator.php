<?php

namespace Advent2018\Day2;

class ChecksumCalculator
{
    public function calculate(array $boxIds): int
    {
        $twos = 0;
        $threes = 0;

        foreach ($boxIds as $boxId) {
            $checksumArray = [];
            $boxId = str_split($boxId);
            foreach ($boxId as $value) {
                if (! isset($checksumArray[$value])) {
                    $checksumArray[$value] = 1;
                } else {
                    $checksumArray[$value]++;
                }
            }
            if (in_array(2, $checksumArray)) {
                $twos++;
            }

            if (in_array(3, $checksumArray)) {
                $threes++;
            }
        }

        return $twos * $threes;
    }

    public function findMatch(array $boxIds): string
    {
        foreach ($boxIds as $boxId) {
            $currentBoxId = $boxId;
            foreach ($boxIds as $comparisonId) {
                if ($comparisonId === $currentBoxId) {
                    continue;
                }
                if ($match = $this->match($currentBoxId, $comparisonId)) {
                    return $match;
                }
            }
        }

        return '';
    }

    private function match($currentBoxId, $comparisonId)
    {
        $match = '';
        $comparisonIdArray = str_split($comparisonId);
        foreach (str_split($currentBoxId) as $position => $value) {
            if ($value === $comparisonIdArray[$position]) {
                $match .= $value;
            }
        }
        if (strlen($match) === strlen($currentBoxId) - 1) {
            return $match;
        }

        return false;
    }
}
