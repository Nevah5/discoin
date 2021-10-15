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
    //edit template = https://quickchart.io/chart-maker/edit/zm-41f2fcb2-0313-4f6e-9f25-f671e597d3e0
    $chartUrl = 'https://quickchart.io/chart/render/zm-a2200d6b-21df-4184-8b70-019ff7b8d839?data1=' . $data1;

    return $chartUrl;
}
