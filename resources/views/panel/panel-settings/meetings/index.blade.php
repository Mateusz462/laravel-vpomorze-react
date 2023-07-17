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
                    <li class="breadcrumb-item active" aria-current="page">Zebrania</li>
                </ol>
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
                                <i class="fas fa-bullhorn"></i> Zebrania
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('ann.tags.index') }}" class="btn btn-outline-info"><i class="fas fa-tags"></i> Etykiety</a>
                            <a href="{{ route('ann.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Dodaj zebranie</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($meetings) > 0)
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tytuł</th>
                                            <th>Etykiety</th>
                                            <th>Autor</th>
                                            <th>Dodano</th>
                                            <th>Wygasa</th>
                                            <th>Opublikowano</th>
                                            <th>Akcje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($meetings as $row)
                                            <tr>
                                                <td>
                                                    <h5>{{$row->title}}</h5>
                                                </td>
                                                <td>
                                                    <h5>
                                                        @if($row->tags->count() > 0)
                                                            @foreach($row->tags as $key => $item)
                                                                <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                            @endforeach
                                                        @else
                                                            <span class="badge badge-danger">Brak etykiet</span>
                                                        @endif
                                                    </h5>
                                                </td>
                                                <td>
                                                    {{ $row->user->login }}
                                                </td>
                                                <td>
                                                    {{ $row->created_at->format('d.m.Y H:i:s') }}
                                                </td>
                                                <td>
                                                    @if($row->date_n == 0)
                                                        {{ $row->date_to->format('d.m.Y') }}
                                                    @else
                                                        Nigdy
                                                    @endif
                                                </td>
                                                <td>
                                                    <h5>
                                                        @if($row->status == 1)
                                                            <span class="text-success">●</span>
                                                        @elseif($row->status == 0)
                                                            <span class="text-danger">●</span>
                                                        @else
                                                            <span class="text-gray">●</span>
                                                        @endif
                                                    </h5>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <a href="{{ route('ann.show', $row->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('ann.edit', $row->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--table-->
                            </div>
                        @else
                            <div class="col-lg-12">
                                <div class="card shadow mb-4 bg-warning">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $meetings->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
