<?php namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


class BaseController extends Controller {
    const PER_PAGE_NUM = 20;
    public function __construct()
    {
        //注册两个middleware。用户判断登陆，和权限
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }
}