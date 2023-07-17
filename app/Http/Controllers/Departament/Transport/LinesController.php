<?php

namespace App\Http\Controllers\Departament\Transport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stints\Lines;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class LinesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
        return view('panel.manager.departament.transport.lines.index');
    }

    public function matrix()
    {
        //abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden')
        return view('panel.manager.departament.transport.matrix.index');
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
