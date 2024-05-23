<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'diag_name',
        'diag_type',
        'diag_expected_life_exp',
        'diag_treatment',
    ];
}
