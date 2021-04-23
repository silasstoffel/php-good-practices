<?php


class Reporter
{
    private ReporterDataRepositoryInterface $repository;

    public function __construct(ReporterDataRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function export(ReporterFormatterInterface $format)
    {
        $data = $this->repository->getData();
        $format->formatter($data);
    }
}

// Use

$report = new Reporter(
    new ReporterRepository()
);

$report->export(new PdfReporter());

//$report->export(new XlsxReporter());
//$report->export(new JsonReporter());
