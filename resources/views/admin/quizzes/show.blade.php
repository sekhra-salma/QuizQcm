@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quiz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quizzes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.id') }}
                        </th>
                        <td>
                            {{ $quiz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.title') }}
                        </th>
                        <td>
                            {{ $quiz->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.module') }}
                        </th>
                        <td>
                            {{ $quiz->module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.nb_qst') }}
                        </th>
                        <td>
                            {{ $quiz->nb_qst }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.time') }}
                        </th>
                        <td>
                            {{ $quiz->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.teacher') }}
                        </th>
                        <td>
                            {{ $quiz->teacher->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quizzes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection