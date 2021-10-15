<?php

function getChartURL()
{
    global $config;
    global $data;
    $currency = $config["currency"];
    $crypto = $config["cryptocurrency"];
    //gets chart url from Quickchart.io
    $data1 = "";
    foreach ($data as $key => $value) {
        $data1 .= $key > 0 ? "," : "";
        $data1 .= (string) round($value["price"], 0);
    }
    //edit template = https://quickchart.io/chart-maker/edit/zm-a9bdc7f7-1bfd-498e-b866-d14f77c9c541
    $chartUrl = 'https://quickchart.io/chart/render/zm-4a8223aa-e6b9-4c33-8e29-5870d73c533f?data1=' . $data1;

    return $chartUrl;
}
