<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\SignController;

Route::get('/', [PeopleController::class, 'index']);
Route::get('search', [PeopleController::class, 'search']);
Route::get('people-list', [PeopleController::class, 'list']);

// Види PERSON:
Route::get('person/create', function () {   return view('pages.person.create'); });
Route::get('person/{id}', [PeopleController::class, 'person']);
Route::get('person/{id}/edit', [PeopleController::class, 'contacts']);
Route::get('person/{id}/open_answer/{field}', [PeopleController::class, 'openAnswer']);

Route::get('person/{id}/stories', [PeopleController::class, 'stories']);
Route::get('person/{id}/stories/create', [PeopleController::class, 'new_history']);
Route::get('person/{id}/stories/{history_id}', [PeopleController::class, 'edit_history']);

Route::get('person/{id}/photos', [PeopleController::class, 'photos']);
Route::get('person/{id}/photos/create', [PeopleController::class, 'upload_photos']);
Route::get('person/{id}/photos/{photo_id}', [PeopleController::class, 'photo_edit']);

// Файли:
Route::get('files', [SignController::class, 'list']); // А нащо цей роут???



Route::get('backups', function () {
    return view('pages/backups');
});


Route::get('/export',function(){
	shell_exec("/Users/Shared/DBngin/mysql/8.0.33/bin/mysqldump -h 127.0.0.1 -u root people > /Users/vladsalabun/Herd/people/public/uploaded_files/backups/main.sql");
});




Route::get('templates-viewer', function () {
    return view('templates/templates-viewer');
});



Route::group(['prefix' => 'example_view'], function () {
    Route::get('question_view', function () { return view('example_views.question_view'); });
});


/*
Route::get('templates/forms/buttons', function () { return view('buttons.buttons'); });
Route::get('templates/forms', function () { return view('forms.form-doc.text-doc'); });
Route::get('templates/forms/hidden-input', function () { return view('forms.form-doc.hidden-doc'); });
Route::get('templates/forms/text-input', function () { return view('forms.form-doc.text-doc'); });
Route::get('templates/forms/text-editor', function () { return view('forms.form-doc.text-editor-doc'); });
Route::get('templates/forms/select-input', function () { return view('forms.form-doc.select-doc'); });
Route::get('templates/forms/number-input', function () { return view('forms.form-doc.number-doc'); });
Route::get('templates/forms/textarea-input', function () { return view('forms.form-doc.textarea-doc'); });
Route::get('templates/forms/radio-input', function () { return view('forms.form-doc.radio-doc'); });
Route::get('templates/forms/checkbox-input', function () { return view('forms.form-doc.checkbox-doc'); });
Route::get('templates/forms/datepicker-input', function () { return view('forms.form-doc.date-doc'); });
Route::get('templates/forms/datetime-input', function () { return view('forms.form-doc.datetime-doc'); });
Route::get('templates/forms/js-handler', function () { return view('forms.form-doc.js-form-handler'); });
*/