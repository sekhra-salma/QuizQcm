@extends('layouts.admin')
@section('content')
@can('answer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
    
                     
                          <a class="btn btn-success" href="">
                            
                Total : 
                  {{ $mark }}
            </a>       
                            
                
           
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.answer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Answer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        
                        <th>
                            {{ trans('cruds.answer.fields.mark') }}
                        </th>
                        <th>
                          answer1
                        </th>
                        <th>
                          answer2
                        </th>
                        <th>
                             answer3
                        </th>
                        <th>
                            answer4
                        </th>
                        <th>
                            Answer correct 1
                        </th>
                        <th>
                            Answer correct 2
                        </th>
                        <th>
                            {{ trans('cruds.answer.fields.question') }}
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers as $key => $answer)
                        <tr >
                            <td>
                   
                            </td>
                           
                            <td>
                                {{ $answer->mark ?? '' }}
                            </td>
                            <td>
                                {{ $answer->answer ?? '' }}
                            </td>
                            <td>
                                {{ $answer->answer2 ?? '' }}
                            </td>
                             <td>
                                {{ $answer->answer3 ?? '' }}
                            </td>
                             <td>
                                {{ $answer->answer4 ?? '' }}
                            </td>
                            <td>
                                {{ $answer->correct_answer ?? '' }}
                            </td>
                             <td>
                                {{ $answer->correct_answer_2 ?? '' }}
                            </td>
                          
                            <td>
                                {{ $answer->description ?? '' }}
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
@can('answer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.answers.massDestroy') }}",
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
  let table = $('.datatable-Answer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection