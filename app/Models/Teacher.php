<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "password",
        "course_name"
    ];
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
