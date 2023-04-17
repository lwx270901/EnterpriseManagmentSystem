<?php
//query database roi gui json ve
$data = [
    [
      "name" => "Alice",
      "age" => 25,
      "city" => "New York"
    ],
    [
      "name" => "Bob",
      "age" => 30,
      "city" => "San Francisco"
    ],
    [
      "name" => "Charlie",
      "age" => 35,
      "city" => "Los Angeles"
    ]
  ];

header('Content-Type: application/json');
echo json_encode($data);