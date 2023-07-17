<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Gate;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Stints\Stints;
use App\Models\Stints\Brigade;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StintsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');
    }

    public function getAllStints(Request $request){
        
        $stints = DB::table('stints')->get();
        $output = '';
        
        if(count($stints) > 0){
            foreach($stints as $row){
                $output .= '<div class="'; if($request->format) $output .= $request->format; else $output .= 'col-12'; $output .='">';
                $output .= '<div class="card shadow bg-dark mb-4">
                                <div class="card-body text-start pb-0">
                                    <p class="mb-0"><b>Służba:</b> '.$row->name.'</p>
                                    <p class="mb-0"><b>Typ dnia:</b><span class="badge badge-secondary ms-2">'.$row->day_type.'<span></p>
                                    <p class="card-text">
                                        <div class="btn-grup" role="group" aria-label="Basic example">
                                            <a href="'.route('manager.transport.stints.brigades', $row->id).'" class="btn btn-success" data-mdb-toggle="tooltip" title="Edytuj służbę"><i class="far fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-mdb-toggle="tooltip" title="Usuń służbę"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </p>
                                </div>';
                $output .= '</div>';
                $output .= '</div>';
            }
        } else {
            $output .= '
            <div class="card shadow mb-4 bg-dark">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                </div>
            </div>';
        }

        return ($output);
    }

    public function getAllBrigadesofStints(Request $request){

        $brigades = Brigade::where('stints_id', $request->stints)->orderBy('number', 'ASC')
        ->get()
        ->map(function ($item) {
            $item->typ_pojazdu = json_decode($item->typ_pojazdu);
            return $item;
        });

        // $brigades = Brigade::where('stints_id', $request->stints)->orderBy('number', 'ASC')->get();
        $output = '';
        
        if(count($brigades) > 0){
            foreach($brigades as $row){
                
                $output .= '<div class="'; if($request->format) $output .= $request->format; else $output .= 'col-12'; $output .='">';
                $output .= '<div class="card shadow bg-dark mb-4">
                                <div class="card-body">
                                    <h3><b>Brygada: '.$row->number.'</b></h3>
                                    <p class="mb-1">
                                        <b class="mb-4">Przewoźnik:</b>
                                        <span class="badge badge-success float-right">
                                            <i class="fas fa-shield-alt"></i> ZTM Ostaszewo
                                        </span>
                                    </p>
                                    <p class="mb-1">
                                        <b class="mb-3">Pojazdy dopuszczone:</b>';
                                        foreach($row->typ_pojazdu as $opcja){
                                            // echo $key->name, '<br>';
                                            $output .= '
                                            <span class="badge badge-info float-right ms-1">
                                                <i class="fas fa-bus-alt"></i> '.$opcja.'
                                            </span>';
                                        }
                                        $output .= '
                                    </p>
                                    <p class="mb-1">
                                        <b class="mb-4">Pojazdy zabytkowe:</b>';
                                        if($row->old_vehicles){
                                            $output .= '<i style="color: green;" class="fa fa-check float-right"></i>';
                                        } else {
                                            $output .= '<i style="color: red;" class="fa fa-times float-right"></i>';
                                        }
                                        $output .= '
                                    </p>
                                    <p class="mb-1">
                                        <b class="mb-3">Nocka:</b>';
                                        if($row->night){
                                            $output .= '<i style="color: green;" class="fa fa-check float-right"></i>';
                                        } else {
                                            $output .= '<i style="color: red;" class="fa fa-times float-right"></i>';
                                        }
                                        $output .= '
                                    </p>
                                    <p class="mb-1">
                                        <b class="mb-3">Rodzaj brygady:</b>
                                        <span class="badge badge-danger float-right">
                                            <i class="fas fa-times-circle"></i> Niezdefiniowany
                                        </span>
                                    <p>
                                    <p class="card-text text-center">
                                        <a href="#" class="btn btn-success">
                                            <i class="fas fa-search"></i> Dokument
                                        </a>
                                        <a href="'.route('manager.transport.stints.editor', $row->id).'" class="btn btn-info">
                                            <i class="fas fa-pencil-alt"></i> Kreator
                                        </a>
                                        <button type="button" class="btn btn-danger del_btn"><i class="fas fa-trash"></i> Usuń</button>
                                    </p>
                                </div>';
                $output .= '</div>';
                $output .= '</div>';
            }
        } else {
            $output .= '
            <div class="card shadow mb-4 bg-dark">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                </div>
            </div>';
        }

        return ($output);
    }
}
