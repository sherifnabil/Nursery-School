@extends('back-end.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
        <h1>{{ $title }} <a href="{{ route('classrooms.create') }}" class="btn btn-warning">New</a></h1>
        
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li> Classrooms</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if ($classrooms->count() > 0)
        <table class="table table-bordered stripped text-center">
            <tbody>
                <thead>
                    <tr>

                        <th >#</th>
                        <th>Seats Number</th>
                        <th>Class</th>
                        <th >Edit</th>
                        <th >Delete</th>
                    </tr>
                </thead>
                <tr>
                        
                        @foreach ($classrooms as $key=> $classroom)
                                
                            <td> {{ ($key+1) }} </td>
                            <td> {{ $classroom->seats_number  }} </td>
                            <td> {{ $classroom->getFullClassAttribute() }} </td>
                            <td>
                                <a href="{{ route('classrooms.edit' , ['id' => $classroom]) }}" rel="tooltip" title="" class="btn btn-primary btn-sm"
                                    >
                                        <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('classrooms.destroy' , ['id' => $classroom]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" rel="tooltip" class="btn btn-danger btn-sm">
                                        
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    
                    
                </tbody>
            </table>
            @else

                <h3>Plaease Add Classes</h3>
                
            @endif

    </section>
    <!-- /.content -->
</div>
@endsection