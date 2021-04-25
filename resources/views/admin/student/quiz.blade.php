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
    <div class="card-header page-title" style="font-size: 28px;
    color: #666;
    margin: 0 0 15px;
    font-weight: 300;">
       <b> {{ trans('cruds.quiz.title_singular') }} {{ trans('global.list') }}
   </b> </div>

    <div class="card-body">
        <div class="table-responsive">
          <script>
            var msg='';
     msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
          <div class="row">
          
             @foreach($quizzes as $key => $quiz)
                              <div class="col-md-4">
              <div class="topic-block" >
           
                <div class="card blue-grey darken-1" style="height: 300px ;">
                  <div class="card-content white-text"  style="margin-left: 20Px; margin-top: 20px;">
                  <center> <b> <span class="card-title"> Quiz :   {{ $quiz->title ?? '' }}</span></b></center>
                    <p title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum mauris dui, vel sagittis nisi elementum ut."><b>Module : </b> {{ $quiz->module ?? '' }}</p>
                    <div class="row">
                      <div class="col-xs-6 pad-0">
                        <ul class="topic-detail">
                         
                          
                          <li>Total Questions  <i class="fa fa-long-arrow-right"></i></li>
                          <li>Total Time  <i class="fa fa-long-arrow-right"></i></li>
                          <li>Teacher   <i class="fa fa-long-arrow-right"></i></li>
                        </ul>
                      </div>
                      <div class="col-xs-6">
                        <ul class="topic-detail right">
                         
                          <li>
                               {{ $quiz->nb_qst ?? '' }} 
                          </li>
                          <li>
                            
                             {{ $quiz->time ?? '' }}
                          </li>
                          <li>
                            
                              <div>{{ $quiz->teacher->name }}</div>               
                          
                      </div>
                          </li>

                 
                        </ul>

                    </div>
                  </div>


               <div class="card-action text-center">
                  
                   
  <form method="GET" action="{{ route("admin.question") }}" enctype="multipart/form-data">
            @csrf
            <input name="quiz_id" type="hidden" value="{{ $quiz->id}}">
               <input type="hidden" name="nom_quiz" value="{{ $quiz->title  }}">
 <button class="btn btn-outline-success" type="submit"  >Start Quiz </button>
                    
                  </form>      
                                      </div>


                
                </div>
              </div>
            </div>
              
            
      
            @endforeach
               
  
                        </div>
                  
                        
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