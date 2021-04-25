@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.answer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.id') }}
                        </th>
                        <td>
                            {{ $answer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.mark') }}
                        </th>
                        <td>
                            {{ $answer->mark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.answer') }}
                        </th>
                        <td>
                            {{ $answer->answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.student') }}
                        </th>
                        <td>
                            {{ $answer->student->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.question') }}
                        </th>
                        <td>
                            {{ $answer->question->description ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection