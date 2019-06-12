<?php

namespace LaraManager\Http\Controllers\Base;

use Illuminate\Http\Request;
use LaraManager\Http\Controllers\Controller;

class AppController extends Controller
{
    
    
    public function index()
    {
        $data['url'] = 'http://laramanager.dev.br/'; 
        return view('templates.layout')->with($data);
    }
    
    
    public function login()
    {
        $data['url'] = 'http://laramanager.dev.br/'; 
        $data['msg'] = '';
        return view('templates.login')->with($data);
    }

}
