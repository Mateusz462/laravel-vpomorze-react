<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Ogloszenia;
use App\Models\User;
use App\Models\Events;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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


        // $section = json_decode([
        //     {"id":"1","name":"Sekcja Dęta Blaszana","description":"0x626c61636861206f706973","settings":"0x656c6f","owner_id":"1","created_at":"2022-01-01 13:05:06","updated_at":null},
        // ]) ;
        //
        //
        // $chatsettings = [
        //     {"id":"1","blocked":"0","blocked_reason":"Przerwa Techniczna","date":"2022-08-13 22:54:41","thema":"dark-warning","created_at":null,"updated_at":null,"user_id":"1","sections_id":"1"},
        // ];
        //
        //
        // $chatmassage = [
        //     {"id":"2","message":"0x74616b","hidden":"0","time":"2022-08-05 14:26:27","status":"1","created_at":null,"updated_at":null,"sections_id":"1","user_id":"3"},
        //     {"id":"3","message":"0x657373612031303025","hidden":"0","time":"2022-08-05 14:26:27","status":"1","created_at":null,"updated_at":null,"sections_id":"1","user_id":"4"},
        //     {"id":"4","message":"0x617364756968617573696468696173686469","hidden":"0","time":"2022-08-05 22:58:24","status":"1","created_at":"2022-08-05 00:00:00","updated_at":"2022-08-05 22:58:48","sections_id":"1","user_id":"2"},
        //     {"id":"5","message":"0x7972","hidden":"0","time":"2022-08-05 21:26:37","status":"1","created_at":"2022-08-05 21:26:37","updated_at":"2022-08-05 21:26:37","sections_id":"1","user_id":"1"},
        //     {"id":"6","message":"0x656c6f","hidden":"0","time":"2022-08-05 21:26:46","status":"1","created_at":"2022-08-05 21:26:46","updated_at":"2022-08-05 21:26:46","sections_id":"1","user_id":"1"},
        //     {"id":"7","message":"0x7375655c6d61","hidden":"0","time":"2022-08-05 21:30:03","status":"1","created_at":"2022-08-05 21:30:03","updated_at":"2022-08-05 21:30:03","sections_id":"1","user_id":"3"},
        //     {"id":"10","message":"0x437a65736321","hidden":"0","time":"2022-08-11 18:29:44","status":"1","created_at":"2022-08-11 18:29:44","updated_at":"2022-08-11 18:29:44","sections_id":"1","user_id":"1"},
        //     {"id":"23","message":"0x48656a21","hidden":"0","time":"2022-08-13 19:37:28","status":"1","created_at":"2022-08-13 19:37:28","updated_at":"2022-08-13 19:37:28","sections_id":"1","user_id":"1"},
        //     {"id":"24","message":"0x636f2074616d3f","hidden":"0","time":"2022-08-13 19:39:03","status":"1","created_at":"2022-08-13 19:39:03","updated_at":"2022-08-13 19:39:03","sections_id":"1","user_id":"1"},
        //     {"id":"25","message":"0x74657374","hidden":"0","time":"2022-08-13 20:32:16","status":"1","created_at":"2022-08-13 20:32:16","updated_at":"2022-08-13 20:32:16","sections_id":"1","user_id":"1"},
        // ];
        //
        // $chatpermuser = [
        //     {"id":"1","blocked":"1","blocked_reason":"test","can_avoid_spam":"1","can_block":"1","can_hide":"1","can_see_hidden":"1","status":"1","description":"0x31","created_at":null,"updated_at":null,"sections_id":"1","user_id":"1"},
        //     {"id":"2","blocked":"0","blocked_reason":"0","can_avoid_spam":"1","can_block":"1","can_hide":"1","can_see_hidden":"1","status":"1","description":"0x31","created_at":null,"updated_at":null,"sections_id":"1","user_id":"3"},
        // ]

        // $chatmassage = ChatMessage::with(['user'])->where('sections_id', $section->id)->get();
        // $chatsettings = DB::table('chat_sections_settings')->where('sections_id', $section->id)
        // ->join('users', 'user_id', '=', 'users.id')
        // ->first();
        // $chatpermuser = DB::table('users_sections')->where('sections_id', $section->id)->where('user_id', auth()->id())->first();

        return view('panel.home', [
            'ogloszenia' => $ogloszenia,
            'users' => $users,
            'events' => $events,

            // 'section' => $section,
            // 'chatsettings' => $chatsettings,
            // 'chatmassage' => $chatmassage,
            // 'chatpermuser' => $chatpermuser,
        ]);
        //Toastr::success('Messages in here', 'Title');
        //return view('panel.home');
    }
}
