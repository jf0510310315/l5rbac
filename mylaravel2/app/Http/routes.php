<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');



//权限控制路由
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //Rbac
    Route::group(['prefix'=>'rbac','namespace'=>'Rbac'],function(){
        Route::resource('role', 'RoleController');
        Route::get('role/{id}/permissions',['as'=>'admin.rbac.role.permissions','uses'=>'RoleController@getPerms']);
        Route::post('role/{id}/permissions',['as'=>'admin.rbac.role.permissions','uses'=>'RoleController@postPerms']);
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
    });
    Route::resource('blog', 'BlogController');
});
/*
Entrust::routeNeedsRole( 'home', 'Admin' );
Route::get('home', function(){
    if(Entrust::hasRole('Admin')){
        return 1;
    }else{
        return 2;
    }
});

//test entrust
Route::get('entrust', 'TestEntrust\TestEntrustController@index');
Route::get('addp', 'TestEntrust\TestEntrustController@addPermission');
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
