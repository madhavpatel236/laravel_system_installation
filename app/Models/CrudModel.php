<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    // protected $connection = 'laravel_system_installation';
    protected $table = 'crud_table';
    protected $fillable = [
        'Name',
        'Age',
    ];
}
