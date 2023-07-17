<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModule;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreModuleRequest;
//use App\Http\Requests\UpdatePermissionRequest;
use Brian2694\Toastr\Facades\Toastr;

class PermissionModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module = PermissionModule::paginate(24);

        return view('panel.administracja.perms.modules.index', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.administracja.perms.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreModuleRequest $request)
     {
         try{
             $permission = PermissionModule::create($request->all());
             Toastr::success('Moduł został utworzony pomyślnie','Sukces');
             return redirect()->route('settings.perms.module.index')->with('success', 'Moduł został utworzony pomyślnie');
         } catch (\Exception $e) {
             Toastr::error('Wystąpił błąd podczas tworzenia modułu','Błąd!');
             return redirect()->route('settings.perms.module.index')->with('error', 'Wystąpił błąd podczas tworzenia modułu');
         }
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
