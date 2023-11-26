<?php
namespace ATDWClientNameSpace;
use GuzzleHttp\Client;

// creating API request client class named ApiClient with properties + methods


class ApiClient
{

// properties  apikay,API url, and httpclient
private $apiKey;
private $baseUri = 'https://atlas.atdw-online.com.au/api/atlas/';
private $httpClient;

//methods 

// class constructor 
public function __construct($apiKey)
    {
        echo "ApiClient constructor is called";

        // Assign API key to ApiCLient's objetct apiKey property during object creation 
        $this->apiKey = $apiKey;


        //create httpClient which get API endpoint 
        $this->httpClient = new Client(['base_uri' => $this->baseUri]);
       
    }

// function to fetch API data
public function fetchData()
{
    echo "fetchData is called";
    
}



}



?>

