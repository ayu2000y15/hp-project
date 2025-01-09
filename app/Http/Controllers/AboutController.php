<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HpHeaderService;
use App\Services\HpMasterService;
use App\Services\HpDataService;

class AboutController extends Controller
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

    public function index()
    {
        $company = $this->hpData->getHpDataByMasterId('T001');

        return view('about', compact('company'));
    }
}
