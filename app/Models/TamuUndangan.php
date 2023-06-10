<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamuUndangan extends Model
{
    use HasFactory;

    protected $table = 'tamu_undangans';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
