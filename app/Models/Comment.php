<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    
    protected $fillable = ['name', 'comment', 'whatsapp', 'bukti_transfer', 'angkatan', 'jurusan', 'kota_domisili'];
}
