@extends('back-end.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add Student</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @include('back-end.shared.message')
            <form enctype="multipart/form-data" action="{{ route('students.store') }}" method="POST">
                @csrf
                {{-- @method('POST') --}}
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input value="{{ old('first_name') }}" type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Secound Name</label>
                                <input value="{{ old('second_name') }}" type="text" name="second_name" class="form-control" placeholder="Secound Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input value="{{ old('third_name') }}" type="text" name="third_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Guardian / Parent</label>
                                <input value="{{ old('guardian') }}" type="text" name="guardian" class="form-control" placeholder="Guardian">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input value="{{ old('phone') }}" type="number" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="image">Student's Image</label>
                                <input type="file" class="form-control image" name="photo">
                            </div>
                        </div>
                        <div class="col-md-8">

                            <div class="form-group">
                                <img src="https://via.placeholder.com/450" class="img-thumbnail image-preview" alt=""
                                    style="width:450px; height:300px">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Student's Files</label>
                        <input  type="file" multiple class="form-control " name="other_files[]">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option>...............</option>
                            <option value="boy">Boy</option>
                            <option value="girl">Girl</option>
                        </select>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        @push('js')

        @endpush



    </section>
    <!-- /.content -->
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
    
        $(".image").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush