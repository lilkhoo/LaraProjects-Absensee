<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function absents()
    {
        return $this->hasMany(Absent::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
