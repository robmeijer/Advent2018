<?php

use Advent2018\Day2\ChecksumCalculator;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';
$contents = $container->get(Filesystem::class)->read('Day2/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);
[$rows] = $matches;

/** @var ChecksumCalculator $checksumCalculator */
$checksumCalculator = $container->get(ChecksumCalculator::class);

$checksum = $checksumCalculator->calculate($rows);

echo $checksum . PHP_EOL;

$match = $checksumCalculator->findMatch($rows);

echo $match . PHP_EOL;
