@extends('layouts.admin')

@section('content')
@can('question_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
       
        </div>
    </div>
@endcan

  
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
  <style type="text/css">

label{
  position: relative;
  cursor: pointer;
  color: #666;
  font-size: 25px;
}

input[type="checkbox"], input[type="radio"]{
  position: absolute;
  right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
  content: "\f0c8";
  font-family: "Font Awesome 5 Free";
  speak: none;
  font-style: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 5px;
  font-size: large;
}

input[type="checkbox"]:checked + .label-text:before{
  content: "\f14a";
  color: #2980b9;
  animation: effect 250ms ease-in;
  font-weight: 900;
}

input[type="checkbox"]:disabled + .label-text{
  color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
  content: "\f0c8";
  color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
  content: "\f111";
  font-family: "Font Awesome 5 Free";
  speak: none;
  font-style: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 5px;
  font-size: large;
}

input[type="radio"]:checked + .label-text:before{
  content: "\f192";
  color: #8e44ad;
  animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
  color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
  content: "\f111";
  color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
  content: "\f204";
  font-family: "Font Awesome 5 Free";
  speak: none;
  font-style: normal;
  font-weight: 900;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
  content: "\f205";
  color: #16a085;
  animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
  color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
  content: "\f204";
  color: #ccc;
}


@keyframes effect{
  0%{transform: scale(0);}
  25%{transform: scale(1.3);}
  75%{transform: scale(1.4);}
  100%{transform: scale(1);}
}
  </style>
<div class="card">
  
  <div class="card-header page-title" style="font-size: 28px;
    color: #666;
    margin: 0 0 15px;
    font-weight: 300;"><i class="fa fa-question" aria-hidden="true"></i> <b>  {{ $nom_quiz }} </b> </div>



    <div class="card-body">
      <div class="table-responsive" id="question-divv">
             <div class="questions" id="question-div">
<form action="{{ route("admin.answers.store") }}" method="POST" id="form1">
            @csrf
            <?php 
           $i=1; ?>
             <div style="height: 10px; margin-bottom: 50px;" id="display"  > </div>
         
            <input type="hidden" id="time" name="time"  value="{{ $tq }}">
             @foreach($questions as $key => $question)
 <input type="hidden" id="quiz" name="quiz_id" value=" {{ $question->quiz_id ?? ''}}">
        @if (  $question->type   == "simple")
           
            <div  id="div-<?=$i;?>" class="question ">
                
                

  <div class="mb-3 step">
              <h4><b> Question {{ $i }} : </b>   {{ $question->description ?? '' }}</h4>
      <input type="hidden" name="questions[{{ $i }}]" value=" {{ $question->id ?? '' }}" id="{{ $question->id ?? '' }}" /> 
      <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >

                   
              <div class="form-check">     
              
                <label >
            <input class="form-check-input"  type="radio"  name="answer[{{ $question->id }}]" value="{{ $question->a_option ?? '' }}"  >
                  <span class="label-text"> {{ $question->a_option ?? '' }}</span></label>
              </div>
 <div class="form-check">
              
               <label   > <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" value="{{ $question->b_option ?? '' }}"   > <span class="label-text">{{ $question->b_option ?? '' }}</span></label>  </div>
 <div class="form-check">
               
                <label  > <input class="form-check-input" type="radio"  name="answer[{{ $question->id }}]" value="{{ $question->c_option ?? '' }}"   > 
                  <span class="label-text">{{ $question->c_option ?? '' }}</span></label>  </div>
                 <div class="form-check">
                
                <label  ><input class="form-check-input" type="radio"   name="answer[{{ $question->id }}]" value="{{ $question->d_option ?? '' }}"   >
               <span class="label-text"> {{ $question->d_option ?? '' }}</span></label>
                  </div>
                <hr />
                 
            </div>
</div>
            @elseif($question->type   == "mult")
            <div  id="div-<?=$i;?>" class="question ">
                
              

         <div class="mb-3 step">   
               <h4><b> Question {{ $i }} : </b>   {{ $question->description ?? '' }}</h4>
      <input type="hidden" name="questions[{{ $i }}]" value=" {{ $question->id ?? '' }}" id="{{ $question->id ?? '' }}" /> 
      <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >

                   
<div class="form-check  ">  
              <label  >  
               <input type="checkbox"  name="answer[{{ $question->id }}]" value="{{ $question->a_option ?? '' }}"   >
              <span class="label-text">  {{ $question->a_option ?? '' }}</span></label>   </div>
<div class="form-check">  
               <label > 
                <input type="checkbox" name="answer2[{{ $question->id }}]" value="{{ $question->b_option ?? '' }}"  >
                 <span class="label-text">  {{ $question->b_option ?? '' }}</span>
              </label>   </div>
<div class="form-check">  
                <label  >
                 <input type="checkbox"  name="answer3[{{ $question->id }}]" value="{{ $question->c_option ?? '' }}"  >
                 <span class="label-text">{{ $question->c_option ?? '' }}</span></label>  
                  </div>
<div class="form-check">  
               <label  >  <input type="checkbox"  name="answer4[{{ $question->id }}]" value="{{ $question->d_option ?? '' }}" >
                <span class="label-text">{{ $question->d_option ?? '' }}</span></label>
                  </div> <hr />
                 
            </div>
           </div> 
            @else
            <div  id="div-<?=$i;?>" class="question ">
                
              

 <div class="mb-3 step">   
          <h4><b> Question {{ $i }} : </b>   {{ $question->description ?? '' }}</h4>
      <input type="hidden" name="questions[{{ $i }}]" value=" {{ $question->id ?? '' }}" id="{{ $question->id ?? '' }}" /> 
      <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >
<input type="text"  name="answer[{{ $question->id }}]"  class="form-control"  >
            <hr />
                 
            </div>
            @endif
            <?php 
           $i++;?>
            @endforeach
            
           
           
           
            <center><button  id="submit"   type="submit" style="font-size: 20px;"  required  class="btn btn-primary btn-sm   ">Valider</button></center>
        </form>
    </div>
    </div>  
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent


<script type="text/javascript">
 
          function CountDown(duration, display) {
            if (!isNaN(duration)) {
              var timer = duration, minutes, seconds;  
              var interVal=  setInterval(function () {
                 heurs = parseInt(timer / 3600, 10);
                    minutes = parseInt((timer % 3600) / 60, 10);
                    seconds = parseInt(timer % 60, 10);
                   
                    heurs = heurs < 10 ? "0" + heurs : heurs;
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<h3 style='margin-left: 950px;  '>"+ heurs +" H :" + minutes + "m : " + seconds + "s" + "</h3>");
                    if (--timer < 0) {
                        timer = duration;
                      SubmitFunction();
                     
                      clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
          
           $("#submit").click();
          
           
        
        
        }
   
        var time =  document.getElementById('time').value;
  var a = time.split(':'); 
  var times = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
console.log(times);
  CountDown(times,$('#display'));
      
</script> 

@endsection