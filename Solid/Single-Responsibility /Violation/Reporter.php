<?php


class Reporter
{
    public function getData(): array
    {
        return $this->query();
    }

    public function export($format)
    {

        if ($format == 'pdf') {
            // print pdf
        }

        if ($format == 'xls') {
            // print xls
        }

        if ($format === 'csv') {
            // print csv
        }
    }

    public function print()
    {
        $data = $this->query();
        echo 'Printing ....';
    }

    private function query(): array
    {
        return [
            'name' => 'Financial Reporter',
            'amount' => 1000.00
        ];
    }

}

// use

$reporter = new Reporter();
$reporter->print();
$reporter->export('pdf');
$reporter->export('csv');
