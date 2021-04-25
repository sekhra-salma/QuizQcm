@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.question.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="a_option">{{ trans('cruds.question.fields.a_option') }}</label>
                <input class="form-control {{ $errors->has('a_option') ? 'is-invalid' : '' }}" type="text" name="a_option" id="a_option" value="{{ old('a_option', '') }}" required>
                @if($errors->has('a_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('a_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.a_option_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="b_option">{{ trans('cruds.question.fields.b_option') }}</label>
                <input class="form-control {{ $errors->has('b_option') ? 'is-invalid' : '' }}" type="text" name="b_option" id="b_option" value="{{ old('b_option', '') }}" required>
                @if($errors->has('b_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.b_option_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="c_option">{{ trans('cruds.question.fields.c_option') }}</label>
                <input class="form-control {{ $errors->has('c_option') ? 'is-invalid' : '' }}" type="text" name="c_option" id="c_option" value="{{ old('c_option', '') }}" required>
                @if($errors->has('c_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('c_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.c_option_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="d_option">{{ trans('cruds.question.fields.d_option') }}</label>
                <input class="form-control {{ $errors->has('d_option') ? 'is-invalid' : '' }}" type="text" name="d_option" id="d_option" value="{{ old('d_option', '') }}" required>
                @if($errors->has('d_option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('d_option') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.d_option_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correct_answer">{{ trans('cruds.question.fields.correct_answer') }}</label>
                <input class="form-control {{ $errors->has('correct_answer') ? 'is-invalid' : '' }}" type="text" name="correct_answer" id="correct_answer" value="{{ old('correct_answer', '') }}" required>
                @if($errors->has('correct_answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correct_answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="explain">{{ trans('cruds.question.fields.explain') }}</label>
                <input class="form-control {{ $errors->has('explain') ? 'is-invalid' : '' }}" type="text" name="explain" id="explain" value="{{ old('explain', '') }}">
                @if($errors->has('explain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('explain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.explain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quiz_id">{{ trans('cruds.question.fields.quiz') }}</label>
                <select class="form-control select2 {{ $errors->has('quiz') ? 'is-invalid' : '' }}" name="quiz_id" id="quiz_id" required>
                    @foreach($quizzes as $id => $quiz)
                        <option value="{{ $id }}" {{ old('quiz_id') == $id ? 'selected' : '' }}>{{ $quiz }}</option>
                    @endforeach
                </select>
                @if($errors->has('quiz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quiz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.quiz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correct_answer_2">{{ trans('cruds.question.fields.correct_answer_2') }}</label>
                <input class="form-control {{ $errors->has('correct_answer_2') ? 'is-invalid' : '' }}" type="text" name="correct_answer_2" id="correct_answer_2" value="{{ old('correct_answer_2', '') }}">
                @if($errors->has('correct_answer_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correct_answer_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_answer_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time">{{ trans('cruds.question.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}">
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.time_helper') }}</span>
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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection