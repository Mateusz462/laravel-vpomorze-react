<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Ogloszenia;
use App\Models\User;
use App\Models\Events;
use App\Http\Controllers\Controller;
use DB;

class GraphController extends Controller
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

    public function getAllUsers(){
        $users = User::get();
        return response()->json(
            $users
        );
        // $graph = [
        //    [
        //        "id" => 1,
        //        "imie" =>"BREZES [P-001]",
        //        "nazwisko" =>"BREZES [P-001]",
        //        "avatar" =>"https://panel.vztm.pl/files/avatars/c2f7032cd53cf94f-32.jpg",
        //        "login" =>"BREZES [P-001]",
        //        "order" =>1,
        //        "code" =>"DonRemek [P-001]",
        //        "section" =>1,
        //        "gorder" =>12,
        //        "suspended" =>false,
        //        "ispatron" =>false,
        //    ],
        //    [
        //        "id" => 2,
        //        "imie" =>"Jakub",
        //        "nazwisko" =>"Jo\u0144cz12y ",
        //        "avatar" =>"https://panel.vztm.pl/files/avatars/c2f7032cd53cf94f-32.jpg",
        //        "login" =>"Przemexes",
        //        "order" =>1,
        //        "code" =>"ganiks1122 [DS-002]",
        //        "section" =>1,
        //        "gorder" =>12,
        //        "suspended" =>false,
        //        "ispatron" =>false,
        //        "worktime" => [
        //            "po" =>false,
        //            "wt" =>false,
        //            "sr" =>false,
        //            "cz" =>false,
        //            "pt" =>false,
        //            "so" =>false,
        //            "nd" =>false
        //         ],
        //         "permissions" =>[
        //             "p-assignment" =>true,
        //             "p-assignment-add" =>true,
        //             "p-assignment-edit" =>true,
        //             "p-assignment-delete" =>true,
        //             "p-assignment-cancel" =>true
        //         ]
        //    ],
        // ];
        return response()->json($graph, 200);
    }

    public function getUsersDuties(Request $dates){
        $users = User::get();
        $result = array();
        foreach ($users as $user) {
            $user_id = $user['id'];
            // Utwórz pustą podtablicę dla tego pracownika
            $result[$user_id] = array();
            // Pobierz informacje o tym, czy pracownik pracuje w danym dniu
            for ($a = 0; $a<=14; $a++) {
                $dni = array('NIEDZIELA', 'PONIEDZIAŁEK', 'WTOREK', 'ŚRODA', 'CZWARTEK', 'PIĄTEK', 'SOBOTA');
                $date[] = date_create($dates[$a]);
                $tyd[] = $dni[(date_format($date[$a],'w'))];
                $data = date_format($date[$a], 'Y-m-d');

                $result[$user_id][$data] = array();
                $schedules = $user->worktimes()->where('type', $tyd[$a])->get();
                foreach ($schedules as $schedule) {
                    $working = $schedule->working;
                    $vacation = $user->vacation()->where('date', $data)->first();
                    $duty = $user->duties()->where('date', $data)->first();
                    // Utwórz podtablicę dla tego dnia
                    $result[$user_id][$data] = array(
                        'working' => $working,
                        'kzw' => false,
                        'vacation' => $vacation ? true : null,
                        'duty' => $duty ? array(
                            'id' => $duty->id,
                            'name' => 'P-12/1-2',
                            'bus' => '#113',
                            'type' => $duty->type,
                            'status' => $duty->status,
                            'isKzw' => $duty->isKzw,
                            'isReserveAssigned' => $duty->is_reserve_assigned
                        ) : null
                    );
                }
            }
        }
        //'duty' =>
        //       array (
        //         'id' => '54587',
        //         'name' => '11/2/A',
        //         'bus' => '#118',
        //         'type' => false,
        //         'status' => 2,
        //         'isKzw' => false,
        //         'isReserveAssigned' => false,
        //       ),
        // Zwróć wynik
        return $result;
    }

    public function getUser(User $user){
        $usera = User::all()->sortDesc();
        return $user;
    }

}
