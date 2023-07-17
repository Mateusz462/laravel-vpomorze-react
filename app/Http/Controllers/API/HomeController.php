<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Ogloszenia;
use App\Models\User;
use App\Models\Events;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ogloszenia = Ogloszenia::where('status', '1')->get()->sortDesc();
        $events = Events::get()->sortDesc();
        $users = User::with('roles')->paginate(10);

        return view('panel.home', [
            'ogloszenia' => $ogloszenia,
            'users' => $users,
            'events' => $events,
        ]);
        //Toastr::success('Messages in here', 'Title');
        //return view('panel.home');
    }

    public function getAllAnnouments(){
        $annouments = Ogloszenia::where('status', '1')->get()->sortDesc();

        $annouments->transform(function($ann){
            $ann->tags;
            return $ann;
        });
        return response()->json([
            'annouments' => $annouments
        ], 200);

    }
}
