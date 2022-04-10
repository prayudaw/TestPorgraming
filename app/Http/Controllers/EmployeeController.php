<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Companies;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::latest()->with('company')->paginate(5);
        return view('employee.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::get();

        return view('employee.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'company_id' => 'required'
        ]);

        Employees::create($request->all());
        return redirect()->route('employee.index')->with('success', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::get();
        $employee = Employees::find($id);
        return view('employee.edit', ['companies' => $companies, 'employee' => $employee]);
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
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'company_id' => 'required'
        ]);

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'company_id' => $request['company_id'],
        ];



        Employees::where('id', $id)->update($data);
        return redirect()->route('employee.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::where('id', $id)->delete();
        return redirect()->route('employee.index')->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {

        $data = ['title' => 'Daftar Karyawan', 'employees' => Employees::with('company')->get()];
                       $pdf = PDF::loadView('employee.pdf', $data);

        return $pdf->download('Employee.pdf');
    }
}
