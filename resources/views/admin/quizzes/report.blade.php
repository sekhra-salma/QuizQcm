@extends('layouts.admin')
@section('content')
@can('quiz_create')
    <div style="margin-bottom: 10px;" class="row">
        
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.quiz.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Quiz">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            quiz
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                           Result 
                        </th>
                        <th>
                            Classe
                        </th>
                        <th>
                            Module
                        </th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers as $key => $answer)
                    <input type="hidden" name="idquiz" value="$quiz->id">
                        <tr data-entry-id="">
                            <td>

                            </td>
                            <td>
                                {{ $answer->title ?? '' }}
                            </td>
                            <td>
                                {{ $answer->name ?? '' }}
                            </td>
                            <td>
                                {{ $answer->result ?? '' }}
                            </td>
                            <td>
                                {{ $answer->classe ?? '' }} 
                            </td>
                            <td>
                               {{ $answer->module ?? '' }} 
                            </td>
                         
                            

                        </tr>
               
                    @endforeach
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