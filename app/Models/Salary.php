<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    protected $fillable = [
        'employee_id',
        'gaji_pokok',
        'tunjangan_makan',
        'tunjangan_transportasi',
        'potongan',
        'gaji_bersih',
        'bulan',
        'tahun',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
