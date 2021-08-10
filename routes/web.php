<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/',[ContactController::class,'allData'])->name('index');

Route::get('/add_contact', function () {
    return view('add_contact');
})->name('add_contact');

Route::post('/add_contact', [ContactController::class,'addContact'])->name('contact-form');

Route::get(
    '/{id}/update',
    [ContactController::class,'updateContact']
    )->name('contact-update');

Route::post(
    '/{contact_id}/update',
    [ContactController::class,'updateContactSubmit']
    )->name('contact-update-submit');
    
Route::get(
    '/{id}/delete',
    [ContactController::class,'deleteContact']
    )->name('contact-delete');
