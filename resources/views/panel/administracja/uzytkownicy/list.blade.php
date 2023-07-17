@extends('layouts.panel')

@section('title')
    Użytkownicy - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Menedżer firmy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Użytkownicy</li>
                </ol>
            </nav>
            <div class="col d-flex justify-content-md-end h-100 mx-3">
                <div class="rounded-3 d-flex justify-content-center align-items-center me-3">
                    <a class="btn btn-link" href="{{ route('users.card') }}"><i class="fas fa-th"></i></a>
                </div>
                <div class="rounded-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-link active" href="{{ route('users.list') }}"><i class="fas fa-bars"></i></a>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Wszyscy Użytkownicy
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.list') }}">Wszyscy Użytkownicy</a>
                        <a class="dropdown-item" href="{{ route('users.create') }}">Stwórz użytkownika</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deactivated') }}">Dezaktywowowani użytkownicy</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deleted') }}">Zwolnieni użytkownicy</a>
					</ul>
				</div>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h3 class="mb-4"><b><i class="fas fa-users me-2"></i>Użytkownicy</b></h3>
        </div>
    </div>
    <form action="{{ route('users.list') }}" method="get" class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_login" name="filter_login" class="form-control" />
                        <label class="form-label" for="filter_login">Login</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_email" name="filter_email" class="form-control" />
                        <label class="form-label" for="filter_email">Email</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_code" name="filter_code" class="form-control" />
                        <label class="form-label" for="filter_code">Kod</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Szukaj</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
		<div class="col-12">
            <div class="table-responsive border">
                 @if(count($users) > 0)
                    <table class="dataTable table table-dark table-striped table-hover text-white mb-0" style="width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th class="text-start">Nazwa</th>
                                <th class="text-start">Stanowisko</th>
                                <th>Stały przydział</th>
                                <th>Data zatrudnienia</th>
                                <th>Status</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                                <tr class="text-center">
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <img src="{{ $row->getPicture() }}" class="rounded-circle" height="42" alt="" loading="lazy">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-0" style="color: {{$row->roles->first()->color}}">[{{$row->code}}] {{$row->login}}</p>
                                                <p class="mb-0 d-none">
                                                    <span class="gdpr">
                                                        <span class="name">{{$row->imie}} {{$row->nazwisko}}</span>
                                                        <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                                    </span>
                                                </p>
                                                <p class="text-muted mb-0 d-none">
                                                    <span class="gdpr">
                                                        <span class="name d-none">{{$row->email}}</span>
                                                        <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor">UKRYTO</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <p class="fw-bold mb-1">
                                            @if(count($row->roles) < 1)
                                                Brak danych!
                                            @else
                                                @foreach($row->roles as $key => $item)
                                                    @if($key < 3)
                                                        <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                    @endif
                                                @endforeach
                                                @if($key > 3)
                                                    <span class="badge rounded-pill" style="background-color:rgb(161, 161, 163)">+{{ count($row->roles)-3 }}</span>
                                                @endif
                                            @endif
                                        </p>
                                        <p class="text-muted mb-0">Zarząd WP</p>
                                    </td>
                                    <td>
                                        brak
                                    </td>
                                    <td>
                                        {{$row->created_at->format('d.m.Y')}}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-dark btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                            @if($row->suspended == 0)
                                                <i class="far fa-dot-circle text-success me-2"></i>Aktywne
                                            @elseif($row->status == 1)
                                                <i class="far fa-dot-circle text-danger me-2"></i>Nie aktywne
                                            @else
                                                <i class="far fa-dot-circle text-secondery me-2"></i>N/A
                                            @endif
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="#"><i class="far fa-dot-circle text-secondery me-2"></i>N/A</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="far fa-dot-circle text-success me-2"></i>Aktywne</a>
                                            <a class="dropdown-item" href="#"><i class="far fa-dot-circle text-danger me-2"></i>Nie aktywne</a>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <p class="mb-0">Oczekujące na ocenę: <span class="badge bg-warning rounded-pill">1</span></p>
                                        <p class="mb-0">Zaliczone: <span class="badge bg-success rounded-pill">13</span></p>
                                        <p class="mb-0">Niezaliczone: <span class="badge bg-danger rounded-pill">3</span></p>
                                        <p class="mb-0">Anulowane: <span class="badge bg-secondary rounded-pill">2</span></p>
                                        <p class="mb-0">Oczekujące na złożenie: <span class="badge bg-primary rounded-pill">3</span></p>
                                    </td>
                                    <td>
                                        <p class="mb-0">Kilometry: <span class="badge bg-secondary rounded-pill">50 km</span></p>
                                        <p class="mb-0">Punkty: <span class="badge bg-primary rounded-pill">130 ptk</span></p>
                                    </td> -->
                                    <td class="text-center">
                                        <div class="btn-group">
                                            @can('login-as-user')
                                                @if(auth()->user()->id != $row->id)
                                                    <a href="{{ route('admin.user.switch-start', $row->id) }}" class="btn btn-secondary" data-mdb-toggle="tooltip" title="Przełącz konto">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endif
                                            @endcan
                                            <a href="{{ route('profile.index', $row->id) }}" class="btn btn-primary" data-mdb-toggle="tooltip" title="Podglad Użytkownika">
                                                <i class="fas fa-id-card-alt"></i>
                                            </a>
                                            @can('user_edit')
                                                <a href="{{ route('users.user.edit', $row->id) }}" class="btn btn-info" data-mdb-toggle="tooltip" title="Edytuj Użytkownika">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            @endcan
                                            <button type="button" class="btn btn-success" onClick="RangiUzytkownika($row->id, $row->login);" data-mdb-toggle="tooltip" title="Rangi Użytkownika">
                                                <i class="fas fa-passport"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" onClick="UsunUzytkownika($row->id, $row->login);" data-mdb-toggle="tooltip" title="Usuń Użytkownika">
                                                <i class="fas fa-user-minus"></i>
                                            </button>
                                        </div>
                        
                                        <div class="btn-group btn-group-sm d-none" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                            
                                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--table-->
                @else
                    <div class="col-lg-12">
                        <div class="card shadow mb-4 bg-warning">
                            <div class="card-body text-center">
                                <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                            </div>
                        </div>
                    </div>
                @endif
                {{ $users->links() }}
            </div>
            <!--row-->
		</div>
	</div>
@endsection

@section('js-files')
    <script src="{{ asset('js/users_filter.js') }}"></script>
@endsection
