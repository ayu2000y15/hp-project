<?php

namespace App\Services;

use App\Models\HpData;
use App\Models\HpHeader;
use Illuminate\Support\Facades\DB;

class HpDataService
{
    protected $commonService;
    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
    public function getHpData()
    {
        $data = DB::table('hp_data as data')
        ->select('data.row_id as row_id',
            'data.data as data',
            'data.data_id as data_id',
            'data.public_flg as public_flg',
            'header.header_id as header_id',
            'header.col_name as col_name',
            'header.view_name as view_name',
            'header.type as type',
        )
        ->join('hp_headers as header', 'data.header_id', '=', 'header.header_id')
        ->where('data.delete_flg', '0')
        ->orderBy('data.priority')
        ->orderBy('data.data_id')
        ->get();

        //return $result;
        return $this->commonService->dataConversion($data);
    }

    //一覧データ取得(master_idで検索)
    public function getHpDataByMasterId($tableId){
        $data = DB::table('hp_data as data')
        ->select('data.row_id as row_id',
            'data.data as data',
            'data.public_flg as public_flg',
            'header.col_name as col_name',
            'header.view_name as view_name',
            'header.type as type',
            'header.required_flg as required_flg',
            'header.public_flg as public_flg'
        )
        ->join('hp_headers as header', 'data.header_id', '=', 'header.header_id')
        ->where('data.delete_flg', '0')
        ->where('data.public_flg', '1')
        ->where('header.public_flg', '1')
        ->where('header.master_id', $tableId)
        ->orderBy('data.priority')
        ->orderBy('data.data_id')
        ->get();
        \Debugbar::addMessage($data);

        return $this->commonService->dataConversionMasterId($data);
    }

    public function getHpDataCount()
    {
        return HpData::max('row_id');
    }

    //データ登録
    public function store($masters, $data)
    {
        foreach ($masters as $master) {
            $masterId = $master["master_id"];
        }

        //ヘッダー情報を取得
        $headers = HpHeader::where('master_id', $masterId)->get();


        foreach ($headers as $header) {
            $col_name = $header["col_name"];
            $headerId = 'header_id_' . $col_name;
            $rowId = HpData::where('header_id', $header["header_id"])->max('row_id');
            $rowIdCnt = null;

            if(!is_null($rowId)){
                $rowIdCnt = $rowId + 1;
            }else{
                $rowIdCnt = 1;
            }

            HpData::create([
                'header_id' => $data->$headerId,
                'row_id' => $rowIdCnt,
                'data' => $data->$col_name,
                'public_flg' => '1'
            ]);

        }

        $result = [
            "status" => "success",
            "mess" => "データが登録されました。",
        ];

        return $result;
    }

    //データ更新
    public function update($data){
        HpData::where('data_id', $data["data_id"])
        ->update([
            "data" => $data["value"],
        ]);

        $result = [
            "status" => "success",
            "mess" => "データが更新されました。",
        ];
        return $result;
    }
}
