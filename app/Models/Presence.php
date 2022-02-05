<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $table = 'presences';

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function absent()
    {
        return $this->belongsTo(Absent::class, 'absent_id', 'id');
    }
}
