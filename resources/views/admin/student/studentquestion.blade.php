@extends('layouts.admin')

@section('content')
@can('question_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
       
        </div>
    </div>
@endcan

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
    font-weight: 300;"><i class="fa fa-list-ul" aria-hidden="true"></i> <b>  {{ $nom_quiz }} </b> </div>
  
    <div class="card-body">
      <div class="container">
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

        
  <h3 id="time" class="mb-5">0:00</h3>
  <form action="{{ route("admin.answers.store") }}" method="POST" id="form1">
      @csrf
      
       @foreach($questions as $key => $question)
      <input type="hidden" id="quiz" name="quiz_id" value=" {{ $question->quiz_id ?? ''}}">
            @if ( $question->type   == "mult" ) 

             
    <div class="mb-3 step">
      <h4><b> Question {{ $key+1 }} : </b>   {{ $question->description ?? '' }}</h4>
          <input type="hidden" name="questions[{{ $key}}]" value=" {{ $question->id ?? '' }}" id="question-id" /> 
          <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >
         
      <div class="form-check">
 <label >
            <input type="checkbox"  name="answer[{{ $question->id }}]" value="{{ $question->a_option ?? '' }}"  >
          <span class="label-text">  {{ $question->a_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
     
          <label > 
        <input type="checkbox" name="answer2[{{ $question->id }}]" value="{{ $question->b_option  }}"> 
            <span class="label-text">{{ $question->b_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
         
          <label >
   <input type="checkbox"  name="answer3[{{ $question->id }}]" value="{{ $question->c_option  }}" >  
        <span class="label-text">   {{ $question->c_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
        
          <label > <input type="checkbox"  name="answer4[{{ $question->id }}]" value="{{ $question->d_option }}"  > 
          <span class="label-text"> {{ $question->d_option ?? '' }}</span>
          </label>
      </div>
    </div>  
     @elseif($question->type   == "simple")
   
    <div class="mb-3 step">
     <h4><b> Question {{ $key+1}} : </b>   {{ $question->description ?? '' }}</h4>
      <input type="hidden" name="questions[{{ $key+1 }}]" value=" {{ $question->id ?? '' }}" id="question-id" /> 
      <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >
      
      <div class="form-check">

         
          <label >
           <input type="radio"  name="answer[{{ $question->id }}]" value="{{ $question->a_option ?? '' }}">
          <span class="label-text">  {{ $question->a_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
         
          <label >
        <input type="radio" name="answer[{{ $question->id }}]" value="{{ $question->b_option ?? '' }}"> 
           <span class="label-text"> {{ $question->b_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
           
          <label >
           <input type="radio"  name="answer[{{ $question->id }}]" value="{{ $question->c_option ?? '' }}" ><span class="label-text">{{ $question->c_option ?? '' }}</span>
          </label>
      </div>
      <div class="form-check">
        
          <label >
            <input type="radio"  name="answer[{{ $question->id }}]" value="{{ $question->d_option ?? '' }}" ><span class="label-text"> {{ $question->d_option ?? '' }}</span>
          </label>
      </div>
    </div>
    @else 
    
    <div class="mb-3 step">
        <h4><b> Question {{$key+1}} : </b>   {{ $question->description ?? '' }}</h4>
          <input type="hidden" name="questions[{{$key+1 }}]" value=" {{ $question->id ?? '' }}" id="question-id" /> 
          <input type="hidden"  name="tp[{{ $question->id }}]" value="{{$question->type}}" >
          
        <input type="text" class="form-control" name="answer[{{ $question->id }}]"  >
      </div>
       @endif    
            
            @endforeach
        <button type="submit" class="btn btn-success submit" style="display: none; font-size: 20px;" >Submit</button>
  </form>
  <div class="text-right">
        <button class="btn btn-primary next" style="font-size: 20px;" >Next</button>
      </div>
      <div class="time-elements" style="display: none">
        @foreach($questions as $key => $question)
        <p class="qtime">
          {{ $question->time }}
        </p>
        @endforeach
      </div>
 
</div>
          
        
         
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent


<script type="text/javascript">
  var divs = document.getElementsByClassName('step');
  var lgth = divs.length;
  var active = 0;
  var next = document.getElementsByClassName('next')[0];
  var submit = document.getElementsByClassName('submit')[0];
  var secondsRemaining;
  var intervalHandle;
  var qtimes = document.getElementsByClassName('qtime');
  var qactive = 0
  var minutes = qtimes[qactive].innerHTML;

  for (var i = 0; i < lgth; i++) {
    divs[i].style.display = "none";
  }
  divs[active].style.display = "block";
  next.onclick = function(){
   
    if (active == (lgth-2)) {
      next.style.display = "none";
      submit.style.display = "block";
      divs[active].style.display = "none";
      active++;
      divs[active].style.display = "block";
     qactive++;
      minutes = qtimes[qactive].innerHTML;
      startCountdown();
    }else{
      divs[active].style.display = "none";
      active++;
      divs[active].style.display = "block";
      qactive++;
      minutes = qtimes[qactive].innerHTML;
      startCountdown();
    }
  };

  function tick(){
    var timeDisplay = document.getElementById("time");
    var min = Math.floor(secondsRemaining / 60);
    var sec = secondsRemaining - (min * 60);
    if (sec < 10) {
      sec = "0" + sec;
    }
    var message = min.toString() + ":" + sec;
    console.log(message);
    timeDisplay.innerHTML = message;
    if (secondsRemaining === 0){
      if (active == (lgth-1)) {
        submit.click();
      }else{
        next.click();
       
      }
    }
    secondsRemaining--;
  }

  function startCountdown(){
    secondsRemaining = minutes * 60;
    intervalHandle = setInterval(tick, 1000);
  }

  window.onload = function(){
    startCountdown();
  }

  </script>

@endsection