<?php

require 'GeometricalFigure.php';
require 'Rectangle.php';
require 'Square.php';

class AreaCalculator
{
    public function calc(GeometricalFigure $figure): float
    {
        return $figure->area();
    }
}

$calc = new AreaCalculator();

$areaSquare = $calc->calc(
    new Square(4)
);

$areaRectangle = $calc->calc(
    new Rectangle(4, 5)
);

echo 'Area Square: ', $areaSquare, PHP_EOL;
echo 'Area Rectangle: ', $areaRectangle, PHP_EOL;



