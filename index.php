<?php

require_once 'vendor/autoload.php';

//load API key from .env for security and avoid exposure
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//API key
$apiKey=$_ENV['API_KEY'];


//use ATDWClientNameSpace\ApiClient;/

// Create Apiclient instance by passing API key
$apiClientObj = new ATDWClientNameSpace\ApiClient($apiKey);


// Fetch API data by ApiClient by bew Apiclient instance 
$data = $apiClientObj->fetchData();

// return  data as json data..

