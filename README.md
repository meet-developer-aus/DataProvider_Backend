DataProvider_Backend

PHP backend application fetches data from the Atlas API and provides JSON of accommodation options in Sydney.
Instructions
Overview

This PHP backend application serves as a data provider, fetching information from the Atlas API and presenting a JSON list of accommodation options in Sydney. The application is built using PHP version 8.2.13.

1. Clone the Repository:

    git clone 
   https://github.com/meet-developer-aus/DataProvider_Backend.git


3. Navigate to the Project Directory:

   cd dataprovider_backend


4. Install Dependencies:

   composer install

5. Create Environment File:
        Create the .env in root folder where main script runs(example folder in which index.php reside)
        Set your Atlas API key in the .env file.

Usage

    Run the PHP Backend or by starting apache or NGIX whichever webserver u orefer OR by 

    php -S localhost:8000

    Replace localhost:8000 with your desired host and port.

    Access API Endpoints:
        Open your browser or use API testing tools like Postman
        Access the follow endpoints:
            Regions: http://localhost:8000/regions
            Areas: http://localhost:8000/areas
            Locations: http://localhost:8000/locations

    Retrieve JSON Data:
        The application will respond with JSON data containing information about regions, areas, and locations.

Configuration

    Adjust CORS headers in index.php to match your frontend URL.
    Set your API key in the .env file to securely access the Atlas API.

Dependencies

    Guzzle HTTP: A PHP HTTP client for making API requests.
    PHP dotenv: Loads environment variables from a .env file.

Author

    Romeo Antony

License

This project is licensed under the MIT License - see the LICENSE file for details.
Notes

    PHP version: 8.2.13
    PHPUnit is included in the require-dev section for testing purposes.


installation via docker
Instructions
Installation via docker which install both  freondend app avialble at
https://github.com/meet-developer-aus/SPA_VUE.git
and also this backend app 
https://github.com/meet-developer-aus/DataProvider_Backend.git


dcoker install as standalon app 


note: since php backend app use API ket to fetch, create .env file in folder where docker-compose.yml run 
.env file needs to have API key 
as API_KEY=***********

docker-compose up 
