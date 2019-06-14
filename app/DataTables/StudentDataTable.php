<?php

namespace App\DataTables;

use App\Models\Student;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'back-end.shared.btn.edit')
            ->addColumn('delete', 'back-end.shared.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
            ]);
    }


    public function query()
    {
        $query =  Student::query();

        if (in_array(request()->get('status'), ['accepted', 'pending', 'refused'])) {
        
            $query = $query->where('status', request()->get('status'));
        
        }
     return $query;
    //  dd($query);
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->addAction(['width' => '80px'])    // commenting the add actions to add custom actions in dataTable method as a rowColumns which is showing the actoin in the table
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'           =>  'Blfrtip',
                'lengthMenu'    =>  [[10, 25, 50, 100], [10, 25, 50, 'All Records']],
                'buttons'       =>  [
                    [
                        'className' =>    'btn btn-primary',
                        'text'      =>    '<i class="fa fa-plus" ></i> ' . 'Add',
                        'action'    =>    "function() {
                                                            window.location.href = '" . \URL::current() . "/create';
                                                        }",
                    ],
                    [
                        'extend'    =>    'print',
                        'className' =>    'btn btn-success',
                        'text'      =>    '<i class="fa fa-print" ></i>',
                    ],
                    [
                        'extend'    =>    'reload',
                        'className' =>    'btn btn-default',
                        'text'      =>    '<i class="fa fa-refresh" ></i>',
                    ],
                ],
                'initComplete'      =>     'function () {
                                    this.api().columns([1, 3,4]).every(function () {
                                        var column = this;
                                        var input = document.createElement("input");
                                        $(input).appendTo($(column.footer()).empty()).on(\'keyup\', function()
                                        {
                                            column.search($(this).val(), false, false, true).draw();
                                        });
                                    });
                            }',
            ]);
    }

    
    protected function getColumns()
    {
        return [

            [
                'name'          =>  'id',
                'data'          =>  'id',
                'title'         =>  '#',
            ],
            [
                'name'          =>  'first_name',
                'data'          =>  'first_name',
                'title'         =>  'First Name',
            ],
            [
                'name'          =>  'second_name',
                'data'          =>  'second_name',
                'title'         =>  'Second Name',
            ],
            [
                'name'          =>  'status',
                'data'          =>  'status',
                'title'         =>  'Status',
            ],
            // [
            //     'name'          =>  'class.room_num',
            //     'data'          =>  'class.room_num',
            //     'title'         =>  'Class',
            // ],
            [
                'name'          =>  'phone',
                'data'          =>  'phone',
                'title'         =>  'Phone',
            ],
            [
                'name'          =>  'gender',
                'data'          =>  'gender',
                'title'         =>  'Gender',
            ],
            [
                'name'          =>  'created_at',
                'data'          =>  'created_at',
                'title'         =>  'Added On',
            ],
            [
                'name'          =>  'edit',
                'data'          =>  'edit',
                'title'         =>  'Edit',
                'orderable'     =>  false,
                'searchable'    =>  false,
                'exportable'    =>  false,
                'printable'     =>  false,
            ],
            [
                'name'          =>  'delete',
                'data'          =>  'delete',
                'title'         =>  'Delete',
                'orderable'     =>  false,
                'searchable'    =>  false,
                'exportable'    =>  false,
                'printable'     =>  false,
            ],
        ];
    }

    
    protected function filename()
    {
        return 'Student_' . date('YmdHis');
    }
}
