<?php


class ReporterRepository implements ReporterDataRepositoryInterface
{

    public function getData(): array
    {
        return [
            'name' => 'Financial Reporter',
            'amount' => 1000.00
        ];
    }
}