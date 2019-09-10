<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Post;
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

$user = User::findOrfail(1);

//$post = new Post(['title'=>'this is onetomany title', 'body'=>'this is manytomany relationship body for the sentences']);
//
//$user->post()->save($post);
    $user->post()->save(new Post(['title'=>'this is onetomany title 2', 'body'=>'this is manytomany relationship body for the sentences 2']));


});


Route::get('/read', function (){
        $user = User::findOrfail(1);
       foreach($user->post as $post){
           echo $post->title . "<br>";
       }
});


Route::get('/update', function(){
    $user = User::find(1);
    $user->post()->where('id','=','2')->update(['title'=>'I love laravel 2', 'body'=>'This is awesome, thank you 2bosun']);

});


Route::get('/delete', function(){
   $user = User::find(1);
   $user->post()->whereId(1)->delete();
   $user->post()->whereId(1)->delete();
});
