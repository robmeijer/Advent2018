<?php

namespace Advent2017\Tests\Day1;

use Advent2018\Day1\FrequencyCalibrator;
use PHPUnit\Framework\TestCase;

class FrequencyCalibratorTest extends TestCase
{
    /**
     * @dataProvider adjustments
     * @param array $adjustments
     * @param int $expected
     */
    public function testCanAdjustFrequency(array $adjustments, int $expected): void
    {
        $frequencyCalibrator = new FrequencyCalibrator();

        $frequency = 0;

        foreach ($adjustments as $adjustment) {
            $frequency = $frequencyCalibrator->adjustFrequency($frequency, $adjustment);
        }

        $this->assertEquals($expected, $frequency);
    }

    /**
     * @dataProvider adjustmentsWithDuplicate
     * @param array $adjustments
     * @param int $expected
     */
    public function testCanDetectDuplicateFrequency(array $adjustments, int $expected): void
    {
        $frequencyCalibrator = new FrequencyCalibrator();

        $frequency = $frequencyCalibrator->getDuplicate(0, $adjustments);

        $this->assertEquals($expected, $frequency);
    }

    public function adjustments(): array
    {
        return [
            [['+1', '-2', '+3', '+1'], 3],
            [['+1', '+1', '+1'], 3],
            [['+1', '+1', '-2'], 0],
            [['-1', '-2', '-3'], -6],
        ];
    }

    public function adjustmentsWithDuplicate(): array
    {
        return [
            [['+1', '-1'], 0],
            [['+3', '+3', '+4', '-2', '-4'], 10],
            [['-6', '+3', '+8', '+5', '-6'], 5],
            [['+7', '+7', '-2', '-7', '-4'], 14],
        ];
    }
}
