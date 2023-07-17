<?php

namespace App\Http\Controllers\Departament\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LeavesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles'])->get();
        //dd($users);

        return view('panel.manager.departament.hr.leaves.index', compact('users'));
    }
}
