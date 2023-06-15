<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objekwisata extends Model
{
    use HasFactory;

    protected $table = 'objekwisata';
    protected $primaryKey = 'id_objekwisata';
    protected $fillable = ['judul_objekwisata', 'deskripsi_objekwisata', 'gambar_objekwisata'];
}
