<?php

require_once 'vendor/autoload.php';

//load API key from .env for security and avoid exposure
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//API key
$apiKey = $_ENV['API_KEY'];


//use ATDWClientNameSpace\ApiClient;/

// Create Apiclient instance by passing API key
$apiClientObj = new ATDWClientNameSpace\ApiClient($apiKey);



// Fetch API data by ApiClient by bew Apiclient instance 

//API endpoints to fetch area data
$areaEndPoint = 'areas';
$locationEndPoint = 'locations';



//$areaData = $apiClientObj->fetchAreaData($areaEndPoint);
//var_dump($areaData);


$locationData = $apiClientObj->fetchAreaData($locationEndPoint);
var_dump($locationData);


// return  data as json data..

?>