<?php

use App\Http\Controllers\Api\Candidate\CandidateController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Company\CompanyRepresentativeController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Candidate\CvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/info', [CompanyRepresentativeController::class, 'test']);

Route::post('/candidate-register', [CandidateController::class, 'store'])->name('candidate.store');
Route::post('/company-representative-login', [CompanyRepresentativeController::class, 'login'])->name('candidate.login');
Route::post('/company-representative-register', [CompanyRepresentativeController::class, 'store']);
Route::post('/user-login1', [AuthController::class ,'login1'])->middleware('is_verified');
Route::post('/email_verification/{token}', [EmailVerificationController::class , 'verify']);





// Route::post('/create-cv-step3', [CvWorkExperienceController::class ,'store']);
// Route::post('/create-cv-step4', [CvSkillsController::class ,'store']);
/* Route::post('/store-cv', [CvController::class ,'store'])->middleware('auth:api'); */

Route::prefix('candidate')->group(function () {

    Route::middleware('auth:api')->group(function () {

        Route::post('/store-cv', [CvController::class ,'store']);

    });

});
