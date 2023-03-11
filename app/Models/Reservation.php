<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $reservation = 'Reservation';
    protected $guarded = ['id'];

    protected $fillable = ['first_name', 'last_name', 'email', 'no_telp', 'date', 'guest_number', 'table_id'];

    public function table(){
        return $this->hasMany(Table::class);
    }  
}
