<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['label', 'color'];

    public function Videogames()
    {
        return $this->hasMany(Videogame::class);
    }
}
