<?php

function getChartURL()
{
    global $config;
    global $data;
    $currency = $config["currency"];
    $crypto = $config["cryptocurrency"];
    //gets chart url from Quickchart.io
    $chartConfigArr = array(
        'type' => 'line',
        'data' => array(
        'labels' => [],
        'datasets' => array(
            array(
                'fill' => false,
                'borderColor' => '#051FF0',
                'label' => "$crypto in $currency",
                'data' => []
                )
            )
        ),
        'options'=> [
            'legend'=> [
                'labels' => [
                    'fontColor'=> "#FFFFFF",
                ],
            ],
            'scales'=> [
                'yAxes'=> [[
                    'ticks'=> [
                        'fontColor'=> "#FFFFFF",
                    ]
                ]],
                'xAxes'=> [[
                    'ticks'=> [
                        'fontColor'=> "#FFFFFF",
                    ]
                ]]
            ]
        ],
    );
    foreach($data as $value){
        $chartConfig["labels"][] = $value["timestamp"];
        $chartConfig["datasets"][0]["data"] = $value["price"];
    }

    $chartConfig = json_encode($chartConfigArr);
    $chartUrl = 'https://quickchart.io/chart?w=400&h=250&c=' . urlencode($chartConfig);

    return $chartUrl;
}
