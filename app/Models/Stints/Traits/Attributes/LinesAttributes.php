<?php

namespace App\Models\Auth\Traits\Attributes;

use Illuminate\Support\Facades\Hash;
use DB;

trait LinesAttributes
{
    public function getAllLines(){
        $lines = DB::table('lines_routes')
                    ->select('lines_routes.*', 'lines.*', 'lines_routes.id')
                    ->join('lines', 'lines_routes.lines_id', '=', 'lines.id')
                    ->get();
        $output = '';
        if(count($lines) > 0){
            foreach($lines as $row){
                $output .= '<div class="card shadow mb-4">
                                <div class="card-body text-start pb-0">
                                    <p class="mb-0"><b>Linia:</b>'.$row->name.'</p>
                                    <p class="mb-0"><b>Wariant:</b>'.$row->route.'</p>
                                    <p class="mb-0"><b>Kierunek:</b>'.$row->direction.'</p>
                                    <p class="card-text">
                                        <div class="btn-grup" role="group" aria-label="Basic example">
                                            <a href="'.route('manager.transport.lines.busstops', $row->id).'" class="btn btn-primary" data-mdb-toggle="tooltip" title="Lista przystanków"><i class="fas fa-business-time fw-bold"></i></a>
                                            <button type="button" class="btn btn-success" data-mdb-toggle="tooltip" title="Edytuj wariant"><i class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" data-mdb-toggle="tooltip" title="Usuń wariant"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </p>
                                </div>';
                $output .= '</div>';
            }
        } else {
            $output .= '
            <div class="mt-5 mb-5 d-flex justify-content-center">
                <div class="p-3">
                    <div class="first text-center">
                        <i class="fas fa-times-circle fa-6x"></i>
                        <h3 class="mt-3">Brak wiadomości</h3>
                        <p class="text-muted">
                            To jest początek tego czatu!
                        </p>
                    </div>
                </div>
            </div>';
        }

        return ($output);
    }
}
