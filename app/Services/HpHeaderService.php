<?php

namespace App\Services;

use App\Models\HpHeader;
use App\Models\HpKey;
use Illuminate\Support\Facades\DB;
use App\Services\CommonService;


class HpHeaderService
{
    //全データ取得
    public function getHeaderAll(){
        return HpHeader::all()->sortBy('header_id');
    }

    //master_id別件数取得
    public function getHeaderAllCount(){
        return HpHeader::select('m.master_id')
            ->selectRaw('count(h.header_id) as count')
            ->from('hp_masters as m')
            ->leftJoin('hp_headers as h', "h.master_id","m.master_id")
            ->groupBy('m.master_id')
            ->orderBy('m.master_id')
            ->get();
    }

    //master_idで絞込取得
    public function getHeaderByMasterId($masterId){
        return HpHeader::where('master_id', $masterId)
        ->orderBy('header_id')
        ->get();
    }

    //データ登録
    public function store($data)
    {
        $countCol = HpHeader::where('col_name', operator: $data["col_name"])
        ->where('master_id', $data["master_id"])
        ->count();
        $countView = HpHeader::where('view_name', $data["view_name"])
        ->where('master_id', $data["master_id"])
        ->count();

        if($countCol > 0){
            $result = [
                "status" => "error",
                "mess" => "カラム名が登録されています。変更してください。",
            ];
            return $result;
        }

        if($countView > 0){
            $result = [
                "status" => "error",
                "mess" => "表示名が登録されています。変更してください。",
            ];
            return $result;
        }

        //ヘッダーIDをキーテーブルから取得して設定する
        $count = HpKey::select('key_val')->where('key_name', $data["master_id"])->count();

        //キーテーブルにデータがなかった場合は登録する
        if($count == 0){
            HpKey::create([
                'key_name' => $data["master_id"],
                'key_val' => '0'
            ]);
        }
        $key = HpKey::select('key_val')->where('key_name', $data["master_id"])->first();
        $key = intval($key->key_val) + 1;
        //キーテーブルに最新のIDを登録
        HpKey::where('key_name', $data["master_id"])
        ->update(
            ["key_val" => $key]
        );

        //ヘッダーに登録
        $key = $data["master_id"] . str_pad($key, 3, '0', STR_PAD_LEFT);
        $data += ["header_id" => $key];

        HpHeader::create($data);

        $result = [
            "status" => "success",
            "mess" => "項目が登録されました。",
        ];
        return $result;
    }

    //データ更新
    public function update($data){
        HpHeader::where('header_id', $data["header_id"])->update([
            "col_name" => $data["col_name"],
            "view_name" => $data["view_name"],
            "type" => $data["type"],
            "required_flg" => $data["required_flg"],
            "public_flg" => $data["public_flg"]
        ]);

        $result = [
            "status" => "success",
            "mess" => "項目が更新されました。",
        ];
        return $result;
    }

    //データ削除
    public function delete($headerId){
        HpHeader::where('header_id', $headerId)->delete();

        $result = [
            "status" => "success",
            "mess" => "項目が削除されました。",
        ];
        return $result;
    }
}
