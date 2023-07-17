@extends('layouts.panel')

@section('title')
    Edytuj range - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item"><a href="{{ route('settings.roles.index') }}">Rangi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edytuj range</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Edytuj range
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('settings.roles.index') }}">Wszystkie Rangi</a>
					</ul>
				</div>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                <i class="fas fa-edit"></i> Edytuj range: {{ $role->name }}
                            </h4>
                        </div>
                        <!--col-->
                        <div class="col text-end">
                            <a href="{{ route('settings.roles.index') }}" class="btn btn-outline-danger"><i class="fas fa-theater-masks"></i> Rangi</a>
                        </div>
                    </div>
                    <!--row-->
                    <div class="mt-4">
                        <form action="{{ route('settings.roles.update', $role->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">
                                                <i class="fas fa-database"></i> Podstawowe dane
                                            </h4>
                                            <div class="mb-0">
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $role->name) }}" autocomplete="name"/>
                                                    <label class="form-label" for="name">Nazwa rangi</label>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3 @error('name') mt-4 @enderror">
                                                    <label class="form-label" for="color">Kolor rangi</label>
                                                    <input type="color" id="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $role->color) }}" autocomplete="color"/>
                                                    @error('color')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="prefix" name="prefix" class="form-control @error('prefix') is-invalid @enderror" value="{{ old('prefix', $role->prefix) }}" autocomplete="prefix"/>
                                                    <label class="form-label" for="prefix">Prefix rangi</label>
                                                    @error('prefix')
                                                        <div class="is-invalid invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="card mb-4 bg-dark">
                                            <div class="card-body">
                                                @foreach($role->users as $key=>$user)
                                                    <div class="d-flex align-items-start @if($role->users()->count() != $key+1) mb-2 @endif">
                                                        <img src="{{ $user->getPicture() }}" class="rounded-circle" height="38" alt="" loading="lazy">
                                                        <div class="ms-3">
                                                            <p class="fw-bold mb-0" style="color: {{$user->roles->first()->color}}">[{{$user->code}}] {{$user->login}}</p>
                                                            <p class="mb-0 d-none">
                                                                <span class="gdpr">
                                                                    <span class="name">{{$user->imie}} {{$user->nazwisko}}</span>
                                                                    <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                                                </span>
                                                            </p>
                                                            <p class="text-muted mb-0">
                                                                <span class="gdpr">
                                                                    <span class="name">{{$user->email}}</span>
                                                                    <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                <i class="fas fa-fingerprint"></i> Permisje
                                            </h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                    @forelse($modules->chunk(3) as $key=>$chunks)
                                                        <div class="row mt-4">
                                                            @foreach($chunks as $key=>$module)
                                                                <div class="col">
                                                                    <h5>Moduł: {{ $module->name }}</h5>
                                                                    @foreach($module->permissions as $key=>$permission)
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                id="permission-{{ $permission->id }}"
                                                                                name="permissions[]"
                                                                                value="{{ $permission->id }}"
                                                                                    @foreach($role->permissions as $rPermission)
                                                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                                                    @endforeach
                                                                                >
                                                                            <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                                                {{ $permission->name }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @empty
                                                        <div class="row">
                                                            <div class="col text-center">
                                                                <strong>Brak modułów! Nie można załadować permsji!</strong>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                 </div>
                                                 @if($permissions->count() > 0)
                                                    <div class="form-group">
                                                        <label class="required" for="permissions">Uprawnienia bez przypisanego modułu</label>
                                                        <div style="padding-bottom: 4px">
                                                            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Zaznacz wszystko</span>
                                                            <span class="btn btn-danger btn-xs deselect-all" style="border-radius: 0">Odznacz wszystko</span>
                                                        </div>
                                                        <select class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                                                            @foreach($permissions as $id => $permissions)
                                                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('permissions'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('permissions') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Zapisz</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
