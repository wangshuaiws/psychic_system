<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }

    //测评档案
    public function archivestest()
    {
        return view('management/archivestest');
    }
    //个案管理
    public function archivespersonal()
    {
        return view('management/archivespersonal');
    }
    //问卷档案
    public function archivesquest()
    {
        return view('management/archivesquest');
    }
    //综合档案
    public function archivesall()
    {
        return view('management/archivesall');
    }

}
