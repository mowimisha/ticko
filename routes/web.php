<?php
Route::redirect('home', 'admin-dash', 301);


Route::get('login',  'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmFormweb');
Route::post('password/confirm ', 'Auth\ConfirmPasswordController@confirm');
Route::post('password/email',  'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

//FRONTEND
Route::get('/', 'FrontEndController@index');
Route::get('event-details/{id}', 'FrontEndController@get_event_details');
Route::get('buyer-register', 'FrontEndController@buyer');
Route::post('buyer-register', 'FrontEndController@register_buyer');
Route::get('seller-register', 'FrontEndController@seller');
Route::post('seller-register', 'FrontEndController@register_seller');

Route::group(['/middleware' => ['auth']], function () {

    Route::get('/admin-dash', 'DevController@home');
    //USERS
    Route::get('all-users-dev', 'DevController@users');
    Route::get('new-user-dev', 'DevController@create');
    Route::post('new-user-dev', 'DevController@create_user');
    Route::get('/edit-user-dev/{id}', 'DevController@edit');
    Route::post('/update-user-dev/{id}', 'DevController@update');
    Route::get('/delete-user-dev/{id}', 'DevController@destroy');
    //POSTS
    Route::get('all-posts-dev', 'DevController@posts');
    Route::get('new-post-dev', 'DevController@create_post');
    Route::post('new-post-dev', 'DevController@insert_post');
    Route::get('/edit-post-dev/{id}', 'DevController@edit_post');
    Route::post('/update-post-dev/{id}', 'DevController@update_post');
    Route::get('/delete-post-dev/{id}', 'DevController@destroy_post');
    //TICKETS
    Route::get('all-tickets-dev', 'DevController@tickets');
    Route::get('new-ticket-dev', 'DevController@create_ticket');
    Route::post('new-ticket-dev', 'DevController@insert_ticket');
    Route::get('/show-ticket-dev/{id}', 'DevController@show_ticket');
    Route::get('/validate-tickets-dev', 'DevController@validate_ticket');
    Route::post('/validate-tickets-dev', 'DevController@check_ticket');
    // Route::get('/edit-ticket-dev/{id}', 'DevController@edit');
    // Route::post('/update-ticket-dev/{id}', 'DevController@update');
    Route::get('/delete-ticket-dev/{id}', 'DevController@destroy_ticket');
    //PAYMENTS
    Route::get('all-payments-dev', 'DevController@payments');

    /***********************************************************************************
     * ***************       ADMIN CONTROLLERS     **************************************/

    //USERS
    Route::get('all-users', 'AdminController@users');
    Route::get('new-user', 'AdminController@create');
    Route::post('new-user', 'AdminController@create_user');
    Route::get('/edit-user/{id}', 'AdminController@edit');
    Route::post('/update-user/{id}', 'AdminController@update');
    Route::get('/delete-user/{id}', 'AdminController@destroy');
    //POSTS
    Route::get('all-posts', 'AdminController@posts');
    Route::get('new-post', 'AdminController@create_post');
    Route::post('new-post', 'AdminController@insert_post');
    Route::get('/edit-post/{id}', 'AdminController@edit_post');
    Route::post('/update-post/{id}', 'AdminController@update_post');
    Route::get('/delete-post/{id}', 'AdminController@destroy_post');
    //TICKETS
    Route::get('all-tickets', 'AdminController@tickets');
    Route::get('new-ticket', 'AdminController@create_ticket');
    Route::post('new-ticket', 'AdminController@insert_ticket');
    Route::get('/show-ticket/{id}', 'AdminController@show_ticket');
    Route::get('/validate-tickets', 'AdminController@validate_ticket');
    Route::post('/validate-tickets', 'AdminController@check_ticket');
    // Route::get('/edit-ticket/{id}', 'AdminController@edit');
    // Route::post('/update-ticket/{id}', 'AdminController@update');
    Route::get('/delete-ticket/{id}', 'AdminController@destroy_ticket');
    //PAYMENTS
    Route::get('all-payments', 'AdminController@payments');
});
