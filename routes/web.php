<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/{any}', function (): View {
    return view('app');
})->where('any', '.*');
