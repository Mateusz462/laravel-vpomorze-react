<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Gate;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Ogloszenia;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LinesController extends Controller
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

    public function getAllLines(Request $request){
        
        $lines = DB::table('lines_routes')
                    ->select('lines_routes.*', 'lines.*', 'lines_routes.id')
                    ->join('lines', 'lines_routes.lines_id', '=', 'lines.id')
                    ->orderBy('lines.name')
                    ->get();
        
        $output = '';
        if(count($lines) > 0){
            foreach($lines as $row){
                $output .= '<div class="'; if($request->format) $output .= $request->format; else $output .= 'col-12'; $output .='">';
                $output .= '<div class="card shadow '; if($row->color) $output .= $row->color; else $output .= 'bg-dark'; $output .=' mb-4">
                                <div class="card-body text-start pb-0">';
                                    if($request->action == 'course-editor'){
                                        $output .= '<h3 class="mb-"><b>Linia:</b> '.$row->name.'/'.$row->route.'
                                        <button type="button" class="btn btn-success float-right" data-mdb-toggle="tooltip" title="Dodaj kurs"><i class="fas fa-arrow-right"></i></button>
                                        </h3>
                                        ';
                                    } else {
                                        $output .= '
                                        <p class="mb-0"><b>Linia:</b> '.$row->name.'</p>
                                        <p class="mb-0"><b>Wariant:</b> '.$row->route.'</p>
                                        <p class="mb-0"><b>Kierunek:</b> '.$row->direction.'</p>
                                        <p class="card-text">
                                        <div class="btn-grup" role="group" aria-label="Basic example">
                                            <a href="'.route('manager.transport.measurement.measurement_line', $row->id).'" class="btn btn-primary" data-mdb-toggle="tooltip" title="Pomiary wariantu"><i class="fas fa-business-time fw-bold"></i></a>
                                            <a href="'.route('manager.transport.lines.busstops', $row->id).'" class="btn btn-success" data-mdb-toggle="tooltip" title="Edytuj wariant"><i class="far fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-mdb-toggle="tooltip" title="Usuń wariant"><i class="far fa-trash-alt"></i></button>
                                        </div>';
                                    }
                                    $output .= '
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

    public function getBusstopLines(Request $request){
        $lines = DB::table('lines_routes_busstops')
                    ->where('lines_id', $request->lines)
                    ->where('day_type', $request->day)
                    //->join('lines', 'lines_routes.lines_id', '=', 'lines.id')
                    ->get();
        switch($request->day){
            case 'PR': $day = 'Powszedni roboczy'; break;
            case 'PS': $day = 'Powszedni specjalny'; break;
            case 'SR': $day = 'Sobotni roboczy'; break;
            case 'SS': $day = 'Sobotni specjalny'; break;
            case 'PS': $day = 'Powszedni okresowy'; break;
            case 'NSR': $day = 'Niedzielne i Święta roboczy'; break;
            default: $day = 'Powszedni roboczy'; break;
        }

        $output = '';
        $output .= '<input type="hidden" id="input-day-type" value="'.$request->day.'">';
        $output .= '<input type="hidden" id="input-day-type-text" value="'.$day.'">';
        if(count($lines) > 0){
            foreach($lines as $row){
                $output .= '<div id="busstop-'.$row->id.'" class="busstop-result-inner mb-2 card card-body pb-0 bg-dark">
                                <form action="" method="" id="przystanek-form-'.$row->id.'" class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <div id="busstoplist-header">
                                                <p id="busstop-name-'.$row->id.'" class="h3 mb-0">
                                                    <span class="busstop-assignment">'.$row->assignment.'</span>. '.$row->busstop.'
                                                </p>
                                                <p id="" class="mb-0">
                                                    <span id="busstop-time-'.$row->id.'" class="text-muted">Różnica czasu przejazdu to: '.$row->minutes.' minut</span>
                                                    <span class="busstop-input-'.$row->id.' d-none">Edytuj nazwę przystanku</span>
                                                </p>
                                                <input type="text" name="przystanek" class="form-control mt-1 busstop-input-'.$row->id.' d-none" placeholder="Nazwa przystanku">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span class="float-end">
                                                <button type="button" id="btn-edit-'.$row->id.'" onclick="EditBusstop('.$row->id.')" class="btn btn-success mb-2" data-mdb-toggle="tooltip" title="Edytuj przystanek"><i class="fas fa-edit"></i></button>
                                                <button type="button" id="btn-times-'.$row->id.'" onclick="CancelEditBusstop('.$row->id.')" class="btn btn-success mb-2" style="display: none" data-mdb-toggle="tooltip" title="Anuluj"><i class="fas fa-times"></i></button>
                                                <button type="button" href="#" class="btn btn-danger mb-2" data-mdb-toggle="tooltip" title="Usuń przystanek"><i class="fas fa-trash"></i></button><br>
                                                <button type="button" id="busstop-button-'.$row->id.'" class="btn btn-success d-none" data-mdb-toggle="tooltip" title="Zapisz zmiany">Zatwierdź</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>';
                $output .= '</div>';
            }
        } else {
            $output .= '
            <div class="card shadow mb-4 bg-dark">
                <div class="card-body text-center">
                    <i class="fas fa-times-circle fa-3x mb-3"></i>
                    <p>Brak przystanków dla danego wariantu!</p>
                </div>
            </div>';
        }

        return ($output);
    }

    public function addBusstopLines(Request $request){
        $rules = [
            'busstop' => 'required',
            'day_type' => 'required',
            'assignment' => 'required',
            'line_id' => 'required',
        ];

        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response['status'] = 'error';
            $response['response'] = $validator.message();
        } else {
            //process the request
            $lines1 = DB::table('lines_routes_busstops')->insert(
                [
                    'busstop' => $request->busstop,
                    'day_type' => $request->day_type,
                    'assignment' => $request->assignment,
                    'lines_id' => $request->line_id,
                ]
            );
            try {
                $response['status'] = 'success';
            } catch (\Exception $e) {
                $response['status'] = 'error';
                $response['response'] = 'Wystąpił nieoczekiwany błąd';
            }            
        }

        return $response;
    }
}
