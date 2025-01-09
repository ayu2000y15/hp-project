<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'file_name', 'talent_id', 'file_path', 'view_flg', 'priority',
        'alt', 'spare1', 'spare2', 'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];


}
