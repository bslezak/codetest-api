# codetest-api

## Installation

### Installation Prerequisites

In order to run this project you must:

1. Install [composer](https://getcomposer.org/download/)
2. Have a mysql server available with a user that can create databases, functions, and stored procedures
3. Have PHP version 7.0.8 or greater installed
4. The PHP extension `php_pdo_mysql` enabled

### Installation Steps
1. Retrieve a copy of the codebase from [https://github.com/bslezak/codetest-api](http://github.com/bslezak/codetest-api) by the command/:
	
		git clone https://github.com/bslezak/codetest-api.git
or by downloading a release from:
	
		https://github.com/bslezak/codetest-api/releases
		
2. Change to the project directoy and install all dependencies through composer:

		cd <project-dir>
		composer install
		
3. Edit the .env file, changing the line `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/codetest-api` with proper mysql credentials and host
		
4. Create the database, the schema, and import functions and stored procs:
	
		php .\bin\console doctrine:database:create
		php .\bin\console doctrine:schema:create
		php .\bin\console doctrine:database:import .\var\install.sql
		
5. Import the pharmacy table by placing the pharmacies.csv file into the `.\var\` folder and running:

		php .\bin\console import:pharmacies
	_Note that no CSV is provided with the codebase, but you could certainly create your own._
		
6. If you don't have a web server to run the application, use PHP's built-in server with the command:
	
		php .\bin\console server:run 0.0.0.0:8000
you should see the result:

		 [OK] Server listening on http://0.0.0.0:8000
		 
		 // Quit the server with CONTROL-C.
		 
7. Use [swagger](https://swagger.io/) to access the API documentation at http://127.0.0.1:8000/api/v1/

	or

8. Query the endpoint for nearest pharamcy by providing latitude and logitude through query strings such as:

		http://localhost:8000/api/v1/pharmacy/?latitude=38.960457&longitude=-94.637407
