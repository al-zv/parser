<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\VkDataResource;
use App\Models\VkData;
use App\Http\Controllers\VkDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user/{id}', function ($id) {
    return new VkDataResource(VkData::findOrFail($id));
});

Route::get('/users', function () {
    return VkDataResource::collection(VkData::all());
});