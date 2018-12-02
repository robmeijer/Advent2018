<?php

namespace Advent2018\Day1;

class FrequencyCalibrator
{
    /** @var array */
    protected $frequencies = [];

    public function adjustFrequency(int $frequency, string $change): int
    {
        switch ($change[0]) {
            case '+':
                $frequency += substr($change, 1);
                break;
            case '-':
                $frequency -= substr($change, 1);
                break;
        }

        return $frequency;
    }

    public function getDuplicate(int $frequency, array $adjustments): int
    {
        foreach ($adjustments as $adjustment) {
            if ($this->isDuplicate($frequency)) {
                return $frequency;
            }
            $this->frequencies []= $frequency;
            $frequency = $this->adjustFrequency($frequency, $adjustment);
        }

        return $this->getDuplicate($frequency, $adjustments);
    }

    private function isDuplicate(int $frequency): bool
    {
        return in_array($frequency, $this->frequencies, true);
    }
}
