<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpKey extends Model
{
    protected $table = 'hp_keys';
    public $timestamps = true;

    protected $fillable = [
        'key_id','key_name', 'key_val', 'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
