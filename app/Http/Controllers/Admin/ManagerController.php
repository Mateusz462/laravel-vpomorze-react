<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.manager.index');
    }

    public function admin()
    {
        return view('panel.manager.admin');
    }

    public function carriage()
    {
        return view('panel.manager.transport-department');
    }

    public function staff()
    {
        return view('panel.manager.staff');
    }

    public function supervision()
    {
        return view('panel.manager.traffic-supervision');
    }

    public function controlroom()
    {
        return view('panel.manager.control-room');
    }

    public function workshop()
    {
        return view('panel.manager.workshop');
    }

    public function stats()
    {
        return view('panel.manager.management.stats.index');
    }
}
