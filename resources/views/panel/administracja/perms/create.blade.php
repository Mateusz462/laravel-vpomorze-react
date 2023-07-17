@extends('layouts.panel')

@section('title')
    Stwórz nową permisje - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.perms.index') }}">Permisje</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stwórz nową permisje</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Stwórz permisje
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('settings.perms.create') }}">Stwórz permisje</a>
                        <a class="dropdown-item" href="{{ route('settings.perms.index') }}">Wszystkie permisje</a>
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
                                Stwórz nową permisje
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    <div class="mt-4">
                        <form action="{{ route('settings.perms.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                Podstawowe dane
                                            </h4>
                                            <div class="mt-4">
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name"/>
                                                    <label class="form-label" for="name">Nazwa permisji</label>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mt-4 @error('name') mt-5 @enderror">
                                                    <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description"/>
                                                    <label class="form-label" for="description">Opis permisji</label>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3 @error('name') mt-4 @enderror">
                                                   <label class="required" for="module">Uprawnienia bez przypisanego modułu</label>
                                                   <select class="form-control @error('module') is-invalid @enderror" name="module" id="module">
                                                       @foreach($modules as $id => $module)
                                                           <option value="{{ $id }}" {{  old('module', []) ? 'selected' : '' }}>{{ $module->name }}</option>
                                                       @endforeach
                                                   </select>
                                                   @if($errors->has('module'))
                                                   <div class="invalid-feedback">
                                                       {{ $errors->first('module') }}
                                                   </div>
                                                   @endif
                                               </div>
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
