<?php

function getChartURL()
{
    global $config;
    global $data;
    //gets chart url from Quickchart.io
    $data1 = "";
    foreach ($data as $key => $value) {
        $data1 .= $key > 0 ? "," : "";
        $data1 .= (string) round($value["price"], 0);
    }
    //edit template = https://quickchart.io/chart-maker/edit/zm-c5a44b72-55aa-48d2-b9b3-4fe61dfd50de
    $chartUrl = 'https://quickchart.io/chart/render/zm-1b37d2a6-7311-4757-8ba3-ff93a126c379?data1=' . $data1;

    return $chartUrl;
}
