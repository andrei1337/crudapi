<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/* Companies */
$router->get('/companies', 'CompaniesController@showAllCompanies');
$router->get('/companies/{id}', 'CompaniesController@getCompanyById');
$router->get('/companies/types/{type}', 'CompaniesController@getCompanyByType');
$router->post('/companies/create', 'CompaniesController@createCompany');
$router->delete('/companies/delete/{id}', 'CompaniesController@deleteCompany');
$router->put('/companies/update/{id}', 'CompaniesController@updateCompany');

/* Employees */
$router->get('/employees', 'EmployeesController@showAllEmployees');
$router->get('/employees/{id}', 'EmployeesController@getEmployeeById');
$router->get('/employees/jobs/{job}', 'EmployeesController@getEmployeeByJob');
$router->post('/employees/create', 'EmployeesController@createEmployee');
$router->delete('/employees/delete/{id}', 'EmployeesController@deleteEmployee');
$router->put('/employees/update/{id}', 'EmployeesController@updateEmployee');



