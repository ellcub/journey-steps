# Journey App

## Requirements
PHP 7.4 is assumed

## Assumptions
The input json file is stored within the project, in `/data/journeysteps.json`.  
An improvement could be to accept a file as an argument.  In a web application this could be handled via a route.

## Instructions

### Setup
1. Copy or clone to a folder
```bash
git clone git@github.com:ellcub/journey-steps.git
```
2. Navigate to the folder, eg
```bash
cd journey-steps
```
3. Install dependencies (PHPUnit) and set up autoloading
 ```bash
 composer install
```

### Run the app
From the project folder and run 
```bash
./journeyapp
```
The app takes the input file and prints an ordered list of the journey steps.

### Running the tests
From the project folder and run
 ```bash
 ./vendor/bin/phpunit tests
```