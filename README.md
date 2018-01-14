# codetest-api

## Installation

### Installation Prerequisites

In order to run this project you have to have:

1. [composer](https://getcomposer.org/download/) installed
2. A mysql server with a user that can create databases, functions, and stored procedures
3. PHP version ^7.0.8 installed
4. The PHP extension php_pdo_mysql enabled

### Installation Steps
1. Retrieve a copy of the codebase from [https://github.com/bslezak/codetest-api](http://github.com/bslezak/codetest-api) by the command/:
	
		git clone https://github.com/bslezak/codetest-api.git
or by downloading a release from:
	
		https://github.com/bslezak/codetest-api/releases
		
2. Change to the project directoy and install all dependencies through composer:

		cd <project-dir>
		composer install
		
3. Copy .env.dist to .env and edit the line DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/codetest-api with proper mysql credentials and host

		cp .env.dist .env
		
4. Create the database
	
		php .\bin\console doctrine:database:create
		
5. Update the database

		php .\bin\console doctrine:database:import .\var\install.sql
		
6. Import the pharmacy table by placing the pharmacies.csv file into the .\var\ folder and running:

		php .\bin\console import:pharmacies
		
7. Run the local server with the command:
	
		php .\bin\console server:run
you should see the result:

		 [OK] Server listening on http://127.0.0.1:8000
		 
		 // Quit the server with CONTROL-C.
		 
8. Use [swagger](https://swagger.io/) to access the API documentation at http://127.0.0.1:8000/api/v1/

	or

9. Query the endpoint for nearest pharamcy by providing latitude and logitude through query strings such as:

		http://localhost:8000/api/v1/pharmacy/?latitude=38.960457&longitude=-94.637407
