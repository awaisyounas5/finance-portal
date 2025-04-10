<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FinancialAdvisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MacroeconomicDocumentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\QnaController;

// Import the middleware
use App\Http\Middleware\CheckUserRole;

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');

// macroeconomic-documents routes
Route::get('/macroeconomic_outlook/view_documents', [MacroeconomicDocumentController::class, 'index'])->name('macroeconomic-outlook.view-documents');
Route::get('/macroeconomic_outlook/upload_outlook_document', [MacroeconomicDocumentController::class, 'create'])->name('macroeconomic-outlook.upload-document');
Route::post('/macroeconomic_outlook/upload_outlook_document', [MacroeconomicDocumentController::class, 'store'])->name('macroeconomic-outlook.store-document');
Route::delete('/macroeconomic_outlook/delete_outlook_document/{macroeconomic_document}', [MacroeconomicDocumentController::class, 'destroy'])->name('macroeconomic-outlook.delete-document');
Route::get('/macroeconomic_outlook/edit_outlook_document/{macroeconomic_document}', [MacroeconomicDocumentController::class, 'edit'])->name('macroeconomic-outlook.edit-document');
Route::put('/macroeconomic_outlook/update_outlook_document/{macroeconomic_document}', [MacroeconomicDocumentController::class, 'update'])->name('macroeconomic-documents.update');

// Apply the middleware to the financial advisor routes
Route::middleware([CheckUserRole::class])->group(function () {
    Route::post('/financial_advisors', [FinancialAdvisorController::class, 'store'])->name('financial_advisors.store');
    Route::get('/financial_advisors', [FinancialAdvisorController::class, 'index'])->name('financial_advisors.index');
    Route::delete('financial_advisors/{financial_advisor}', [FinancialAdvisorController::class, 'destroy'])->name('financial_advisors.destroy');
    Route::get('financial_advisors/{financial_advisor}/edit', [FinancialAdvisorController::class, 'edit'])->name('financial_advisors.edit');
    Route::put('financial_advisors/{financial_advisor}', [FinancialAdvisorController::class, 'update'])->name('financial_advisors.update');
    Route::delete('/macroeconomic-documents/{id}/{filename}', [MacroeconomicDocumentController::class, 'delete'])->name('macroeconomic-documents.delete');
});

// Notifications
Route::get('/notifications/view_notifications', [NotificationsController::class, 'index'])->name('notifications.view-notifications');
Route::post('/notifications/create', [NotificationsController::class, 'store'])->name('notifications.create');
Route::put('/notifications/update_status/{id}', [NotificationsController::class, 'updateStatus'])->name('notifications.update_status');
Route::delete('/notifications/{financial_advisor}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');
Route::get('/macroeconomic_outlook/edit_outlook_document/{macroeconomic_document}', [MacroeconomicDocumentController::class, 'edit'])->name('macroeconomic-outlook.edit-document');
Route::put('/macroeconomic_outlook/update_outlook_document/{macroeconomic_document}', [MacroeconomicDocumentController::class, 'update'])->name('macroeconomic-documents.update');


Route::middleware([CheckUserRole::class])->group(function () {
    Route::get('/documents/all', [DocumentController::class, 'indexAll'])->name('documents.indexAll');
    Route::get('/view_all_questionnaires', [QnaController::class, 'indexAll'])->name('view_all_questionnaires.index');
});

// Documents
Route::get('/document', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/document', [DocumentController::class, 'store'])->name('document.store');
Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
Route::get('/documents/view', [DocumentController::class, 'index'])->name('documents.view');

// QnA
Route::get('/sent_questionnaires', [QnaController::class, 'index'])->name('sent_questionnaires.index');
Route::get('/sent_questionnaires/{questionnaire}/edit', [QnaController::class, 'edit'])->name('sent_questionnaires.edit');
Route::put('/sent_questionnaires/{questionnaire}', [QnaController::class, 'update'])->name('sent_questionnaires.update');
Route::delete('/sent_questionnaires/{questionnaire}', [QnaController::class, 'destroy'])->name('sent_questionnaires.destroy');
Route::get('/sent_questionnaires/view', [QnaController::class, 'index'])->name('sent_questionnaires.view');
Route::get('/send_questionnaire', [QnaController::class, 'create'])->name('send_questionnaire.create');
Route::post('/send_questionnaire', [QnaController::class, 'store'])->name('send_questionnaire.store');



Route::get('/', function () {
    return view('auth/login');
});

Route::get('/inbox', function () {
    return view('messaging/inbox');
})->name('inbox');

Route::get('/create_notification', function () {
    return view('notifications/create');
})->name('create_notification');

Route::get('/create_financial_advisor', function () {
    return view('financial_advisors/create_financial_advisor');
})->name('create_financial_advisor');


Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/upload_fund_recommendation_pdf', function () {
    return view('funds_recommendation/upload_fund_recommendation');
})->name('upload_fund_recommendation_pdf');

Route::get('/fixed_income_munis_core', function () {
    return view('funds_recommendation/fixed_income_munis_core');
})->name('fixed_income_munis_core');

Route::get('/fixed_income_munis_high_yield', function () {
    return view('funds_recommendation/fixed_income_munis_high_yield');
})->name('fixed_income_munis_high_yield');

Route::get('/fixed_income_taxable_core', function () {
    return view('funds_recommendation/fixed_income_taxable_core');
})->name('fixed_income_taxable_core');

Route::get('/fixed_income_taxable_multi_sector', function () {
    return view('funds_recommendation/fixed_income_taxable_multi_sector');
})->name('fixed_income_taxable_multi_sector');

Route::get('/fixed_income_taxable_high_yield', function () {
    return view('funds_recommendation/fixed_income_taxable_high_yield');
})->name('fixed_income_taxable_high_yield');

Route::get('/general_emerging_markets', function () {
    return view('funds_recommendation/general_emerging_markets');
})->name('general_emerging_markets');

Route::get('/general_foriegn_large_cap_blend', function () {
    return view('funds_recommendation/general_foriegn_large_cap_blend');
})->name('general_foriegn_large_cap_blend');

Route::get('/general_fund_holdings', function () {
    return view('funds_recommendation/general_fund_holdings');
})->name('general_fund_holdings');

Route::get('/general_large_cap_blend', function () {
    return view('funds_recommendation/general_large_cap_blend');
})->name('general_large_cap_blend');

Route::get('/general_large_cap_growth', function () {
    return view('funds_recommendation/general_large_cap_growth');
})->name('general_large_cap_growth');

Route::get('/general_large_cap_value', function () {
    return view('funds_recommendation/general_large_cap_value');
})->name('general_large_cap_value');

Route::get('/general_mid_cap_growth', function () {
    return view('funds_recommendation/general_mid_cap_growth');
})->name('general_mid_cap_growth');

Route::get('/general_small_cap', function () {
    return view('funds_recommendation/general_small_cap');
})->name('general_small_cap');

Route::get('/upload_portfolio', function () {
    return view('portfolio/upload_portfolio');
})->name('upload_portfolio');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
