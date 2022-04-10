<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use PDF;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::latest()->paginate(5);
        return view('company.index', compact('companies'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //ddd($request);
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:png|max:2048',
            'website' => 'required'
        ]);

        if ($request->file('logo')) {
            $imagePath = $request->file('logo');
            $imageName = $imagePath->getClientOriginalName();
         
            $path = $request->file('logo')->storeAs('company', $imageName, 'public');
        }

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'website' => $request['website'],
            'logo' => '/storage/' . $path
        ];

        Companies::create($data);
        return redirect()->route('company.index')->with('success', 'Data berhasil di input');
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
        $company = Companies::find($id);

        return view('company.edit', ['company' => $company]);
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
            'logo' => 'required|image|mimes:png|max:2048',
            'website' => 'required'
        ]);

        if ($request->file('logo')) {
            $imagePath = $request->file('logo');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('logo')->storeAs('company', $imageName, 'public');
        }

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'website' => $request['website'],
            'logo' => '/storage/' . $path
        ];

        Companies::where('id', $id)->update($data);
        return redirect()->route('company.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Companies::where('id', $id)->delete();
        return redirect()->route('company.index')->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        // $data=Companies::all(); 
        $data = ['title' => 'Daftar Perusahaan', 'companies' => Companies::get()];
        $pdf = PDF::loadView('company.pdf', $data);

        return $pdf->download('Company.pdf');
    }
}
