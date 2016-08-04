<?php

###########################################################################
#                           FOR PAGES PART HERE                           #
###########################################################################

Route::get('/', function () {
    return view('website.index');
});

Route::get('/home', function () {
    return redirect('user');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/service', function () {
    return view('website.service');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/ministry', function () {
    return view('website.ministry');
});

Route::get('/events', function () {
    return view('website.events');
});


###########################################################################
#                           FOR SYSTEM ROUTES                             #
###########################################################################

Route::get('/login',function(){
    return view('login');
});

Route::get('/register',function(){

    if(Auth::check()){
        return view('errors.404');
    }

    return view('register');
});

Route::get('/logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::resource('/user','UserController');
Route::resource('/requirement','RequirementController');
Route::resource('/type','TypeController');
Route::resource('/schedule','ScheduleController');
Route::resource('/reservation','ReservationController');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('/reservation/create/{user_id}',function($user_id){

    $types = App\Type::all();

    return view('reservations.add')->with([
        'user_id'   => $user_id,
        'types'  => $types
    ]);
});



Route::get('/password/email','Auth\PasswordController@getEmail');
Route::post('/password/email','Auth\PasswordController@postEmail');
Route::get('/password/reset/{token}','Auth\PasswordController@getReset');
Route::post('/password/reset','Auth\PasswordController@postReset');

Route::get('/user_profile',function(){

    if(!Auth::check()) abort(404);

    $user = Auth::user();
    $reservations = $user->reservation;
    $types = App\Type::all();

    return view('users.show')->with([
      'user' => $user,
      'reservations' => $reservations,
      'types' => $types
    ]);

});


Route::get('/test',function(){
    print_r(Auth::user());
});

