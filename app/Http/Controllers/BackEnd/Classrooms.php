<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Classrooms\Store;

class Classrooms extends Controller
{
  

    public function index()
    {
        $title = 'Classrooms';
        $classrooms = Classroom::all();
        return view('back-end.classrooms.index', compact('classrooms', 'title'));
    }

    public function create()
    {
        $title = 'Add Classroom';

        return view('back-end.classrooms.create', compact('title'));

        
    }


    public function store(Store $request)
    {
        
        Classroom::create($request->all());
        return redirect()->route('classrooms.index');
    }


    public function show(Classroom $classroom)
    {
        //
    }

    public function edit(Classroom $classroom)
    {
        $title = 'Classrooms';
        return view('back-end.classrooms.edit', compact('classroom', 'title'));
    }


    public function update( Store $request, Classroom $classroom)
    {
        $classroom->update($request->all());
        return redirect()->route('classrooms.index');
    }


    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return back();
    }
}
