<?php

namespace Advent2018\Day3;

class Claim
{
    /** @var int */
    private $id;

    /** @var int */
    private $left;

    /** @var int */
    private $top;

    /** @var int */
    private $width;

    /** @var int */
    private $height;

    public function __construct(int $id, int $left, int $top, int $width, int $height)
    {
        $this->id = $id;
        $this->left = $left;
        $this->top = $top;
        $this->width = $width;
        $this->height = $height;
    }

    public static function createFromClaimText(string $claimText): self
    {
        $data = explode(' ', $claimText);
        $coords = explode(',', $data[2]);
        $size = explode('x', $data[3]);

        return new self(substr($data[0], 1), $coords[0], substr($coords[1], 0, -1), $size[0], $size[1]);
    }

    public function getPositions(): array
    {
        $positions = [];

        for ($i = $this->getTop(); $i < $this->getTop() + $this->getHeight(); $i++) {
            for ($j = $this->getLeft(); $j < $this->getLeft() + $this->getWidth(); $j++) {
                $positions []= "{$i}:{$j}";
            }
        }

        return $positions;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLeft(): int
    {
        return $this->left;
    }

    public function getTop(): int
    {
        return $this->top;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
