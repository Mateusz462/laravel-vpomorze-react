<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogloszenia;
use App\Models\Surveys\Survey;
use App\Models\AnnLabel;
use Gate;
use Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
//use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdateAnnRequest;
use Brian2694\Toastr\Facades\Toastr;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $survey = Survey::with(['questions'])->paginate(24);

        return view('panel.panel-settings.poll.index', compact('survey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ogloszenia $survey)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ogloszenia = Ogloszenia::with(['tags'])->paginate(24);

        return view('panel.panel-settings.poll.response', compact('ogloszenia'));
    }

    public function take(Survey $survey)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $survey->load('questions');
        //dd($survey->questions);
        if($survey->status == 1){
            return view('panel.panel-settings.poll.take', compact('survey'));
        } else {
            if(auth()->user()->hasRole('Administrator')) {
                return view('panel.panel-settings.poll.take', compact('survey'));
            } else {
                Toastr::error('Nie takiego formularza lub brak uprawnień!','Błąd!');
                return redirect()->route('home')->with('error', 'Nie takiego formularza lub brak uprawnień!');
            }
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
