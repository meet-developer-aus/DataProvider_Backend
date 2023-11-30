<?php
header("Access-Control-Allow-Origin: *"); // Replace with actual frontend URL
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Credentials: true");
// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}


require_once 'vendor/autoload.php';




// return  data as json data..

// Check if the request URI contains "/api"
if (strpos($_SERVER['REQUEST_URI'], '/api') !== false) {
    // Handle API request
    handleApiRequest();
} else {
    // Handle regular request
    handleRegularRequest();
}

// existing code for handling regular requests
function handleRegularRequest() {
    // ...  existing code for regular requests ...
}

//  API endpoint logic
function handleApiRequest() {
    // ...  API endpoint logic ...
    // For example, you can echo a JSON response

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

try {
    $regionData = $apiClientObj->fetchRegionData($regionEndPoint);
    // Handling successful regionData response
   // var_dump($regionData);

    $areaData = $apiClientObj->fetchAreaData($areaEndPoint);
    // successful areaData response
  //  var_dump($areaData);

    $locationData = $apiClientObj->fetchAreaData($locationEndPoint);
    // Handle successful locationData 
   // var_dump($locationData);
} catch (Exception $e) {
    // Handlingg exceptions
    echo "An error occurred: " . $e->getMessage();
}



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
    
}
?>