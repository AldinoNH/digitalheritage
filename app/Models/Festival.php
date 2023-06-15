<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $table = 'festival';
    protected $primaryKey = 'id_festival';
    protected $fillable = ['judul_festival', 'deskripsi_festival', 'gambar_festival'];
}
