<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
//	return View::make('hello');
//	return App::environment();
    // Create a Mongo conenction
    $mongo = new Mongo("mongodb://admin:admin@localhost:27017");
//    $mongo = new Mongo("mongodb://localhost:27017");

    // Choose the database and collection
    $db = $mongo->mongoblog;
    $coll = $db->test;

    // Same a document to the collection
    $coll->save(array(
        "name" => "Jack Sparrow",
        "age" => 34,
        "occupation" => "Pirate"
    ));

    // Retrieve the document and display it
    $item = $coll->findOne();

    echo "My name is " . $item['name'] . ". I am " . $item['age'] . " years old and work full-time as a " . $item['occupation'] . ".";

});