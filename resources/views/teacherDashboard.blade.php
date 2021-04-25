@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="fade-in">
<div class="row">
<div class="col-sm-6 col-lg-3">
<div class="card text-white bg-gradient-primary">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg"> {{ count($teachers)}}</div>
<div>Professeurs </div>
</div>
<div class="btn-group">
<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
</svg>
</button>
<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
</div>
</div>
<div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
<canvas class="chart" id="card-chart1" height="70"></canvas>
</div>
</div>
</div>

<div class="col-sm-6 col-lg-3">
<div class="card text-white bg-gradient-info">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg">{{ count($classes)}}</div>
<div>Classes</div>
</div>
<div class="btn-group">
<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
</svg>
</button>
<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
</div>
</div>
<div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
<canvas class="chart" id="card-chart2" height="70"></canvas>
</div>
</div>
</div>

<div class="col-sm-6 col-lg-3">
<div class="card text-white bg-gradient-warning">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg">{{ count( $quiz ) }}</div>
<div>Quizs</div>
</div>
<div class="btn-group">
<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
</svg>
</button>
<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
</div>
</div>
<div class="c-chart-wrapper mt-3" style="height:70px;">
<canvas class="chart" id="card-chart3" height="70"></canvas>
</div>
</div>
</div>

<div class="col-sm-6 col-lg-3">
<div class="card text-white bg-gradient-danger">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg">{{ count($students)}}</div>
<div>Students</div>
</div>
<div class="btn-group">
<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
</svg>
</button>
<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
</div>
</div>
<div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
<canvas class="chart" id="card-chart4" height="70"></canvas>
</div>
</div>
</div>

</div>

<!--taable-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection