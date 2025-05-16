<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
