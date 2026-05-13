<?php
// This script supports the Bose mobile app use case "play custom stream"
// https://content.api.bose.io/core02/svc-bmx-adapter-orion/prod/orion/station?data=
// Author: Gerhard Muth, 2026-05-06

// Get url parameter data which is a base64 encoded json
$data = json_decode(base64_decode($_GET["data"]), true);

// Map to Bose compatible BMX response
$response = [
    "audio" => [
        "isRealtime" => true,
        "hasPlaylist" => false,
        "streamUrl" => $data["streamUrl"] ?? ""
    ],
    "imageUrl" => $data["imageUrl"] ?? "",
    "name" => $data["name"] ?? "",
    "streamType" => "liveRadio"
];

// Output as json
header("Content-Type: application/json");
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
