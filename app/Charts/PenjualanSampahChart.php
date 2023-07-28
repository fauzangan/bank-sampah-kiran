<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenjualanSampahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setHeight(200)
            ->addData('Pembelian', [6, 9, 3, 4, 10, 8])
            ->addData('Penjualan', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
