<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NewbookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [MainController::class, 'login_function'])
->name('login');

Route::get('/register', [MainController::class, 'register_function'])
  ->name('registeration');

Route::Post('/register', [MainController::class, 'store_user'])
  ->name('register_user');

  Route::get('/home', [MainController::class, 'home'])
  ->name('home');

  Route::post('/login', [MainController::class, 'signin'])
  ->name('signin');

  Route::get('/home', [MainController::class, 'home_page'])->middleware('auth')
  ->name('home_page');

  Route::get('/logout', [MainController::class, 'logout'])
  ->name('logout');

  Route::get('/product', [ProductController::class, 'product_page'])->middleware('auth')
  ->name('product_page');

  Route::post('/register_product', [ProductController::class, 'register_product'])->middleware('auth')
  ->name('register_product');

  Route::get('/delete_product/{id}', [ProductController::class, 'delete_product'])->middleware('auth')
  ->name('delete_product');

  Route::post('/sell_product/{id}', [ProductController::class, 'sell_product'])->middleware('auth')
  ->name('sell_product');


  //new book routes

  Route::get('/book', [NewbookController::class, 'new_book'])->middleware('auth')
   ->name('new_book');

   Route::post('/register_book', [NewbookController::class, 'register_book'])->middleware('auth')
  ->name('register_book');

  Route::get('/all_books', [NewbookController::class, 'all_books'])->middleware('auth')
   ->name('all_books');

   Route::get('/view_details/{id}', [NewbookController::class, 'view_details'])->middleware('auth')
   ->name('view_details');

   Route::get('/delete_book/{id}', [NewbookController::class, 'delete_book'])->middleware('auth')
  ->name('delete_book');

  Route::get('/edit/{id}', [NewbookController::class, 'edit'])->middleware('auth')
  ->name('edit');

  Route::post('/edit/{id}', [NewbookController::class, 'update'])->middleware('auth')
  ->name('edit');
  



   /*
   reg number: 20136/2022
   name: Emmanuel George

   Q5.
   I started my project my adding a list to my min layout, 
   so in the main lyout I add 'All book, and New Bood'

   New Book: this is a session used to add new book to our page
   All book: is a session used to view all books in our store

   the I have a tag to view a specific book and edit it
   
   */

  
