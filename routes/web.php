<?php 

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

Route::get('/test', function () {

    return view('admin.student.test');
});

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    Route::get('teacher','UsersController@getTeacher')->name('teacher');
    Route::get('student','UsersController@getStudent')->name('student');
 Route::post('import','UsersController@import')->name('import');
Route::post('importstd','UsersController@importstd')->name('importstd');
Route::get('export','UsersController@export')->name('export');
Route::get('exportp','UsersController@exportp')->name('exportp');


    // Teachers
    Route::delete('teachers/destroy', 'TeacherController@massDestroy')->name('teachers.massDestroy');
    Route::resource('teachers', 'TeacherController');

    // Quizzes
    Route::delete('quizzes/destroy', 'QuizController@massDestroy')->name('quizzes.massDestroy');
    Route::resource('quizzes', 'QuizController');
Route::get('report','QuizController@report')->name('report');
    // Questions
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions','QuestionController');

Route::get('question','QuestionController@question')->name('question');

Route::get('questionQ/{quiz}','QuestionController@questionQ')->name('questionQ');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentController');

    // Answers
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswerController');
    Route::get('resultat','AnswerController@resultat')->name('resultat');

    // Classes
    Route::delete('classes/destroy', 'ClasseController@massDestroy')->name('classes.massDestroy');
    Route::resource('classes', 'ClasseController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
