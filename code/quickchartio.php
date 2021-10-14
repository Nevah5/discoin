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
            'labels' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'datasets' => array(
                array(
                    'label' => "$crypto in $currency",
                    'responsive'=>true,
                    'fill' => '#0051FF',
                    'borderColor' => '#0051FF',
                    'backgroundColor' => '#0051FF',
                    'data' => array()
                )
            )
        ),
        'options'=> [
            'legend'=> [
                'labels' => [
                    'fontColor'=> "#FFFFFF",
                ],
            ],
        ],
    );
    $chartConfigArr["data"]["datasets"][0]["data"] = [];
    foreach($data as $value){
        // $chartConfigArr["labels"][] = (string) $value["timestamp"];
        $chartConfigArr["data"]["datasets"][0]["data"][] = number_format($value["price"], 0, "," ,"");
        echo "Added " . $value["price"] . PHP_EOL;
        echo "Added " . $value["timestamp"] . PHP_EOL. PHP_EOL;
        // var_dump($chartConfigArr);
        echo "\n\n";
        // exit;
    }

    $chartConfigJSON = json_encode($chartConfigArr);
    $chartUrl = 'https://quickchart.io/chart?w=400&h=250&c=' . urlencode($chartConfigJSON);

    return $chartUrl;
}
