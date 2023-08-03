<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PetugasPenimbanganJenisSampahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($dataset, $label): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->addData($dataset)
            ->setLabels($label);
    }
}
