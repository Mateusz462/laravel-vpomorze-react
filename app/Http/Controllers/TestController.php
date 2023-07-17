<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stints\Lines;

class TestController extends Controller
{
    public function raporty()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.praca.raporty.index');
    }

    public function grafik()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.praca.grafik.index');
    }

    public function wnioski()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.praca.wnioski.index');
    }

    public function zgloszenia()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.praca.zgloszenia.index');
    }

    public function pojazdy()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.dokumenty.tabor.index');
    }

    public function pojazdy_show()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::where('status', 3)->get();
        return view('panel.dokumenty.tabor.show', compact('users'));
    }

    public function sluzby()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.dokumenty.sluzby.index');
    }

    public function dokumenty()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.dokumenty.index');
    }

    public function faq()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.dokumenty.faq.index');
    }

    public function pobieralnia()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.dokumenty.pobieralnia.index');
    }

    public function formularz()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('panel.form-register');
    }

    public function profile(User $user)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(!$user->id): $user = auth()->user(); endif;
        $wnioski = [];
        $raporty = [];
        return view('panel.konto.profile', compact('user', 'wnioski', 'raporty'));
    }

    public function account()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::where('status', 5)->get();
        return view('panel.konto.account', compact('users'));
    }

    public function timetablesindex()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $lines = Lines::orderBy('name')->get();
        return view('blog.timetables.index', compact('lines'));
    }

    public function timetablesshow()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::where('status', 5)->get();
        return view('blog.timetables.show', compact('users'));
    }
}
