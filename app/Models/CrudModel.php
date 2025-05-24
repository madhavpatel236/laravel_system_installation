<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    // new_db
    protected $connection =
    "madhav72";
    protected $table = 'crud_table';
    protected $fillable = [
        'Name',
        'Age',
    ];
}
