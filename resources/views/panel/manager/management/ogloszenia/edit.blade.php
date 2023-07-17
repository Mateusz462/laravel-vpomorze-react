@extends('layouts.panel')

@section('title')
    Ogłoszenia - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item"><a href="{{ route('manager.management.ogloszenia.index') }}">Ogłoszenia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edytuj ogłoszenie</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Edytuj ogłoszenie
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('manager.management.ogloszenia.index') }}">Ogłoszenia</a>
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
                                <i class="fas fa-edit"></i> Edytuj ogłoszenie
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('manager.management.ogloszenia.index') }}" class="btn btn-outline-danger"><i class="fas fa-bullhorn"></i> Ogłoszenia</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                        <div class="mt-4">
                            <form action="{{ route('manager.management.ogloszenia.update', $ann->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card mb-4 bg-dark">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">
                                                    <i class="fas fa-database"></i> Podstawowe dane
                                                </h4>
                                                <div class="mt-4">
                                                    <div class="form-outline mt-4">
                                                        <input type="text" id="title" name="title" class="form-control" value="{{ $ann->title }}" />
                                                        <label class="form-label" for="title">Tytuł</label>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-auto">
                                                            <label class="form-label" for="date_to">Data wygaśnięcia</label>
                                                            <div class="form-outline ">
                                                                <input type="date" id="date_to" name="date_to" class="form-control" value="{{ $ann->date_to }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto mt-4">
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="checkbox" value="" id="date_n" name="date_n" {{  ($ann->date_n == 1 ? ' checked' : '') }} disabled />
                                                                <label class="form-check-label" for="date_n">Nie wygasa</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label class="form-label" for="role">Dodaj etykiety:</label>
                                                        <select class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags" multiple >
                                                            @foreach($tags as $id => $tag)
                                                                <option value="{{ $tag->id }}" {{ (in_array($id, old('tags', [])) || $ann->tags->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('tags'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('tags') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label class="form-label" for="role">Dodaj grupy:</label>
                                                        <select class="form-control @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple >
                                                            @foreach($roles as $id => $roles)
                                                                <option value="{{ $id }}" {{ (in_array($id, old('roles', []))) ? 'selected' : '' }}>{{ $roles }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('roles'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('roles') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="col-auto">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="pinned" id="pinned" {{  ($ann->pinned == 1 ? ' checked' : '') }}/>
                                                                <label class="form-check-label" for="pinned">
                                                                    Przypnij do góry
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="status" id="status"  {{  ($ann->status == 1 ? ' checked' : '') }}/>
                                                                <label class="form-check-label" for="status">
                                                                    Opublikuj
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <div class="card mb-4 bg-dark">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">
                                                    <i class="fas fa-heading"></i> Treść
                                                </h4>
                                                <div class="mt-4">
                                                    <div class="form-outline">
                                                        <textarea class="form-control ckeditor" id="text" name="text" rows="16">{{ $ann->text }}</textarea>
                                                        <label class="form-label" for="text">Treść ogłoszenia</label>
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
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
