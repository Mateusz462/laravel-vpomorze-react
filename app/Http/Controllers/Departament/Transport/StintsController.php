<?php

namespace App\Http\Controllers\Departament\Transport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stints\Stints;
use App\Models\Stints\Brigade;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class StintsController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
        return view('panel.manager.departament.transport.stints.index');
    }

    public function editor(Brigade $brigade)
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
        return view('panel.manager.departament.transport.stints.editor', compact('brigade'));
    }

    public function brigades(Stints $stint)
    {
        // dd($stint);
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
        return view('panel.manager.departament.transport.stints.brigades', compact('stint'));
    }

    public function brigades_store(Request $request, $stint)
    {
        $request->validate([
            'number' => 'required',
            'vehicle_class' => 'required',
        ]);
        $vehicle_class = json_encode($request->input('vehicle_class'));
        try {
            $data = [
                'number' => $request->number,
                'typ_pojazdu' => $vehicle_class,
                'night' => $request->night,
                'old_vehicles' => $request->old_vehicles,
                'time_departure' => '',
                'time_exit' => '',
                'stints_id' => $stint,
                'carriers_id' => '1'
            ];
            $route = Brigade::create($data);
            Toastr::success('Utworzono pomyślnie','Sukces');
            return redirect()->route('manager.transport.stints.brigades', $stint)->with('success', 'Utworzono pomyślnie');
            
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas tworzenia','Error!');
            return redirect()->route('manager.transport.stints.brigades', $stint)->with('error', $e);
        }
        // abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'route' => 'required',
            'direction' => 'required',
        ]);
        $lines1 = Lines::firstOrCreate(
            [
                'name' => $request->name,
                'color' => 'indigo darken-2'
            ],
            [
                'name' => $request->name                
            ]
        );
        try {
            $route = DB::table('lines_routes')->updateOrInsert(
                [
                    'route' => $request->route,
                    'lines_id' => $lines1->id,
                ], 
                [
                    'route' => $request->route,
                    'direction' => $request->direction,
                    'kilometers' => 0,
                    'points' => 0,
                    'status' => 1,
                    'lines_id' => $lines1->id
                ]
            );
            try {
                Toastr::success('Utworzono pomyślnie','Sukces');
                return redirect()->route('manager.transport.lines.index')->with('success', 'Utworzono pomyślnie');
            } catch (\Exception $e) {
                Toastr::error('Wystąpił błąd podczas tworzenia','Error!');
                return redirect()->route('manager.transport.lines.index')->with('error', 'Wystąpił błąd podczas tworzenia');
            }
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas tworzenia','Error!');
            return redirect()->route('manager.transport.lines.index')->with('error', 'Wystąpił błąd podczas tworzenia');
        }
    }

    public function busstops(Request $request)
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $line = DB::table('lines_routes')
                    ->select('lines_routes.*', 'lines.*', 'lines_routes.id')
                    ->join('lines', 'lines_routes.lines_id', '=', 'lines.id')
                    ->where('lines_routes.id', $request->line)
                    ->first();
        return view('panel.manager.departament.transport.lines.busstops', compact('line'));
    }

    public function measurement_line(Request $request)
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $line = DB::table('lines_routes')
                    ->select('lines_routes.*', 'lines.*', 'lines_routes.id')
                    ->join('lines', 'lines_routes.lines_id', '=', 'lines.id')
                    ->where('lines_routes.id', $request->line)
                    ->first();
        return view('panel.manager.departament.transport.lines.measurement.line', compact('line'));
    }
}
