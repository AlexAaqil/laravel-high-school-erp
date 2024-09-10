<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'class_id');
    }
}
