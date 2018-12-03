<?php

namespace Advent2017\Tests\Day3;

use Advent2018\Day3\Claim;
use Advent2018\Day3\Fabric;
use PHPUnit\Framework\TestCase;

class FabricTest extends TestCase
{
    /**
     * @dataProvider claims
     * @param array $claims
     * @param int $expected
     */
    public function testCanShowClaimOverlaps(array $claims, int $expected)
    {
        $fabric = new Fabric();
        foreach ($claims as $claimText) {
            $claim = Claim::createFromClaimText($claimText);
            foreach ($claim->getPositions() as $position) {
                $fabric->addClaimToPosition($position, $claim);
            }
        }

        $this->assertEquals($expected, $fabric->getOverlaps());
    }

    /**
     * @dataProvider nonOverlappingClaim
     * @param array $claims
     * @param int $expected
     */
    public function testCanShowNonOverlappingClaim(array $claims, int $expected)
    {
        $fabric = new Fabric();
        foreach ($claims as $claimText) {
            $claim = Claim::createFromClaimText($claimText);
            foreach ($claim->getPositions() as $position) {
                $fabric->addClaimToPosition($position, $claim);
            }
        }

        $this->assertEquals($expected, $fabric->getNonOverlappingClaimId());
    }

    public function claims()
    {
        return [
            [['#1 @ 1,3: 4x4', '#2 @ 3,1: 4x4', '#3 @ 5,5: 2x2'], 4]
        ];
    }

    public function nonOverlappingClaim()
    {
        return [
            [['#1 @ 1,3: 4x4', '#2 @ 3,1: 4x4', '#3 @ 5,5: 2x2'], 3]
        ];
    }
}
