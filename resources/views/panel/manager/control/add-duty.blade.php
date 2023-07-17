@extends('layouts.panel')

@section('title')
    Ustawienia Panelu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')
    .example-square {
        height: 100px;
        width: 100%;
        border-radius: 0.5rem;
        color: #fff;
        padding-top: 38px;
        text-align: center;
    }
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item">Menedżer firmy</li>
                    <li class="breadcrumb-item active" aria-current="page">Dyspozytornia</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    @php
        $grafik = true
    @endphp

    <div class="row">
        <div class="col-12 mt-3">
            <div class="row mb-4">
                <p>
                    <i class="fas fa-square blue fa-lg me-2"></i>Zwykła służba &nbsp; &nbsp;
                    <i class="fas fa-square text-success fa-lg me-2"></i>Zaliczony raport &nbsp; &nbsp;
                    <i class="fas fa-square text-danger fa-lg me-2"></i>Niezaliczony raport &nbsp; &nbsp;
                    <i class="fas fa-square purple fa-lg me-2"></i>KZW &nbsp; &nbsp;
                    <i class="fas fa-square orange fa-lg me-2"></i>Rezerwa &nbsp; &nbsp;
                    <i class="fas fa-square brown fa-lg me-2"></i>Rezerwa z kzw &nbsp; &nbsp;
                    <i class="fas fa-square brown fa-lg me-2"></i>Kurs anulowany &nbsp; &nbsp;
                </p>

            </div>
            <div class="row mb-4">
                <p>
                    <i class="fas fa-plus text-success fa-lg me-2"></i>Pracuje w danym dniu &nbsp; &nbsp;
                    <i class="fas fa-minus text-danger fa-lg me-2"></i>Nie pracuje w danym dniu
                </p>
            </div>
        </div>
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-body text-center pb-0">
                    <h1 class="mb-3">Dyspozytornia <small class="text-muted">kierowcy</small></h1>
                    <p class="px-2">
                        <button class="btn btn-outline-primary me-2"><i class="fas fa-user-tie fa-lg"></i>&nbsp; Zarząd</button>
                        <button class="btn btn-outline-warning me-2"><i class="fas fa-user-ninja fa-lg"></i>&nbsp; Pracownicy</button>
                        <button class="btn btn-outline-danger me-2"><i class="fas fa-id-card fa-lg"></i>&nbsp; Kierowcy</button>
                    </p>
                    @if(count($users) > 0)
                        <div class="row justify-content-center mb-3 d-none">
                            <div class="col-3">
                                <p>Dyżur na ten tydzień:</p>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                        <img class="rounded-circle" src="{{ Auth::user()->getPicture() }}" style="width: 50px">
                                        <p class="mb-0 font-weight-bold">{{ Auth::user()->login }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <p>Dyżur wspomagający na ten tydzień:</p>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                        <img class="rounded-circle" src="{{ Auth::user()->getPicture() }}" style="width: 50px">
                                        <p class="mb-0 font-weight-bold">{{ Auth::user()->login }}</p>
                                    </div>
                                    <div class="col-3">
                                        <img class="rounded-circle" src="{{ Auth::user()->getPicture() }}" style="width: 50px">
                                        <p class="mb-0 font-weight-bold">{{ Auth::user()->login }}</p>
                                    </div>
                                    <div class="col-3">
                                        <img class="rounded-circle" src="{{ Auth::user()->getPicture() }}" style="width: 50px">
                                        <p class="mb-0 font-weight-bold">{{ Auth::user()->login }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($grafik)
							<div class="elo">
								<div class="elo-header">
									<div class="row">
										@for($i=1; $i<=7; $i++)
											<div class="col">
												<div class="card border bg-dark mb-2">
													<div class="card-body text-center">
														<h4 class="">Sobota</h4>
														<p class="text-muted">XX.XX.XXXX</p>
														<!-- ' : 'btn-info') -->
														<!-- btn btn-sm btn-danger -->
														<!-- ' fa-exclamation-triangle: 'fa-question-circle') + ' -->
														<!-- <a href="{{ route('users.list') }}" class="btn btn-outline-success btn-lg">Wybierz</a><br> -->
														<button class="btn btn-sm btn-danger" onClick="uwagaDyspo()">
															<i class="fas fa-exclamation-triangle"></i>
														</button>
													</div>
												</div>
											</div>
										@endfor
									</div>
								</div>
								<div class="elo-body">
									@foreach ($users as $row)
										<div class="row">
											@for($i=1; $i<=7; $i++)
												<div class="col-sm m-0">
													<div class="card border bg-dark mb-2">
														<div class="card-body text-center py-2">
															<p class="py5 m-0">
																<!-- Button trigger modal -->
																<button type="button" class="btn btn-link text-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
																	<i class="far fa-calendar-plus fa-3x mb-3 mt-4"></i>
																</button>
															</p>
														</div>
													</div>
												</div>
											@endfor
										</div>
									@endforeach
								</div>
							</div>
                        @else
                            <br><br>
                            <button type="button" onClick="Ostrzezenie();" class="btn btn-info btn-lg">
                                <i class="fas fa-plus"></i>
                                &nbsp;WYGENERUJ GRAFIK NA TEN TYDZIEŃ
                            </button>
                            <br><br>
                        @endif
                    @else
                        <div class="col">
                            <div class="card border bg-dark mb-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-times fa-3x mb-3 mt-3"></i>
                                    <p class="fw-bold mb-2">Brak danych!</p>
                                    <p class="text-muted">Aby uzupełnić grafik należy dodać pracowników</p>
                                </div>
                            </div>
                        </div>
                    @endif
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection

@section('javascript')
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js?v=1"></script>
    <script type="text/javascript" src="{{ asset('js/socket.js') }}"></script>
    <script>
        window.addEventListener('beforeunload', (event) => {
            console.log(event);
            socket.emit(`unblock-duty`, {
                userId:userId,
                date: date
            })
            socket.emit(`update-duty`, {
                userId:userId,
                date: date
            })
        });
        
        var userId = <?=$request['user']?>;
        var date = '<?=$request['date']?>';
        var user = '<?= auth()->user()->login?>';
        const socket = io.connect('http://localhost:3000')
        socket.on("connect", function () {
            console.log("Connect to server.");
            socket.emit(`block-duty`, {
                userId:userId,
                user:user,
                date: date
            })
            socket.on('disconnect', (socket) => {
                console.log("disconnect");  
            })
        })
    </script>
@endsection
