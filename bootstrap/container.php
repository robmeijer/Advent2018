<?php

use Advent2018\Day1\FrequencyCalibrator;
use Advent2018\Day2\ChecksumCalculator;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

$container = new Container();

$container->add(Local::class)->addArgument(new RawArgument(__DIR__ . '/../src'));
$container->add(Filesystem::class)->addArgument(Local::class);

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 1 -----------------------------------
// -----------------------------------------------------------------------------
$container->add(FrequencyCalibrator::class);

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 2 -----------------------------------
// -----------------------------------------------------------------------------
$container->add(ChecksumCalculator::class);

return $container;
