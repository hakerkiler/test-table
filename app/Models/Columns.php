<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    protected $table = 'columns';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'order',
    ];
}
