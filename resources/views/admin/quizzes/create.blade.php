@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.quiz.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quizzes.store") }}" enctype="multipart/form-data">
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
                <label class="required" for="teacher_id">{{ trans('cruds.quiz.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id" required>
                    @foreach($teachers as $id => $teacher)
                        <option value="{{ $id }}" {{ old('teacher_id') == $id ? 'selected' : '' }}>{{ $teacher }}</option>
                    @endforeach
                </select>
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quiz.fields.teacher_helper') }}</span>
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