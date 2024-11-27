<?php

use App\Livewire\Calculator;
use App\Livewire\CascadingDropdown;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('counter');

Route::get('/calculator', Calculator::class)->name('calculator');
Route::get('/todo-list', TodoList::class)->name('todo-list');
Route::get('/cascading-dropdown', CascadingDropdown::class)->name('cascading-dropdown');