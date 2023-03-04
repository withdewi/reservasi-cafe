<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = 'Table';
    protected $guarded = ['id'];

    protected $fillable = ['name', 'guest_number', 'status', 'location'];
}
