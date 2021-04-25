@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.question.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.id') }}
                        </th>
                        <td>
                            {{ $question->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.description') }}
                        </th>
                        <td>
                            {{ $question->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.a_option') }}
                        </th>
                        <td>
                            {{ $question->a_option }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.b_option') }}
                        </th>
                        <td>
                            {{ $question->b_option }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.c_option') }}
                        </th>
                        <td>
                            {{ $question->c_option }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.d_option') }}
                        </th>
                        <td>
                            {{ $question->d_option }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.correct_answer') }}
                        </th>
                        <td>
                            {{ $question->correct_answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.explain') }}
                        </th>
                        <td>
                            {{ $question->explain }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.quiz') }}
                        </th>
                        <td>
                            {{ $question->quiz->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.correct_answer_2') }}
                        </th>
                        <td>
                            {{ $question->correct_answer_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.time') }}
                        </th>
                        <td>
                            {{ $question->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.mark') }}
                        </th>
                        <td>
                            {{ $question->mark }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection