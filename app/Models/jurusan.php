<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nama_jurusan','keterangan'];
    use HasFactory;
}
