<?php

namespace App\Services;

use App\Models\HpMaster;
use Illuminate\Support\Facades\DB;
use App\Services\CommonService;


class HpMasterService
{
    public function getMasterAll()
    {
        return HpMaster::all()->sortBy('master_id');
    }

    public function getMasterById($masterId)
    {
        return HpMaster::where('master_id', $masterId)->get();
    }
}
