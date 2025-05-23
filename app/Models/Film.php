<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['name','publication_status','link'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
