<?php

namespace App\Services;

use App\Models\HpData;
use Illuminate\Support\Facades\DB;
use App\Services\CommonService;


class HpSubDataService
{
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
    //relation_flg = '1'の場合
    public function getSubHpData1($data){
        $data = DB::table('hp_sub_data as sdata')
        ->select('sdata.row_id as row_id',
            'sdata.sub_data as sub_data',
            'sdata.public_flg as public_flg',
            'header.col_name as col_name',
            'header.view_name as view_name',
            'header.type as type',
            'header.required_flg as required_flg',
            'header.public_flg as public_flg'
        )
        ->join('hp_headers as header', 'sdata.header_id', '=', 'header.header_id')
        ->join('hp_data as data', 'sdata.data_id1', '=', 'data.data_id')
        ->where('sdata.delete_flg', '0')
        ->where('sdata.public_flg', '0')
        ->where('header.public_flg', '0')
        ->where('data.data', $data)
        ->orderBy('sdata.priority')
        ->orderBy('sdata.data_id1')
        ->get();

        return $this->commonService->subDataConversion($data);
    }
}
