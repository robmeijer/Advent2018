<?php

namespace Advent2018\Day3;

class Fabric
{
    /** @var array<int> */
    private $claimed = [];

    /** @var array<int> */
    private $overlaps = [];

    /** @var array<int> */
    private $claims = [];

    public function addClaimToPosition(string $position, Claim $claim)
    {
        $this->claims []= $claim->getId();
        $this->claimed[$position] []= $claim->getId();
        if (count($this->claimed[$position]) > 1) {
            foreach ($this->claimed[$position] as $claim) {
                $this->overlaps []= $claim;
            }
        }
    }

    public function getOverlaps(): int
    {
        return count(array_filter($this->claimed, function ($claims) {
            return count($claims) > 1;
        }));
    }

    public function getNonOverlappingClaimId(): int
    {
        return array_values(array_unique(array_diff($this->claims, $this->overlaps)))[0];
    }
}
