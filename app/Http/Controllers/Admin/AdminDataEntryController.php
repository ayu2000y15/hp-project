<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\HpHeaderService;
use App\Services\HpMasterService;
use App\Services\HpDataService;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class AdminDataEntryController extends Controller
{
    protected $hpMaster;
    protected $hpHeader;
    protected $hpData;
    public function __construct(HpMasterService $hpMaster, HpHeaderService $hpHeader, HpDataService $hpData)
    {
        $this->hpMaster = $hpMaster;
        $this->hpHeader = $hpHeader;
        $this->hpData = $hpData;
    }

    public function dataEntry()
    {
        $master = $this->hpMaster->getMasterAll();
        $headerData = $this->hpHeader->getHeaderAll();
        $headerCount = $this->hpHeader->getHeaderAllCount();
        $data = $this->hpData->getHpData();
        $rowIdCount = $this->hpData->getHpDataCount();

        \Debugbar::addMessage($data);


        return view('admin.data-entry', compact('master', 'headerData', 'headerCount','data', 'rowIdCount'));
    }

    public function storeDataEntryGet()
    {
        return view('admin.data-entry-store');
    }

    public function storeDataEntry(Request $request)
    {
        $masterId = $request->header_id;
        $master = $this->hpMaster->getMasterById($masterId);
        $headerData = $this->hpHeader->getHeaderByMasterId($masterId);
        $data = $this->hpData->getHpData();

        Session::put('master', $master);
        Session::put('headerData', $headerData);
        Session::put('data', $data);

        return view('admin.data-entry-store');
    }

    public function storeData(Request $request)
    {
        $master = Session::get('master');
        $result = $this->hpData->store($master, $request);

        return redirect()->route('admin.data-entry.storeDataEntry')
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
