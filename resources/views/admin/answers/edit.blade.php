@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.answer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.answers.update", [$answer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="mark">{{ trans('cruds.answer.fields.mark') }}</label>
                <input class="form-control {{ $errors->has('mark') ? 'is-invalid' : '' }}" type="number" name="mark" id="mark" value="{{ old('mark', $answer->mark) }}" step="0.01" required>
                @if($errors->has('mark'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mark') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.mark_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answer">{{ trans('cruds.answer.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', $answer->answer) }}">
                @if($errors->has('answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.answer.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $student)
                        <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $answer->student->id ?? '') == $id ? 'selected' : '' }}>{{ $student }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('cruds.answer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ (old('question_id') ? old('question_id') : $answer->question->id ?? '') == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
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