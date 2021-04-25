<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Teachers
    Route::apiResource('teachers', 'TeacherApiController');

    // Quizzes
    Route::apiResource('quizzes', 'QuizApiController');

    // Questions
    Route::apiResource('questions', 'QuestionApiController');

    // Students
    Route::apiResource('students', 'StudentApiController');

    // Answers
    Route::apiResource('answers', 'AnswerApiController');
});