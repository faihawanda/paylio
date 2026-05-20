<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Models\Employee;
use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index() {
        $salaries = Salary::all();
        return view('salary.index', compact('salaries'));
    }
    
    public function create($employeeId) {
        $employee = Employee::findOrFail($employeeId);
        return view('salary.create', compact('employee'));
    }

    public function store(SalaryRequest $request) {

        Salary::create([
            'employee_id'               => $request->employee_id,
            'gaji_pokok'                => $request->gaji_pokok,
            'tunjangan_makan'           => $request->tunjangan_makan,
            'tunjangan_transportasi'    => $request->tunjangan_transportasi,
            'potongan'                  => $request->potongan,
            'gaji_bersih'               => $request->gaji_bersih,
            'bulan'                     => $request->bulan,
            'tahun'                     => $request->tahun
        ]);

        return redirect()->route('gaji.index')->with('success', 'Employee successfully added!');
    }

    public function show($id) {
        $salary = Salary::findOrFail($id);
        return view('salary.show', compact('salary'));
    }

    public function download($id) {
        // dapatkan data yang ingin dibuat pdf
        $salary = Salary::with('employee')->findOrFail($id);

        // membuat pdf
        $pdf = Pdf::loadView('salary.pdf', compact('salary'))->setPaper('a4', 'potrait');

        // setting nama pdf yang di download
        $filename = 'slip-gaji-' . $salary->employee->name . '-' . $salary->bulan . '-' . $salary->tahun . '.pdf';

        return $pdf->download($filename);
        
    }

    public function delete($id) {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('gaji.index')->with('success', 'Pay slip successfully deleted');
    }
}
