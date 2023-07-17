<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use Gate;
use Auth;
use Session;
use Redirect;
use Symfony\Component\HttpFoundation\Response;
//use App\Http\Requests\StoreRoleRequest;
//use App\Http\Requests\UpdateRoleRequest;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //abort_if(Gate::denies('user_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$users = User::;
        //$users = User::with(['roles'])->;
        $users = User::with('roles')->paginate(10);
       
        return view('panel.praca.users.online', compact('users'));
    }

}
