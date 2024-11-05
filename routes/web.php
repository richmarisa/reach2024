<?php

use Illuminate\Support\Facades\Route;

Route::get('/',     \App\Livewire\Home::class);
Route::get('/admin/resources',     \App\Livewire\Resources::class);
Route::get('/admin/projects',      \App\Livewire\Projects::class);

