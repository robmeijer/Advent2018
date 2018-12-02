<?php

namespace Advent2017\Tests\Day2;

use Advent2018\Day2\ChecksumCalculator;
use PHPUnit\Framework\TestCase;

class ChecksumCalculatorTest extends TestCase
{
    /**
     * @dataProvider boxIds
     * @param array $boxIds
     * @param int $expected
     */
    public function testCanCalculateChecksum(array $boxIds, int $expected): void
    {
        $checksumCalculator = new ChecksumCalculator();

        $this->assertEquals($expected, $checksumCalculator->calculate($boxIds));
    }

    /**
     * @dataProvider commonBoxIds
     * @param array $boxIds
     * @param string $expected
     */
    public function testCanFindMatchingBoxes(array $boxIds, string $expected): void
    {
        $checksumCalculator = new ChecksumCalculator();

        $this->assertEquals($expected, $checksumCalculator->findMatch($boxIds));
    }

    public function boxIds(): array
    {
        return [
            [['abcdef', 'bababc', 'abbcde', 'abcccd', 'aabcdd', 'abcdee', 'ababab'], 12],
        ];
    }

    public function commonBoxIds(): array
    {
        return [
            [['abcde', 'fghij', 'klmno', 'pqrst', 'fguij', 'axcye', 'wvxyz'], 'fgij'],
        ];
    }
}
