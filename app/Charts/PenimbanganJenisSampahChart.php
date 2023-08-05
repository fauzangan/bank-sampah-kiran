<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenimbanganJenisSampahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data, $jumlahKg): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        // $data = JenisSampah::all(['nama_sampah']);
        $dataset = PenimbanganJenisSampahChart::dataToArray($data);
        $datakg = PenimbanganJenisSampahChart::kilogramToArray($jumlahKg);

        return $this->chart->donutChart()
            ->addData($datakg)
            ->setWidth(350)
            ->setLabels($dataset);
    }

    public function dataToArray($data){
        $dataset = array();
        for($i = 0; $i < $data->count(); $i++){
            $dataset[$i] = $data[$i]->nama_sampah;
        }
        return $dataset;
    }

    public function kilogramToArray($data) {
        $dataset = array();
        for($i = 0; $i < $data->count(); $i++){
            if($data[$i]->jumlah_kg != null){
                $dataset[$i] = floatval($data[$i]->jumlah_kg);
            }else{
                $dataset[$i] = 0;
            }
        }
        return $dataset;
    }
}
