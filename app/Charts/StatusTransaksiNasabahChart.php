<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusTransaksiNasabahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($selesai, $pending, $ditolak): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->addData([$selesai, $pending, $ditolak])
            ->setWidth(350)
            ->setLabels(['Selesai', 'Pending', 'Ditolak'])
            ->setColors(['#26e7a5', '#ffd633', '#ff455f']);
    }
}
