<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrmawaComment extends Model
{
    use HasFactory;
    protected $table = 'ormawa__comments';
    protected $fillable = ['comment'];
}
