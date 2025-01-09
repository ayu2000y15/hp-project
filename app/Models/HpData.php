<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpData extends Model
{
    protected $table = 'hp_data';
    protected $primaryKey = 'data_id';
    public $timestamps = true;

    protected $fillable = [
        'header_id', 'row_id', 'data', 'priority',
        'public_flg', 'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
