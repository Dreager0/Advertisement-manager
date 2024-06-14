<?php

require_once '../Model/Advertisements.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $function=$_POST["function"];
    $id=$_POST["userSelect"];
    $title=$_POST["advertisement"];
    switch ($function){
        case "insert" :
            $result = advertisementInsert($id,$title);
            echo json_encode($result);
            exit();
    }
}

function advertisementInsert($id,$title){
    $advertisement = new Advertisements();
    if ($advertisement->createAdvertisement($id,$title)) {
        return ["success" => true];
    } else {
        return ["success" => false, "message" => "Advertisement creation failed."];
    }
}