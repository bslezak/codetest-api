# codetest-api

This project is a simple API that builds on the robust Symfony 3.4 framework. I chose this architecture not just to
complete the puzzle, but to learn something new along the way.

## Technologies Employed
* Symfony 3.4 Framework
* MySQL
* Doctrine 2
* [Swagger UI](https://swagger.io/swagger-ui/)

## Future Improvements

* Build out and abstract the API versioning system to support new version releases in an elegant manner
* Make importing of records more user configurable, rather than a hard-coded location
* More QC on API inputs

## Installation

### Installation Prerequisites

In order to run this project you must:

1. Install [composer](https://getcomposer.org/download/)
2. Have a mysql server available with a user that can create databases, functions, and stored procedures
3. Have PHP version 7.0.8 or greater installed
4. Install and enable the PHP extension `php_pdo_mysql`

### Installation Steps
1. Retrieve a copy of the codebase from [https://github.com/bslezak/codetest-api](http://github.com/bslezak/codetest-api) 
by the command:
	
		git clone https://github.com/bslezak/codetest-api.git
or by downloading a release from:
	
		https://github.com/bslezak/codetest-api/releases
		
2. Change to the project directoy and install all dependencies through composer:

		cd <project-dir>
		composer install
		
3. Edit the .env file, at minimum editing the line `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/codetest-api` 
defining proper mysql credentials and host
		
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
		 
7. Use [Swagger UI](https://swagger.io/swagger-ui/) to access the API documentation via http://localhost:8000/api/v1/

	or

8. Directly query the endpoint like so:

		http://localhost:8000/api/v1/pharmacy/?latitude=38.960457&longitude=-94.637407
		
# License
	
Copyright 2018 Brian Slezak <brian@theslezaks.com>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at  [apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)
   
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
