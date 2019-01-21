<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolsController extends Controller
{
    //
    public function getXShopee(){
        return view('System.Tools.XShopee');
    }
    public function getMShopee(){
        return view('System.Tools.MShopee');
    }
    public function getKeyWord(){
        return view('System.Tools.KeyWord');
    }
    public function getSpy(){
        return view('System.Tools.Spy');
    }
}
