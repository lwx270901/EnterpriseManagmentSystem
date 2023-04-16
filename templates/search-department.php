<?php
//query database roi gui json ve

$data = [
    [
        "name" => "DeparmentA",
        "city" => "New York"
    ],
    [
        "name" => "DeparmentB",
        "city" => "San Francisco"
    ],

];
header('Content-Type: application/json');
echo json_encode($data);