<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelapor',
        'email_pelapor',
        'sektor',
        'keluhan',
        'keterangan',
    ];
}
