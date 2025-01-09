<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpHeader extends Model
{
    protected $table = 'hp_headers';
    public $timestamps = true;

    protected $fillable = [
        'header_id','master_id', 'col_name', 'view_name', 'type',
        'required_flg', 'public_flg', 'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
