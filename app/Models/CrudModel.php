<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    // new_db
    protected $connection =
    "'// new_db'";
    protected $table = 'crud_table';
    protected $fillable = [
        'Name',
        'Age',
    ];
}
