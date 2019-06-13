<?php

namespace LaraManager\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use LaraManager\Http\Controllers\Controller;
use LaraManager\Model\TbCliente;

class DashboardController extends Controller
{
    public function index()
    {
        $data['qtdClientes'] = count(TbCliente::all());

        return view('modules.Dashboard.list')->with($data);
    }
}
