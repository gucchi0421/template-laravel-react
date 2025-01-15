<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/{any}', function (): View {
    return view('app');
})->where('any', '.*');
