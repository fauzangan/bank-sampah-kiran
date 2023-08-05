<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class NasabahPenimbanganSampahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($pembelianByMonth): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->addData('Penimbangan Sampah', $pembelianByMonth)
            ->setHeight(450)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    }
}
