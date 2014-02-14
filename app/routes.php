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


//////	return View::make('hello');
//////	return App::environment();
////    // Create a Mongo conenction
////    $mongo = new MongoClient("mongodb://admin:admin@localhost:27017");
//    $mongo = new MongoClient("mongodb://inodin_loc:inodin_loc@ds033459.mongolab.com:33459/test");
////    $mongo = new Mongo("mongodb://localhost:27017");
//
//    // Choose the database and collection
//    $db = $mongo->test;
//    $coll = $db->users;
//
//    // Same a document to the collection
//    $coll->save(array(
//        "name" => "Jack Sparrow",
//        "age" => 34,
//        "occupation" => "Pirate"
//    ));
//
//    // Retrieve the document and display it
//    $item = $coll->findOne();
//
//    echo "My name is " . $item['name'] . ". I am " . $item['age'] . " years old and work full-time as a " . $item['occupation'] . ".";



    $user = DB::collection('menu')->where('age', '>', 20)->take(2)->get();
//    $users = User::where('age', '>', 20)->take(1)->get();

    foreach ($user as $i) {

        echo $i["age"]."<br>";
    }

});

Route::get('menu', array('as' => 'showmenu', 'uses' => 'DishController@index'));

Route::get('test', function(){
    $firm = DB::connection('mysql_firms')->table('companies')->find(40);
    $firm = json_encode($firm);
    $firm_2 = json_decode($firm,true);
    unset($firm_2['okved']);
    print_r($firm_2);


//    DB::collection('firms')->update($firm_2, array('upsert' => true));
    DB::collection('firms')->insert($firm_2);

//    var_dump($dish);
});


Route::get('test2', function(){
    $begin_time = time() - 1272000000 + floatval(microtime());
    $firm = DB::connection('mysql_firms')->table('companies')->take(100000)->get();
    $firm_2 = json_decode(json_encode($firm), true);
//    unset($firm_2['okved']);
//    print_r($firm_2);


//    DB::collection('firms')->update($firm_2, array('upsert' => true));
    DB::collection('firms')->insert($firm_2);
    $end_time = time() - 1272000000 + floatval(microtime()) - $begin_time;

    echo($end_time);
});
