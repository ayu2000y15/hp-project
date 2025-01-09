<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\HpHeaderService;
use App\Services\HpMasterService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class AdminDataController extends Controller
{
    protected $hpMaster;
    protected $hpHeader;
    public function __construct(HpMasterService $hpMaster, HpHeaderService $hpHeader)
    {
        $this->hpMaster = $hpMaster;
        $this->hpHeader = $hpHeader;
    }

    public function data()
    {
        $master = $this->hpMaster->getMasterAll();
        $headerData = $this->hpHeader->getHeaderAll();
        return view('admin.data', compact('master', 'headerData'));
    }

    //hp_headers登録
    public function storeHeader(Request $request)
    {
        $validatedData = $request->validate([
            'master_id' => 'required|string',
            'col_name' => 'required|string',
            'view_name' => 'required|string',
            'type' => 'required|string',
            'required_flg' => 'required|string',
            'public_flg' => 'required|string',
        ]);

        $result = $this->hpHeader->store($validatedData);
        return redirect()->route('admin.data')
        ->with($result["status"] ,$result["mess"]);
    }

    //hp_headers更新
    public function updateHeader(Request $request)
    {
        $validatedData = $request->validate([
            'header_id' => 'required|string',
            'master_id' => 'required|string',
            'col_name' => 'required|string',
            'view_name' => 'required|string',
            'type' => 'required|string',
            'required_flg' => 'required|string',
            'public_flg' => 'required|string',
        ]);

        $result = $this->hpHeader->update($validatedData);
        return redirect()->route('admin.data')
        ->with($result["status"] ,$result["mess"]);
    }

    //hp_headers削除
    public function deleteHeader(Request $request)
    {
        $result = $this->hpHeader->delete($request->header_id);
        return redirect()->route('admin.data')
        ->with($result["status"] ,$result["mess"]);
    }
}
