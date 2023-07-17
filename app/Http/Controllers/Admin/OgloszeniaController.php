<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Ogloszenia;
use App\Models\AnnLabel;
use Gate;
use Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
//use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdateAnnRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class OgloszeniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ogloszenia = Ogloszenia::with(['tags'])->paginate(24);
        return view('panel.manager.management.ogloszenia.index', compact('ogloszenia'));
    }

    public function index_tags()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $AnnLabel = AnnLabel::paginate(24);

        return view('panel.manager.management.ogloszenia.etykiety.index', compact('AnnLabel'));
    }

    public function poll_index()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ogloszenia = Ogloszenia::with(['tags'])->paginate(24);

        return view('panel.manager.poll.index', compact('ogloszenia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::get()->pluck('name', 'id');
        $tags = AnnLabel::get();
        return view('panel.manager.management.ogloszenia.create', compact('roles', 'tags'));
    }

    public function create_tags()
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::get()->pluck('name', 'id');
        $tags = AnnLabel::get();
        return view('panel.manager.management.ogloszenia.etykiety.create', compact('roles', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            if ($request->status == '' || $request->status == 'null') {
                $request->status = 0;
            } elseif ($request->status == 'on') {
                $request->status = 1;
            }
            $tags = $request->tags;
            // $request->user_id = ;
            //
            // $request->date_n = '2137';

            $data = [
                'title' => $request->title,
                'date_n' => '0',
                'date_to' => $request->date_to,
                'text' => $request->text,
                'discord' => '0',
                'is_pinned' => '0',
                'status' => $request->status,
                'user_id' => auth()->user()->id
            ];

            $ann = Ogloszenia::create($data);
            $ann->tags()->sync($request->input('tags', []));

            Toastr::success('Ogłoszenie zostało dodane pomyślnie','Sukces');
            return redirect()->route('ann.index')->with('success', 'Ogłoszenie zostało dodane pomyślnie');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas dodawania ogłoszenia','Błąd!');
            return redirect()->route('ann.index')->with('error', 'Wystąpił błąd podczas dodawania ogłoszenia');
        }
    }

    public function store_tags(Request $request)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);
        try {
            $ann = AnnLabel::create($request->all());

            Toastr::success('Etykieta została dodana pomyślnie','Sukces');
            return redirect()->route('ann.tags.index')->with('success', 'Etykieta została dodana pomyślnie');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas dodawania etykiety','Błąd!');
            return redirect()->route('ann.tags.index')->with('error', 'Wystąpił błąd podczas dodawania etykiety');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ogloszenia $ann)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ann->load('tags');
        if($ann->status == 1){
            return view('panel.manager.management.ogloszenia.show', compact('ann'));
        } else {
            if(auth()->user()->hasRole('Administrator')) {
                return view('panel.manager.management.ogloszenia.show', compact('ann'));
            } else {
                Toastr::error('Nie takiego ogłoszenia lub brak uprawnień!','Błąd!');
                return redirect()->route('home')->with('error', 'Nie takiego ogłoszenia lub brak uprawnień!');
            }
        }
    }

    public function poll_show(Ogloszenia $ann)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ann->load('tags');
        if($ann->status == 1){
            return view('panel.manager.management.ogloszenia.show', compact('ann'));
        } else {
            if(auth()->user()->hasRole('Administrator')) {
                return view('panel.manager.management.ogloszenia.show', compact('ann'));
            } else {
                Toastr::error('Nie takiego ogłoszenia lub brak uprawnień!','Błąd!');
                return redirect()->route('home')->with('error', 'Nie takiego ogłoszenia lub brak uprawnień!');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ogloszenia $ann)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::get()->pluck('name', 'id');
        $tags = AnnLabel::get();
        $ann->load('tags');
        return view('panel.manager.management.ogloszenia.edit', compact('ann', 'roles', 'tags'));


        //return view('panel.administracja.uzytkownicy.edit', compact('tags', 'ann'));
    }

    public function edit_tags(AnnLabel $tag)
    {
        //abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$tags = AnnLabel::where('id', '=', $tag)->get();
        //dd($tag);
        return view('panel.manager.management.ogloszenia.etykiety.edit', compact('tag'));


        //return view('panel.administracja.uzytkownicy.edit', compact('tags', 'ann'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Ogloszenia  $ann
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnRequest $request, Ogloszenia $ann)
    {
        //abort_if(Gate::denies('user_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            if ($request->status == '') {
                $ann->status = 0;
            } elseif ($request->status == 'on') {
                $ann->status = 1;
            }
            $tags = $request->tags;
            $ann->user_id = auth()->user()->id;

            $ann->update($request->validated());
            $ann->tags()->sync($request->input('tags', []));

            Toastr::success('Ogłoszenie zostało pomyślnie zapisane','Sukces');
            return redirect()->route('manager.management.ogloszenia.index')->with('success', 'Ogłoszenie zostało pomyślnie zapisane');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas zapisywania ogłoszenia','Błąd!');
            return redirect()->route('manager.management.ogloszenia.index')->with('error', 'Wystąpił błąd podczas zapisywania ogłoszenia');
        }
    }

    public function update_tags(Request $request, AnnLabel $tag)
    {
        //abort_if(Gate::denies('user_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        try {
            $tag->update($request->all());

            Toastr::success('Etykieta została pomyślnie zapisana','Sukces');
            return redirect()->route('manager.management.ogloszenia.tags.index')->with('success', 'Etykieta została pomyślnie zapisana');
        } catch (\Exception $e) {
            Toastr::error('Wystąpił błąd podczas zapisywania etykiety','Błąd!');
            return redirect()->route('manager.management.ogloszenia.tags.index')->with('error', $e);
        }
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

    public function destroy_tags($id)
    {
        //
    }
}
