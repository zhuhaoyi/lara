<?php
//use app\test;
//Route::get('/', 'HomeController@index');
Route::get('/',['as'=>'deemo', function(){
    echo session('ddd');
    return '<a href="/guestbook">test</a>';
}]);

Route::resource('guestbook','guestbook');

Route::get('/guestbook/{id}/delete','guestbook@delete');

Route::get('/test',function(){
    return back()->with(['ddd'=>'ccc']);
});

Auth::routes();

Route::get('/test',function(){
    var_dump(App\test::count());
});
Auth::routes();

Route::get('/home', 'HomeController@index');
