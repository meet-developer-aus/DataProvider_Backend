<?php

require_once 'vendor/autoload.php';

//use ATDWClientNameSpace\ApiClient;

// Create Apiclient instance 
$apiClientObj = new ATDWClientNameSpace\ApiClient();


// Fetch API data by ApiClient by bew Apiclient instance 
$data = $apiClientObj->fetchData();

// return  data as json data..

