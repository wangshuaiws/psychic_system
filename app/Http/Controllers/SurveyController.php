<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:questionnaire_survey',['except' => 'questresult']);
    }
    //问卷管理
    public function questmanage()
    {
        return view('survey/questmanage');
    }
    //问卷分配
    public function questallot()
    {
        return view('survey/questallot');
    }
    //调查结果
    public function questresult()
    {
        return view('survey/questresult');
    }
}
