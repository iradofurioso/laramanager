<?php

namespace LaraManager\Http\Controllers\Base;

use Illuminate\Http\Request;
use LaraManager\Http\Controllers\Controller;

class AppController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application major layout.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('templates.layout');
    }

}
