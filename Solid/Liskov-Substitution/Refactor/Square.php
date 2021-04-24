<?php


class Square extends GeometricalFigure
{

    private float $side;

    public function __construct(float $side)
    {
        $this->side = $side;
    }

    public function area():float
    {
        return $this->side * 2;
    }
}
