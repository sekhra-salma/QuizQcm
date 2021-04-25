<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;
use App\Quiz;
use Gate;
use DB;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }
    public function questionQ(Quiz $quiz)
    {   
       
       $questions = Question::where('quiz_id',$quiz->id)->get();
          
        return view('admin.questions.test', compact('questions','quiz'));
    }

    //stdent list questions
     public function question(Request $req)
    {
       
        $quizId= $req->quiz_id;
        $nom_quiz=$req->nom_quiz;
       
       $test = DB::table('answers')
        ->join('questions','questions.id','answers.question_id')
        ->join('quizzes','quizzes.id','questions.quiz_id')
        -> where('answers.student_id', Auth::user()->id )
       -> where('quizzes.id',$quizId)
       ->exists();

  if(!$test) {
        $questions = Question::where('quiz_id', $quizId)->get(); 
       

            $time=DB::table('quizzes')->select('time')->where('id',$quizId)->get();
            if($time[0]->time != NULL){
          
                $tq = $time[0]->time;
           return view('admin.student.studentquestion2', compact('questions','tq','nom_quiz'));  
       }

          else{ 
               return view('admin.student.studentquestion', compact('questions','nom_quiz'));
           }

               }
               else{
                return redirect()->back()->with('alert','vous avez deja passé ce  examen !!!');
               }
    }
    

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizzes = Quiz::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questions.create', compact('quizzes'));
    }

    public function store(StoreQuestionRequest $request)
    {
       $correct_answer1 = "";
         $correct_answer2 = "";

        if($request->correct_answer == 'a')  $correct_answer1 = $request->a_option;
        elseif($request->correct_answer == 'b')  $correct_answer1 = $request->b_option;
        elseif($request->correct_answer == 'c')  $correct_answer1 = $request->c_option;
        elseif($request->correct_answer == 'd')  $correct_answer1 = $request->d_option;
         else  $correct_answer1 = $request->correct_answer;
        if($request->correct_answer_2 == 'a')  $correct_answer1 = $request->a_option;
        elseif($request->correct_answer_2 == 'b')  $correct_answer1 = $request->b_option;
        elseif($request->correct_answer_2 == 'c')  $correct_answer1 = $request->c_option;
        elseif($request->correct_answer_2 == 'd')  $correct_answer1 = $request->d_option;
        else  $correct_answer2 = "";

       
      if ($request->time == null){
         $timemn= 0;
          
      }else{
        $timem = explode(':', $request->time);

       $timemn=$timem[0]*60 + $timem[1] + $timem[2]/60;
      }
        
   
        $quiz = Question::create([
            'description'  => $request->description,
        'a_option' => $request->a_option,
        'b_option' => $request->b_option,
        'c_option' => $request->c_option,
        'd_option' => $request->d_option,
        'correct_answer' => $correct_answer1,
        'explain' => $request->explain,
        'quiz_id' => $request->quiz_id,
        'correct_answer_2' => $correct_answer2,
        'time' => $timemn ,  
        'mark' => $request->mark,
        'type' => $request->type
        ]
        );
         $questions = Question::where('quiz_id', $request->quiz_id)->get();

        return view('admin.questions.index', compact('questions'));
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizzes = Quiz::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $question->load('quiz');

        return view('admin.questions.edit', compact('quizzes', 'question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {

        $question->description = $request->description;
        $question->a_option = $request->a_option;
        $question->b_option = $request->b_option;
        $question->c_option = $request->c_option;
        $question->d_option = $request->d_option;
        $question->correct_answer = $request->correct_answer;
        $question->explain = $request->explain;
        $question->quiz_id = $request->quiz_id;
        $question->correct_answer_2 = $request->correct_answer_2;
        $timem = explode(':', $request->time);
         $timemn=$timem[0]*60 + $timem[1] + $timem[2]/60;
        $question->time = $timemn;
        $question->mark = $request->mark;
         $question->type = $request->type;
        $question->save();
        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('quiz');

        return view('admin.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}