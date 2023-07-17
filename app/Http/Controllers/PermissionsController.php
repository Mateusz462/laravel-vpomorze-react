<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PermissionModule;
use App\Http\Requests\StorePermissionRequest;
//use App\Http\Requests\UpdatePermissionRequest;
use Brian2694\Toastr\Facades\Toastr;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perms = Permission::with(['module'])->paginate(24);

        return view('panel.administracja.perms.index', compact('perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = PermissionModule::get();
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.administracja.perms.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        try {
            $permission = Permission::create($request->validated());
            Toastr::success('Uprawnienie zostało utworzone pomyślnie','Sukces');
            return redirect()->route('settings.perms.index')->with('success', 'Uprawnienie zostało utworzone pomyślnie');
        } catch (Throwable | Exception $e) {
            Toastr::error('Wystąpił błąd podczas tworzenia uprawnienia','Błąd!');
            return redirect()->route('settings.perms.index')->with('error', $e);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
