<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Quiz;
use App\Classe;
use DB;
use Auth;
class HomeController
{
  public function index(){

    $user = DB::table('roles')
          ->join('role_user','role_user.role_id','roles.id')
          ->join('users','users.id','role_user.user_id')
         ->select('roles.title')
         -> where('user_id', Auth::user()->id )
         ->get(); 
   $teachers=  DB::table('users')
          ->join('role_user','role_user.user_id','users.id')
          ->join('roles','roles.id','role_user.role_id')
         -> where('roles.title','User')
         ->get();
          $students=  DB::table('users')
          ->join('role_user','role_user.user_id','users.id')
          ->join('roles','roles.id','role_user.role_id')
         -> where('roles.title','student')
         ->get();
         $classes= Classe::all();
         $quiz=Quiz::all();
    $resulats =  DB::table('quizzes')
        ->join('questions','questions.quiz_id','quizzes.id')
        ->join('answers','answers.question_id','questions.id')
        ->select('quizzes.title', 'quizzes.module', DB::raw('SUM(answers.mark)  as result'))
        -> where('answers.student_id', Auth::user()->id)
       ->get();

          if ( $user[0]->title == "User") {
            return view('teacherDashboard', compact('quiz','teachers','students','classes'));
          }elseif($user[0]->title == "student"){

            return view('studentDashborad', compact('quiz','teachers','students','classes', 'resulats'));    
          }
           return view('home', compact('quiz','teachers','students','classes')); 
        }
}