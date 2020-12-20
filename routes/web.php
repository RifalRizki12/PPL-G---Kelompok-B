<?php

use Illuminate\Support\Facades\Auth;
use illuminate\support\facades\Route;

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

//AWAL MASUK
Route::get('/', 'SiteController@home');
Route::get('/contact', 'SiteController@contact');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');


//LOGIN
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Auth::routes();

Route::get('lowongan', 'Frontend\LowonganController@index');

//frontend
// Route::get('lowongan/{category_url}', 'Frontend\LowonganController@categoryview');
// Route::get('lowongan/{category_url}/{job_url}', 'Frontend\LowonganController@jobview');


//User
Route::group(['middleware' => ['auth', 'isUser']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profil', 'Frontend\UserController@myprofile');
    Route::post('/profil-update', 'Frontend\UserController@profilupdate');
});


//ADMIN
Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('/dashboard', 'Admin\AdminController@index');

    //edit profil admin
    Route::get('/profil-admin', 'Admin\AdminController@myprofile');
    Route::post('/profil-admin-update', 'Admin\AdminController@profilupdate');

    //mengelola pemilik dan pencari
    Route::get('daftar-user', 'Admin\RegisteredController@index');
    Route::get('role-edit/{id}', 'Admin\RegisteredController@edit');
    Route::put('role-update/{id}', 'Admin\RegisteredController@updaterole');

    //Kategori
    Route::get('category', 'Admin\CategoryController@index');
    Route::get('kategori-baru', 'Admin\CategoryController@viewpage');
    Route::post('simpan-category', 'Admin\CategoryController@store');
    Route::get('edit-kategori/{id}', 'Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'Admin\CategoryController@update');
    Route::get('hapus-kategori/{id}', 'Admin\CategoryController@delete');
    Route::get('kategori-terhapus', 'Admin\CategoryController@deletedcategory');
    Route::get('kembalikan-kategori/{id}', 'Admin\CategoryController@deletedrestore');

    //lowongan
    Route::get('/lowongan', 'Admin\jobController@index');
    // Route::get('lowongan-baru', 'Admin\jobController@create');
    // Route::post('/simpan-lowongan', 'Admin\jobController@store');
    Route::get('edit-lowongan/{id}', 'Admin\jobController@edit');
    Route::put('update-lowongan/{id}', 'Admin\jobController@update');
    Route::get('hapus-lowongan/{id}', 'Admin\jobController@delete');
});


//PEMILIK
Route::group(['middleware' => ['auth', 'isPemilik']], function () {

    // Route::get('/pemilik-dashboard', function () {
    //     return view('pemilik.dashboard');
    // });

    Route::get('/pemilik-dashboard', 'Pemilik\PemilikController@index',);

    //edit profil pemilik
    Route::get('/profil-pemilik', 'Pemilik\PemilikController@myprofile');
    Route::post('/profil-pemilik-update', 'Pemilik\PemilikController@profilupdate');

    //membuat lowongan dan mengelola
    Route::get('/lowongan-pemilik', 'Pemilik\jobController@index');
    Route::get('lowongan-pemilik-baru', 'Pemilik\jobController@create');
    Route::post('/simpan-lowongan-pemilik', 'Pemilik\jobController@store');
    Route::get('edit-lowongan-pemilik/{id}', 'Pemilik\jobController@edit');
    Route::put('update-lowongan-pemilik/{id}', 'Pemilik\jobController@update');
    Route::get('hapus-lowongan-pemilik/{id}', 'Pemilik\jobController@delete');

    // Lihat Pencari Kerja
    Route::get('posts/{category_url}', 'Pemilik\ViewpostController@categoryview');
    Route::get('posts/{category_url}/{worker_url}', 'Pemilik\ViewpostController@postview');
});

//Pencari
Route::group(['middleware' => ['auth', 'isPencari']], function () {

    // Route::get('/pencari-dashboard', function () {
    //     return view('pencari.dashboard');
    // });

    Route::get('/pencari-dashboard', 'Pencari\PencariController@index');

    //edit profil pencari
    Route::get('/profil-pencari', 'Pencari\PencariController@myprofile');
    Route::post('/profil-pencari-update', 'Pencari\PencariController@profilupdate');

    // edit post pencari
    Route::get('/post-pencari', 'Pencari\PostController@mypost');
    Route::get('/edit-post-pencari/{id}', 'Pencari\PostController@edit');
    Route::put('/update-post-pencari/{id}', 'Pencari\PostController@postupdate');

    // Lihat Lowongan
    Route::get('lowongan/{category_url}', 'Pencari\LowonganController@categoryview');
    Route::get('lowongan/{category_url}/{job_url}', 'Pencari\LowonganController@jobview');
    Route::put('/send-request/{id}', 'Pencari\SendController@sendrequest');
});
