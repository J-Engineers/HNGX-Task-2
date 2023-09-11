<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Task

This is a project(API) designed to securely CREATE a Person, READ a Person or Persons, UPDATE a Person and DELETE a Person from a database table. It was built with php and LARAVEL was used as framework. Here are the things we are going to do to be able to install and tat out this:
## Hosted API https://hngxbt2.gjengineer.com.ng
## Hosted Documentation https://www.postman.com/red-meadow-5256/workspace/red-meadow-5256-s-public-workspace/collection/10053626-c5e41565-7ce0-4cb5-b784-76e729f8bdd1
## Testing Script is in  documentation.json

- [You need to install Composer on your system. This is the PHP package manager](https://composer.com).
- [You need to install a local server like mampp or xampp or wampp](https://apache.org).
- [You need to install a code edito like VSCode or PHPStorm or Sublime](https://vscode.com).
- Turn on your local server and start the apache and mysql services
- Go into the local server public folder. Eg c:/xampp/htdocs and create an empty folder.
- Open this folder in your code editor and open a terminal anf fork this project into the folder and install laravel.
- You need to create .env file inside the root folder of this project and copy the content of .env.example and paste inside the .env file.
- You need to goto the phpMyAdmin on the browser to create your database, copy the database credentials and go the .env file in the project and update the database name, user, host and password and save the file.
- You need to migrate the tables into your new database "php artisan migrate"
- You need to start the project "php artisan serve", then check for the url of your app, if error was found, then you have to carefully repeat that state above again.
- You need to readmore to see the use cases and endpoints with their requirements and responses"

Lets Look at the endpoints. We have got 5 endpoints here

## Endpoints(CRUD Operation)

## Hosted API https://hngxbt2.gjengineer.com.ng
## Hosted Documentation https://www.postman.com/red-meadow-5256/workspace/red-meadow-5256-s-public-workspace/collection/10053626-c5e41565-7ce0-4cb5-b784-76e729f8bdd1
## Testing Script is in  documentation.json
Make sure you change the hosting_url to the url pointing to the server that hosted this project

## 1. READ all persons

METHOD: GET
URL: https://hngxbt2.gjengineer.com.ng/api
BODY: none
PARAMETERS: none

TRUE CASE RESPONSE: 
{
    "status": 200,
    "message": "3 Records Found",
    "person": [
        {
            "id": 1,
            "name": "Ugbogu Justice",
            "gender": "Female",
            "age": "12",
            "created_at": "2023-09-11T06:04:45.000000Z",
            "updated_at": "2023-09-11T06:36:55.000000Z"
        },
        {
            "id": 2,
            "name": "James Justice",
            "gender": "Female",
            "age": "12",
            "created_at": "2023-09-11T06:33:00.000000Z",
            "updated_at": "2023-09-11T06:33:00.000000Z"
        },
        {
            "id": 3,
            "name": "James Justice",
            "gender": "Female",
            "age": "12",
            "created_at": "2023-09-11T06:33:45.000000Z",
            "updated_at": "2023-09-11T06:33:45.000000Z"
        },
    ]
}

FALSE CASE RESPONSE: 

{
    "status": 404,
    "message": "No Records Found",
    "person": []
}

## 2. CREATE a person

METHOD: POST
URL: https://hngxbt2.gjengineer.com.ng/api
BODY: raw(JSON)
{
    "name": "Justice George",
    "gender": "Male",
    "age": "12"
}
PARAMETERS: none

TRUE CASE RESPONSE: 
{
    {
        "status": 200,
        "message": "Person Created Successfully"
    }
}

FALSE CASE RESPONSE: 

{
    "status": 422,
    "message": {
        "name": [
            "The name field is required."
        ],
        "gender": [
            "The gender field is required."
        ],
        "age": [
            "The age field is required."
        ]
    }
}


## 3. READ a person

METHOD: GET
URL: https://hngxbt2.gjengineer.com.ng/api?id=1
BODY: none
PARAMETERS: key and value
key = id,
value = 1


TRUE CASE RESPONSE: 
{
    "status": 200,
    "message": "1 Records Found",
    "person": {
        "id": 7,
        "name": "Justice George",
        "gender": "Male",
        "age": "12",
        "created_at": "2023-09-11T07:24:10.000000Z",
        "updated_at": "2023-09-11T07:24:10.000000Z"
    }
}

FALSE CASE RESPONSE: 

{
    "status": 404,
    "message": "No Records Found with the id of 3",
    "person": []
}


## 4. UPDATE a person

METHOD: PUT
URL: https://hngxbt2.gjengineer.com.ng/api
BODY: raw(JSON)
{
    "name": "James George",
    "gender": "Female",
    "age": "13"
}
PARAMETERS: key and value
key = id,
value = 1


TRUE CASE RESPONSE: 
{
    "status": 200,
    "message": "Person Updated Successfully",
    "person": {
        "id": 7,
        "name": "Ugbogu Justice",
        "gender": "Female",
        "age": "21",
        "created_at": "2023-09-11T07:24:10.000000Z",
        "updated_at": "2023-09-11T07:30:13.000000Z"
    }
}

FALSE CASE RESPONSE: 

{
    "status": 404,
    "message": "No such Person Found"
}


## 5. DELETE a person

METHOD: DELETE
URL: https://hngxbt2.gjengineer.com.ng/api
BODY: none
PARAMETERS: key and value
key = id,
value = 1


TRUE CASE RESPONSE: 
{
    "status": 200,
    "message": "Person Deleted Successfully"
}

FALSE CASE RESPONSE: 

{
    "status": 404,
    "message": "No such Person Found"
}

There you go with the details of testing out this project
- Open up the postman you downloaded and signup/login
- Copy each and every of the use case here to test it out