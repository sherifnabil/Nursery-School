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
            <li class="active">{{ $title }}</li>
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
    <form enctype="multipart/form-data" action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="box-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>First Name</label>
                        <input value="{{ $student->first_name }}" type="text" name="first_name" class="form-control" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Secound Name</label>
                        <input value="{{ $student->second_name }}" type="text" name="second_name" class="form-control" placeholder="Secound Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input value="{{ $student->third_name }}" type="text" name="third_name" class="form-control" placeholder="Last Name">
                    </div>
                </div>

            </div>
            

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Address</label>
                        <input value="{{ $student->address }}" type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Guardian / Parent</label>
                        <input value="{{ $student->guardian }}" type="text" name="guardian" class="form-control" placeholder="Guardian">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input value="{{ $student->phone }}" type="number" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="image">Student's Image</label>
                        <input  type="file" class="form-control image" name="photo">
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="form-group">
                        <img src="{{ asset($student->photo) }}" class="img-thumbnail image-preview" alt=""
                            style="width:450px; height:250px">
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-md-6">

                    <div class="form-group">
                        <label >Gender</label>
                        <select name="gender" class="form-control">
                            <option>...............</option>
                            <option value="boy" {{ $student->gender == 'boy' ? 'selected' : '' }}>Boy</option>
                            <option value="girl" {{ $student->gender == 'girl' ? 'selected' : '' }}>Girl</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label >Student's Files</label>
                        <input  type="file" multiple="multiple" class="form-control" name="other_files[]">
                    </div>
                </div>
            </div>
        

            <div class="form-group">
                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending">...............</option>
                    <option value="accepted" {{ $student->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="refused" {{ $student->status == 'refused' ? 'selected' : '' }}>Refused</option>
                </select>
            </div>

            <div class="form-group" id="status_dependant">
                <label>Classroom</label>
                <select name="classroom_id"  class="form-control">
                    {{-- <option value="0">...............</option> --}}
                    @foreach ($classrooms as $classroom)

                        <option value="{{ $classroom->id }}" {{ $classroom->id == $student->classroom_id ? 'selected' : '' }}>{{ $classroom->getFullClassAttribute() }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group " id="accept_note">
                <label>Accept Note</label>
                <input value="{{ $student->accept_note }}" type="text" name="accept_note" class="form-control">
            </div>

            <div class="form-group">
                <label>Graduated</label>
                <select name="graduated" class="form-control">
                    <option value="0" {{ $student->graduated == 'ungraduated' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $student->graduated == 'ungraduated' ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            
            <div class="form-group">
                <label>Left The School</label>
                <select name="left" id="left" class="form-control">
                    <option value="0" {{ $student->left == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $student->left == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="form-group " id="left_reason">
                <label>Left Reason</label>
                <input value="{{ $student->left_reason }}" type="text" name="left_reason" class="form-control" >
            </div>





        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>


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
            

        $('#status_dependant').{{ $student->status == 'accepted' ? 'show' : 'hide' }}();
        $('#status').change(function(){
            $('#status_dependant').hide();
            if($(this).val() == "accepted"){

                $('#status_dependant').show();
            }else{
                $('#status_dependant').hide();

            }
        });


        $('#left_reason').{{ $student->left == 1 ? 'show' : 'hide' }}();
        $('#left').change(function(){
            $('#left_reason').hide();
            if($(this).val() == 1){

                $('#left_reason').show();
            }else{
                $('#left_reason').hide();

            }
        });
    });

</script>
@endpush