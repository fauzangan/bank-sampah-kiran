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

    public function build($pembelian, $penjualan): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->addData('Pembelian', $pembelian)
            ->addData('Penjualan', $penjualan)
            ->setHeight(450)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    }
}
