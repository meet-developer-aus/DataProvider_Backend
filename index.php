<?php
// Set CORS headers
header("Access-Control-Allow-Origin: *"); // need to replace with actual frontend URL 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



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

//API endpoints to fetch region, area, locations data
$regionEndPoint = 'regions';
$areaEndPoint = 'areas';
$locationEndPoint = 'locations';


$regionData = $apiClientObj->fetchRegionData($regionEndPoint);
// var_dump($regionData);

$areaData = $apiClientObj->fetchAreaData($areaEndPoint);
// var_dump($areaData);


$locationData = $apiClientObj->fetchAreaData($locationEndPoint);
// var_dump($locationData);


// Combines all output region, area and location data into a single array
$responseData = [
    'region' => $regionData,
    'area' => $areaData,
    'location' => $locationData,
];

// Encoding the array to JSON
$jsonResponse = json_encode($responseData, JSON_PRETTY_PRINT);

// Output the JSON response
header('Content-Type: application/json');
echo $jsonResponse;


// return  data as json data..

?>