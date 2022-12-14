<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\Departament;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    // Control de rutas - middleware auth
    public function __construct() {
        return $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = DB::table('departaments')
        ->select('id', 'departament')
        ->get();
       
        $employees = DB::table('employees')
        ->join('departaments', 'departaments.id', '=', 'employees.departament_id')
        ->select('employees.id', 'employees.name', 'employees.lastname', 'departaments.departament')
        ->paginate(4);
        
        //
        return view('employee.index', [
            'employees' => $employees,
            'departaments' => $departaments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $employee = new employee();

        $employee->type_doc = $request->get('selTipoDoc');
        $employee->num_doc = $request->get('txtNumDoc');
        $employee->name = $request->get('txtName');
        $employee->lastname = $request->get('txtLastname');
        $employee->date_of_birth = $request->get('txtDateBirth');
        $employee->departament_id = $request->get('selTipoDepartament');

        $employee->save();

        if($employee) {
            return response()->json('creado exitosamente');
        } else {
            return response()->json('no se ha creado exitosamente');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Consultamos datos del id de empleado
        $employee = employee::findOrFail($id);

        // Retornamos respuesta
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Consultamos datos del id de empleado
        $employee = employee::findOrFail($id);

        // Retornamos respuesta
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = employee::findOrFail($id);

        $employee->type_doc = $request->get('selTipoDocEdit');
        $employee->num_doc = $request->get('txtNumDocEdit');
        $employee->name = $request->get('txtNameEdit');
        $employee->lastname = $request->get('txtLastnameEdit');
        $employee->date_of_birth = $request->get('txtDateBirthEdit');
        $employee->departament_id = $request->get('selTipoDepartamentEdit');

        $employee->save();

        if($employee) {
            return response()->json('Actualizado exitosamente');
        } else {
            return response()->json('no se ha actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = employee::findOrFail($id);

        $employee->delete();

        if($employee) {
            return response()->json('se elimino exitosamente');
        } else {
            return response()->json('no se elimino exitosamente');
        }
    }
}
