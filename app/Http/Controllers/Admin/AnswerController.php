<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnswerRequest;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Question;
use App\User;
use Auth;
use Gate;
use DB ; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{ 
    public function index()
    {
        abort_if(Gate::denies('answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answers = Answer::all();

        return view('admin.answers.index', compact('answers'));
    }

    public function create()
     {
        abort_if(Gate::denies('answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.answers.create', compact('students', 'questions'));
    }

    public function store(Request $request)
    {
        $qz_id =$request->quiz_id;
$test1  = DB::table('answers')
        ->join('questions','questions.id','answers.question_id')
        ->join('quizzes','quizzes.id','questions.quiz_id')
        -> where('answers.student_id', Auth::user()->id )
       -> where('quizzes.id',$qz_id)
       ->exists();
      
if(!$test1){


  foreach ($request->input('questions', []) as $key => $question) {
           $result = 0;
           $result1 = 0;
           $result2 = 0;
        $quest =DB::table('questions')-> where('id', $question)
        ->get();
           $quizId= $quest[0]->quiz_id;
           $cor1= $quest[0]->correct_answer;
            $cor2 =$quest[0]->correct_answer_2;
            $mark =$quest[0]->mark;

            $tp =$request->input('tp.'.$question);
            if($tp== "mult"){
if($request->input('answer.'.$question) == $cor1
|| $request->input('answer2.'.$question) == $cor1
|| $request->input('answer3.'.$question) == $cor1
|| $request->input('answer4.'.$question) == $cor1)
 {$result1= $mark/2;}
            else{$result1= 0;}
if(
$request->input('answer.'.$question) == $cor2
|| $request->input('answer2.'.$question) == $cor2
|| $request->input('answer3.'.$question) == $cor2
|| $request->input('answer4.'.$question) == $cor2 )  

            {$result2= $mark/2;}
            else{$result2= 0;}
if ($result1 != 0 and $result2 != 0) {
   $result = $result1 + $result2 ;
}
else   $result = 0;
 
            }
     else if ($tp=="simple"  ) {
     if($request->input('answer.'.$question) == $cor1)
                   {
                    $result= $mark;
                   }
                   else{
                $result= 0;
            }
                }
                else
                    {
     if($request->input('answer.'.$question) == $cor1)
                   {
                    $result= $mark;
                   }
                   else{
                $result= 0;
            }
                }
     $test= Answer::create([
                 'mark'=> $result,
                 'answer' =>$request->input('answer.'.$question),
                 'answer2' =>$request->input('answer2.'.$question),
                 'answer3' =>$request->input('answer3.'.$question),
                 'answer4' =>$request->input('answer4.'.$question),
                 'student_id'      => Auth::user()->id,
                'question_id' => $question
            ]);
     
        }

       
         $answers = DB::table('quizzes')
        ->join('questions','questions.quiz_id','quizzes.id')
        ->join('answers','answers.question_id','questions.id')
       ->select('quizzes.title', 'questions.description','questions.correct_answer','questions.correct_answer_2','answers.mark','answers.answer','answers.answer2','answers.answer3','answers.answer4','questions.id' )
       -> where('answers.student_id', Auth::user()->id )
       -> where('quizzes.id', $quizId)
       ->get();

     
         $mark =  DB::table('quizzes')
        ->join('questions','questions.quiz_id','quizzes.id')
        ->join('answers','answers.question_id','questions.id')
        -> where('answers.student_id', Auth::user()->id )
       -> where('quizzes.id', $quizId)
         ->SUM('answers.mark');


        return view('admin.student.result', compact('answers','mark'));
}
    else
    {
       return redirect()->back()->with('alert','votre examen est deja enregistree !!!');
    }


    }

    
    public function edit(Answer $answer)
    {
        abort_if(Gate::denies('answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('description','id')->prepend(trans('global.pleaseSelect'), '');

        $answer->load('student', 'question');

        return view('admin.answers.edit', compact('students', 'questions', 'answer'));
    }

    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $answer->update($request->all());

        return redirect()->route('admin.answers.index');
    }

    public function show(Answer $answer)
    {
        abort_if(Gate::denies('answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->load('student', 'question');

        return view('admin.answers.show', compact('answer'));
    }

    public function destroy(Answer $answer)
    {
        abort_if(Gate::denies('answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnswerRequest $request)
    {
        Answer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}