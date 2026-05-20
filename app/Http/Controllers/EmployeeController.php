<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        // mengambil data karyawan melalui modal
        $employees = Employee::all();
        return view('employee.index', compact ('employees'));
    }

    public function create() {
        return view('employee.create');
    }

    public function store(EmployeeRequest $request) {

        Employee::create($request->validated());
        return redirect()->route('karyawan.index')->with('success', 'Employee successfully added!');
    }

    public function edit($id) {
        // mencari data karyawan berdasarkan id
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id) {
        // cari data karyawan yang mau diupdate
        $employee = Employee::findOrFail($id);

        // proses menyimpan data baru
        $employee->update($request->validated());

        return redirect()->route('karyawan.index')->with('success', 'Data successfully updated!');
    }

    public function destroy($id) {
        // mengambil data yang mau dihapus berdasarkan variabel id
        $employee = Employee::findOrFail($id);

        $employee->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data successfully deleted!');
    }
}

