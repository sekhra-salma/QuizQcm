@extends('layouts.admin')
@section('content')
@can('quiz_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
           <button class="btn btn-success" type="button"  data-toggle="modal" data-target="#createModalq">
                {{ trans('global.add') }} {{ trans('cruds.quiz.title_singular') }}
            </button>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       <h4> {{ trans('cruds.quiz.title_singular') }} {{ trans('global.list') }}
    </h4></div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Quiz">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.module') }}
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.nb_qst') }}
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.time') }}
                        </th>
                       <th>
                            Classe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $key => $quiz)
                    <input type="hidden" name="idquiz" value="$quiz->id">
                        <tr data-entry-id="{{ $quiz->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $quiz->id ?? '' }}
                            </td>
                            <td>
                                {{ $quiz->title ?? '' }}
                            </td>
                            <td>
                                {{ $quiz->module ?? '' }}
                            </td>
                            <td>
                                {{ $quiz->nb_qst ?? '' }}
                            </td>
                            <td>
                                {{ $quiz->time ?? '' }}
                            </td>
                          <td>
                                {{ $quiz->classe->name ?? '' }}
                            </td> 
                            <td>
                                @can('quiz_show')
       <button class="btn btn-xs btn-success" type="button"  data-toggle="modal" data-target="#createModal{{$quiz->id}}">Add  Question choix </button>
        <button class="btn btn-xs btn-success" type="button"  data-toggle="modal" data-target="#createModal1{{$quiz->id}}">Add Question text </button>
       


  <a class="btn btn-xs btn-primary" href="{{ route('admin.quizzes.show',$quiz->id)}}">
                                        report
                                    </a> 
                                    
                                @endcan

                                @can('quiz_edit')

       <!--  <a class="btn btn-xs btn-info"  href="{{ route('admin.quizzes.edit', $quiz->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>-->
                <a class="btn btn-xs btn-info"  href="{{ route('admin.questionQ', $quiz->id) }}">
                                        Questions of Quiz
                                    </a>
                                @endcan

                                @can('quiz_delete')
                                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                                           <!-- Create Modal -->
  <div id="createModal{{$quiz->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Add Question choix</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          
        </div>
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <input name="quiz_id" type="hidden" value="{{ $quiz->id}}">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <input name="topic_id" type="hidden" value="1">
                <div class="form-group">                  
                  <label for="question">Question</label>
                  <span class="required">*</span>
                  <textarea class="form-control" placeholder="Please Enter Question" rows="8" name="description" id="description" required cols="50" ></textarea>
                  @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                <label class="required" for="correct_answer">{{ trans('cruds.question.fields.correct_answer') }}</label>
               
                <select class="selectpicker form-control {{ $errors->has('correct_answer') ? 'is-invalid' : '' }}" name="correct_answer" title="Choose the answer ">
                         <option value="a">A</option>
                             <option value="b">B</option>
                        <option value="c">C</option>
                           <option value="d">D</option>
                              </select>

                @if($errors->has('correct_answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correct_answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correct_answer_2">{{ trans('cruds.question.fields.correct_answer_2') }}</label>
                
                <select class="selectpicker form-control {{ $errors->has('correct_answer_2') ? 'is-invalid' : '' }}" name="correct_answer_2" title="Choose the answer ">
                         <option value="a">A</option>
                             <option value="b">B</option>
                        <option value="c">C</option>
                           <option value="d">D</option>
                              </select>
                @if($errors->has('correct_answer_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correct_answer_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_answer_2_helper') }}</span>
            </div>

              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="a">A - Option</label>
                  <span class="required">*</span>
<input class="form-control" placeholder="Please Enter A Option" required="required" name="a_option" id="a_option" type="text" >
                  @if($errors->has('a_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('a_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.a_option_helper') }}</span>
                </div>
                <div class="form-group">
                  <label for="b">B - Option</label>
                  <span class="required">*</span>
                  <input class="form-control" placeholder="Please Enter B Option" required="required" name="b_option" id="b_option" type="text" >
                  @if($errors->has('b_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.b_option_helper') }}</span>
                </div>
                <div class="form-group">
                  <label for="c">C - Option</label>
                  <span class="required">*</span>
                  <input class="form-control" placeholder="Please Enter C Option" required="required"  name="c_option" id="c_option" type="text" >
                 @if($errors->has('c_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('c_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.c_option_helper') }}</span>
                </div>
                <div class="form-group">
                  <label for="d">D - Option</label>
                  <span class="required">*</span>
                  <input class="form-control" placeholder="Please Enter D Option" required="required"  name="d_option" id="d_option" type="text" >
                 @if($errors->has('d_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('d_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.d_option_helper') }}</span>
                </div>
                
            
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label  for="time">{{ trans('cruds.quiz.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" >
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.time_helper') }}</span>
            </div>
                
                <div class="form-group">
                    <label for="answer_exp">Answer Explanation</label>
                    <textarea class="form-control" placeholder="Please Enter Answer Explanation" rows="4" name="explain" id="explain" cols="50" ></textarea>
                   @if($errors->has('explain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('explain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.explain_helper') }}</span>
                </div>
                <div class="form-group">
                <label class="required" for="mark">{{ trans('cruds.question.fields.mark') }}</label>
                <input class="form-control {{ $errors->has('mark') ? 'is-invalid' : '' }}" type="number" name="mark" id="mark" value="{{ old('mark', '') }}" step="0.01" required>
                @if($errors->has('mark'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mark') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.mark_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">type</label>
                
                <select class="selectpicker form-control " name="type" title="Choose the type ">
                         <option value="simple"> simple</option>
                             <option value="mult">Multiple </option>
                        
                           
                              </select>
               
                
            </div>
              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- fin Modal -->
                              <!-- Create Modal -->
  <div id="createModal1{{$quiz->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Add Question text</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          
        </div>
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <input name="quiz_id" type="hidden" value="{{ $quiz->id}}">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <input name="topic_id" type="hidden" value="1">
                <div class="form-group">                  
                  <label for="question">Question</label>
                  <span class="required">*</span>
                  <textarea class="form-control" placeholder="Please Enter Question" rows="5" name="description" id="description" required cols="30" ></textarea>
                  @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                <label class="required" for="correct_answer">{{ trans('cruds.question.fields.correct_answer') }}</label>
                <input class="form-control" placeholder="Please Enter correct answers"  name="correct_answer"  required >
               <input type="hidden" name="type" value="qtext">

                @if($errors->has('correct_answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correct_answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_answer_helper') }}</span>
            </div>
             

              </div>

              <div class="col-md-4">
                <div class="form-group">
                <label  for="time">{{ trans('cruds.quiz.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" >
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.time_helper') }}</span>
            </div>
                
                <div class="form-group">
                    <label for="answer_exp">Answer Explanation</label>
                    <textarea class="form-control" placeholder="Please Enter Answer Explanation" rows="4" name="explain" id="explain" cols="50" ></textarea>
                   @if($errors->has('explain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('explain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.explain_helper') }}</span>
                </div>
                <div class="form-group">
                <label class="required" for="mark">{{ trans('cruds.question.fields.mark') }}</label>
                <input class="form-control {{ $errors->has('mark') ? 'is-invalid' : '' }}" type="number" name="mark" id="mark" value="{{ old('mark', '') }}" step="0.01" required>
                @if($errors->has('mark'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mark') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.mark_helper') }}</span>
            </div>
            
              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- fin Modal -->
                    @endforeach
                               <!-- Create Modal -->
  <div id="createModalq" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title">Add Quiz</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          
        </div>
        <form method="POST"  action="{{ route("admin.quizzes.store") }}" enctype="multipart/form-data" >
             <div class="modal-body">
            
           @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.quiz.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="module">{{ trans('cruds.quiz.fields.module') }}</label>
                <input class="form-control {{ $errors->has('module') ? 'is-invalid' : '' }}" type="text" name="module" id="module" value="{{ old('module', '') }}" required>
                @if($errors->has('module'))
                    <div class="invalid-feedback">
                        {{ $errors->first('module') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.module_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nb_qst">{{ trans('cruds.quiz.fields.nb_qst') }}</label>
                <input class="form-control {{ $errors->has('nb_qst') ? 'is-invalid' : '' }}" type="number" name="nb_qst" id="nb_qst" value="{{ old('nb_qst', '') }}" step="1" required>
                @if($errors->has('nb_qst'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nb_qst') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.nb_qst_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="time">{{ trans('cruds.quiz.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" >
                
            </div>
            <div class="form-group">
                <label for="classe_id">{{ trans('cruds.user.fields.classe') }}</label>
                <select class="form-control select2 {{ $errors->has('classe') ? 'is-invalid' : '' }}" name="classe_id" id="classe_id">
                    @foreach($classes as $id => $classe)
                        <option value="{{ $classe->id }}" {{ old('classe_id') == $id ? 'selected' : '' }}>{{ $classe->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('classe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classe') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.classe_helper') }}</span>
            </div>
   
               
           </div>
            <div class="modal-footer">
           
              <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('quiz_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quizzes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Quiz:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection