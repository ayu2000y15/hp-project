<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpSubData extends Model
{
    protected $table = 'hp_sub_data';
    protected $primaryKey = 'sub_data_id';
    public $timestamps = true;

    protected $fillable = [
        'header_id', 'data_id1', 'data_id2', 'row_id',
        'sub_data', 'priority' ,'public_flg' ,'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
