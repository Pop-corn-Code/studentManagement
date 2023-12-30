<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Attendance;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "address",
        "phone",
        "semester",
        "gr_NO"
    ];

    public function attendances(): HasMany{
        return $this->hasMany(Attendance::class);
    }
    
    public function name(){
        return $this->firstname.' '.$this->lastname;
    }
}
