<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\DataTables\StudentDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\NewStudentsDataTable;
use App\Http\Requests\Backend\Students\Store;
use App\DataTables\GraduatedStudentsDataTable;
use App\Http\Requests\Backend\Students\Update;

class Students extends Controller
{
    

    public function index(StudentDataTable $student)
    {
        $title = 'Students';
        return $student->render('back-end.students.index', compact('title'));
    }

    public function new_students(NewStudentsDataTable $student)
    {
        $title = 'New Students';
        return $student->render('back-end.students.new', compact('title'));
    }

    public function graduated_students( GraduatedStudentsDataTable $student)
    {
        $title = 'Graduated Students';
        return $student->render('back-end.students.graduated', compact('title'));
    }



    public function create()
    {
        $title = 'Add Student';
        return view('back-end.students.create', compact('title'));
        
    }

    

    public function store(Store $request)
    {
        if($request->hasFile('photo')){

            $file_name = 'uploads/profiles/' . $request->photo-> hashName();
            $request->photo->move( public_path('uploads/profiles'), $file_name);
            $request->photo = $file_name;
        }

        // $feature = [];
        if ($request->hasFile('other_files')) :
            foreach ($request->file('other_files') as $f) :
                $destinationPath = public_path('uploads/other_files');
                $filename = 'uploads/other_files/' . $f->hashName();
                $f->move($destinationPath, $filename);
                // $feature[] = $filename;
            endforeach;
        endif;
        // $request->other_files =  implode('###', $request->other_files);
        Student::create([
            'first_name'            =>  $request->first_name,
            'second_name'           =>  $request->second_name,
            'third_name'            =>  $request->third_name,
            'address'               =>  $request->address,
            'guardian'              =>  $request->guardian,
            'phone'                 =>  $request->phone,
            'photo'                 =>  isset($request->photo) ? $request->photo : '',
            'other_files'           =>  imploding_other_files($request->other_files),
            'gender'                =>  $request->gender,
        ]);
        return redirect()->route('students.index');
    }

    
    
    public function show(Student $student)
    {
    }

    
    public function edit(Student $student)
    {
        // dd($student->photo);
        $classrooms = Classroom::all();
        $title = 'Update Student';
        return view('back-end.students.edit', compact('title', 'student', 'classrooms'));
    }

    

    public function update(Update $request, Student $student)
    {
        
        if ($request->hasFile('photo')) {
            
            $file_name = 'uploads/profiles/' . $request->photo->hashName();
            $request->photo->move(public_path('uploads/profiles'), $file_name);
            $request->photo = $file_name;
        }
        
        // $feature = [];
        if ($request->hasFile('other_files')) :
            foreach ($request->file('other_files') as $f) :
                $destinationPath = public_path('uploads/other_files/');
                $filename = 'uploads/other_files/' . $f->hashName();
                $f->move($destinationPath, $filename);
                // $feature[] = $filename;
            endforeach;
        endif;
        // $student->other_files =  implode('###', $feature);
        
        $student->update([
            'first_name'            =>  $request->first_name,
            'second_name'           =>  $request->second_name,
            'third_name'            =>  $request->third_name,
            'address'               =>  $request->address,
            'guardian'              =>  $request->guardian,
            'phone'                 =>  $request->phone,
            'photo'                 =>  isset($request->photo) ? $request->photo : '',
            'other_files'           =>  imploding_other_files($request->other_files),
            'gender'                =>  $request->gender,
            'classroom_id'          =>  $request->classroom_id,
            'status'                =>  isset($request->status) ? $request->status : '',
            'graduated'             =>  $request->graduated,
            'left'                  =>  $request->left,
            'left_reason'           =>  $request->left_reason,
        ]);
        return redirect()->route('students.index');

    }

    

    public function destroy(Student $student)
    {
        $student->delete();
        return back();
    }
}
