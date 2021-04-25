<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuizRequest;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Quiz;
use App\Role;
use App\User;
use App\Classe;
use Gate;
use DB;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quiz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $user = DB::table('roles')
        ->join('role_user','role_user.role_id','roles.id')
        ->join('users','users.id','role_user.user_id')
       ->select('roles.title')
       -> where('user_id', Auth::user()->id )
       ->get();
       $tea= DB::table('users')
       ->select('users.name')
        -> where('users.id',Auth::user()->id)
       ->get();
         $tt = $tea[0]->name;

      if( $user[0]->title == "User"){
        
            $quizzes = Quiz::where('teacher_id', Auth::user()->id)
            ->with('classe')
            ->get();
            $classes = Classe::all();
     
           return view('admin.quizzes.index', compact('quizzes','classes')) ;
        
         

       }
       elseif($user[0]->title == "student"){
       
        $quizzes = Quiz::where('classe_id', Auth::user()->classe_id  )
  ->with('classe')
       ->with('teacher')
       ->get();

       $idTeacher = $quizzes[0]->teacher_id;
    
       $teacherName= User::where('id', $idTeacher)->get();
     
         $roles = Role::all();
         return view('admin.student.quiz', compact('quizzes','tt','roles', 'teacherName'));
       }
       else{
        $quizzes = Quiz::all();
       
       $classes = Classe::all();
     
         return view('admin.quizzes.index', compact('quizzes','tt','classes'));
       }
   
    }
    public function report( Quiz $quiz) {
       
        dd($quiz->id);
         
       //dd($answers);
       return view('admin.answers.resultStudent', compact('answers'));

    } 
        //stdent list questions
     public function QuestionStudent( Request $req)
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $quizId= $req->quiz_id;
        
        $questions = Question::where('quiz_id',$quizId)->get();
        dd($questions);

        return view('admin.student.studentquestion', compact('questions'));
    }
    //fin

    public function create()
    {
        abort_if(Gate::denies('quiz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quizzes.create', compact('teachers'));
    }

    public function store(StoreQuizRequest $request)
    {
       // $quiz = Quiz::create($request->all());
        $quiz = new Quiz();
        $quiz->title = $request->title;
        $quiz->module= $request->module;
        $quiz->nb_qst= $request->nb_qst;
        $quiz->time= $request->time;
        $quiz->classe_id= $request->classe_id;
        $quiz->teacher_id=Auth::user()->id;
        
        
      $quiz->save();
        return redirect()->route('admin.quizzes.index');
    }

    public function edit(Quiz $quiz)
    {
        

        $teachers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quiz->load('teacher');

        return view('admin.quizzes.edit', compact('teachers', 'quiz'));
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->all());

        return redirect()->route('admin.quizzes.index');
    }

    public function show(Quiz $quiz)
    {
        //abort_if(Gate::denies('quiz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');//$quiz->load('teacher');
       
        $answers = DB::table('quizzes')
        ->join('questions','questions.quiz_id','quizzes.id')
        ->join('answers','answers.question_id','questions.id')
        ->join('users','answers.student_id','users.id')
        ->join('role_user','role_user.user_id','users.id')
        ->join('roles','roles.id','role_user.role_id')
        ->join('classes','users.classe_id','classes.id')
       ->select('quizzes.title','classes.name as classe','quizzes.module','users.name',DB::raw('SUM(answers.mark)  as result'))
       -> where('roles.title', 'student' )
        -> where('quizzes.id', $quiz->id )
       ->groupby('users.name')
       ->get();
       

        return view('admin.quizzes.report', compact('answers'));
    }

    public function destroy(Quiz $quiz)
    {
        abort_if(Gate::denies('quiz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quiz->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuizRequest $request)
    {
        Quiz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}