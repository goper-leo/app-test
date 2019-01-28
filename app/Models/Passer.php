<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'campus_eligibility',
        'school',
        'division',
    ];


}
