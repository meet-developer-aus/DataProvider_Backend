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
        // echo "ApiClient constructor is called";

        // Assign API key to ApiCLient's objetct apiKey property during object creation 
        $this->apiKey = $apiKey;



        //create httpClient w
        $this->httpClient = new Client();


    }

    // function to fetch API Area data
    public function fetchAreaData($areaEndPoint)
    {
        // echo "fetch Area Data is called";
        //echo $areaEndPoint;

        return $this->fetchAnyEndpoint($areaEndPoint);
       
    }


    public function fetchLocationData($locationEndPoint)
    {
        echo "fetch Location Data is called";
        return $this->fetchAnyEndpoint($locationEndPoint);


    }


   public function fetchAnyEndpoint($EndPoint)
   {
    try {
      

        // Send a GET request with the API key in the query parameters
        $uri = ($this->baseUri);
        $complete_uri = $uri . $EndPoint;
        
        $response = $this->httpClient->request('GET', $complete_uri, [
            'query' => [
                'key' => $this->apiKey

            ],
        ]);

        

        // check the respose content format to check is it  UTF-16LE encoding or utf8
        // $contentType = $response->getHeader('Content-Type')[0];
        // echo 'Content-Type: ' . $contentType;

        // From respose, shows content is UTF-16LE 
        $utf16leContent = $response->getBody()->getContents();


        // Need to convert the format from UTF-16LE to UTF-8 before do anything
        $utf8 = mb_convert_encoding($utf16leContent, 'UTF-8', 'UTF-16LE');

       
        // Load XML string
        libxml_use_internal_errors(true);

       // Load content as simplexml objects
        $xml = simplexml_load_string($utf16leContent);
         

        // Check any errors while parsing 
        if($xml === false) {
            $errors = libxml_get_errors();
            libxml_clear_errors();

            foreach ($errors as $error) {
                echo "XML Error: {$error->message} at line {$error->line}\n";
            }
        } else {
            libxml_use_internal_errors(false);

        
        // Convert XML to an associative array
        $array = json_decode(json_encode($xml), true);

        
        return json_encode($array, JSON_PRETTY_PRINT);
        }
    } catch (\Exception $e) {
        // Error handling when throw a custom exception
        echo 'Error: ' . $e->getMessage();
    }

   }
     
}


?>