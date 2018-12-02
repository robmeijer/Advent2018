<?php

use Advent2018\Day1\FrequencyCalibrator;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';
$contents = $container->get(Filesystem::class)->read('Day1/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);
[$rows] = $matches;

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 1 -----------------------------------
// -----------------------------------------------------------------------------

/** @var FrequencyCalibrator $frequencyCalibrator */
$frequencyCalibrator = $container->get(FrequencyCalibrator::class);

$frequency = 0;

foreach ($rows as $adjustment) {
    $frequency = $frequencyCalibrator->adjustFrequency($frequency, $adjustment);
}

$duplicate = $frequencyCalibrator->getDuplicate(0, $rows);

echo $frequency . PHP_EOL;
echo $duplicate . PHP_EOL;
