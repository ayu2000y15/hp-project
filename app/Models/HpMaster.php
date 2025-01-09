<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpMaster extends Model
{
    protected $table = 'hp_masters';
    public $timestamps = true;

    protected $fillable = [
        'master_id','relation_flg', 'title', 'comment', 'delete_flg'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
