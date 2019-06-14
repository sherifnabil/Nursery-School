@extends('back-end.layouts.main')
@push('css')
<link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
{{-- <link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/buttons.dataTables.min.css"> --}}
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $title }}</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li> {{ $title }}</li>
        </ol>
    </section>

    <!-- Main content -->
        <div class="col-md-12 ">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $dataTable->table(['class' => 'dataTable table table-stripped  table-hover table-bordered'], true) !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
@stop   
@push('js')
<script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}

@endpush