<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'nama_customer',
        'email_customer',
        'tanggal_booking',
        'note_customer',
    ];

    public $timestamps = true;
}
