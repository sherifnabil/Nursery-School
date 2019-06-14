@extends('back-end.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Classroom</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('back-end.shared.message')
            <form  action="{{ route('classrooms.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label >Year Level</label>
                        <input type="number" class="form-control" value="{{ old('level') }}" name="level" >
                    </div>
                    <div class="form-group">
                        <label>Class Number</label>
                        <input type="number" class="form-control" value="{{ old('room_num') }}" name="room_num">
                    </div>

                    <div class="form-group">
                        <label>Seats Per Class</label>
                        <input type="number" class="form-control" value="{{ old('seats_number') }}"  name="seats_number">
                    </div>
                </div>
                <!-- /.box-body -->
        
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection