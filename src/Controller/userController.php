<?php

require_once '../Model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $function=$_POST["function"];
    $name=$_POST["username"];
    switch ($function){
        case "insert" :
            $result = userInsert($name);
            echo json_encode($result);
            exit();
    }
}

function userInsert($name){
    $user = new User();
    if ($user->createUser($name)) {
        return ["success" => true];
    } else {
        return ["success" => false, "message" => "User creation failed."];
    }
}
function userDelete($name){
    /*TODO:to implement function*/
}