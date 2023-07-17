@extends('layouts.panel')

@section('title')
    Ogłoszenie - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Ogłoszenie</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
		<div class="col-12">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    @if($ann)
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-bullhorn"></i> Ogłoszenie: {{ $ann->title }}
                                </h4>
                            </div>
                            <!--col-->
                            <div class="col-lg-9">
                                <div class="card bg-dark border border-1 mt-3">
                                    <div class="card-body">
                                        {!! $ann->text !!}
                                        <a href="{{ route('home') }}" class="btn btn-secondary "><i class="far fa-caret-square-left"></i> Powrót do strony głównej</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card shadow mb-4 bg-dark mt-3">
                                    <div class="card-body text-center">
                                        <img class="rounded-circle mb-3" src="{{ $ann->user->getPicture() }}" style="width: 125px">
                                        <h3>{{ $ann->user->login }}</h3>
                                        <p class="mt-1">
                                            @if(count($ann->user->roles) < 1)
                                                Brak danych!
                                            @else
                                                @foreach($ann->user->roles as $key => $item)
                                                    <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="card bg-dark border border-1 mt-3">
                                    <div class="card-body">
                                        <p class="mb-2">
                                            <i class="far fa-calendar-alt"></i> <b>Dodano:</b> {{ $ann->created_at->format("d.m.Y H:i:s") }}<br>
                                            <i class="far fa-calendar-check"></i> <b>Ostatnia edycja:</b> {{ $ann->updated_at->format("d.m.Y H:i:s") }}<br>
                                            <i class="far fa-calendar-times"></i> <b>Wygasa:</b> @if($ann->date_n == 0) {{ $ann->date_to->format("d.m.Y") }} @else  <i style="color: red;" class="fa fa-times"></i>@endif<br>
                                            <i class="fas fa-check-circle"></i> <b>Status:</b>
                                            @if($ann->status == 1)
                                                <span class="text-success">●</span>
                                            @elseif($ann->status == 0)
                                                <span class="text-danger">●</span>
                                            @else
                                                <span class="text-gray">●</span>
                                            @endif
                                        </p>
                                        <p class="mb-1">
                                            <i class="fas fa-tags"></i> <b>Tagi:</b>
                                        </p>
                                        <p class="h5">
                                            @if($ann->tags)
                                                @foreach($ann->tags as $key => $item)
                                                    <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">Brak etykiet</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else

                    @endif
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
