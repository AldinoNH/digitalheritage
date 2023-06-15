<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $table = 'paketwisata';
    protected $primaryKey = 'id_paketwisata';
    protected $fillable = [
        'nama_paketwisata',
        'harga_paketwisata',
    ];

    public $timestamps = true;
}
