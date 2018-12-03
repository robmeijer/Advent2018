<?php

use Advent2018\Day3\Claim;
use Advent2018\Day3\Fabric;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';
$contents = $container->get(Filesystem::class)->read('Day3/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);
[$rows] = $matches;

/** @var Fabric $fabric */
$fabric = $container->get(Fabric::class);

foreach ($rows as $claimText) {
    $claim = Claim::createFromClaimText($claimText);
    foreach ($claim->getPositions() as $position) {
        $fabric->addClaimToPosition($position, $claim);
    }
}

echo $fabric->getOverlaps() . PHP_EOL;
echo $fabric->getNonOverlappingClaimId() . PHP_EOL;
