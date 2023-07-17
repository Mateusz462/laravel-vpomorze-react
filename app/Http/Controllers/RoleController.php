<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\PermissionModule;
use App\Models\OgraniczeniaPanel;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with(['permissions'])->paginate(24);

        return view('panel.administracja.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::where('module_id', '=', '0')->get()->pluck('name', 'id');
        $modules = PermissionModule::with(['permissions'])->get();

        return view('panel.administracja.roles.create', compact('modules', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        try{
            $request['order'] = Role::count()+1;
            $role = Role::create($request->all());
            $role->permissions()->sync($request->input('permissions', []));
            Toastr::success('Ranga została utworzona pomyślnie','Sukces');
            return redirect()->route('settings.roles.index')->with('success', 'Ranga została utworzona pomyślnie');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas tworzenia rangi','Błąd!');
            return redirect()->route('settings.roles.index')->with('error', 'Wystąpił błąd podczas tworzenia rangi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');
        $permissions = Permission::where('module_id', '=', '0')->get()->pluck('name', 'id');
        $modules = PermissionModule::with(['permissions'])->get();

        return view('panel.administracja.roles.edit', compact('permissions', 'role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try{
            $role->update($request->all());
            $role->permissions()->sync($request->input('permissions', []));
            Toastr::success('Ranga została zaktualizowana pomyślnie','Sukces');
            return redirect()->route('settings.roles.index')->with('success', 'Ranga została zaktualizowana pomyślnie');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas aktualizacji rangi','Błąd!');
            return redirect()->route('settings.roles.index')->with('error', 'Wystąpił błąd podczas aktualizacji rangi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
