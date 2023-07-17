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
        <div id="vztm-graph">
            <div class="vztm-graph--header"></div>
        </div>
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
		<div class="col-12 d-none">
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
										@for($i=1; $i<=8; $i++)
											<div class="col">
												<div class="card border bg-dark mb-2">
													<div class="card-body text-center">
														@if($i==1)
															<div class="pb-3">
																<p class="fw-bold ">XX.XX.XXXX - XX.XX.XXXX</p>
															</div>
															<div class="">
																<a href="{{ route('users.list') }}" class="btn btn-outline-success btn-lg">
																	<i class="fas fa-chevron-left"></i>
																</a>
																<a href="{{ route('users.list') }}" class="btn btn-outline-success btn-lg">
																	<i class="fas fa-chevron-right"></i>
																</a>
															</div>
														@else
															<h4 class="">Sobota</h4>
															<p class="text-muted">XX.XX.XXXX</p>
															<!-- ' : 'btn-info') -->
															<!-- btn btn-sm btn-danger -->
															<!-- ' fa-exclamation-triangle: 'fa-question-circle') + ' -->
															<!-- <a href="{{ route('users.list') }}" class="btn btn-outline-success btn-lg">Wybierz</a><br> -->
															<button class="btn btn-sm btn-danger" onClick="uwagaDyspo()">
																<i class="fas fa-exclamation-triangle"></i>
															</button>
														@endif
													</div>
												</div>
											</div>
										@endfor
									</div>
								</div>
								<div class="elo-body">
									@foreach ($users as $row)
										<div class="row">
											@for($i=1; $i<=8; $i++)
												<div class="col-sm m-0">
													<div class="card border bg-dark mb-2">
														<div class="card-body text-center py-2">
															@if($i==1)
																<div class="py3 m-0">
																	<img class="rounded-circle" src="{{ $row->getPicture() }}" style="width: 50px">
																	<p class="mb-0 font-weight-bold">[ {{$row->code}} ] {{ $row->login }}</p>
																	<p class="mb-0">Etat: 1/7</p>
																	<p class="mb-0">Stały pojazd: #102</p>
																	<p class="mb-0">Patron: <span class="text-success"><i class="fas fa-check"></i></span></p>
																	<p class="mb-0">Doświadczony kierowca: <span class="text-danger"><i class="fas fa-times"></i></span></p>
																</div>
															@else
																<p class="py5 m-0">
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-link text-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
																		<i class="far fa-calendar-plus fa-3x mb-3 mt-4"></i>
																	</button>
																</p>
															@endif
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
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
        <div class="modal-dialog modal-fullscreen  modal-dialog-centered">
            <div class="modal-content">
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content"> -->
                <div class="modal-body">
                    <h3 class="my-4 font-weight-bold ">Dodawanie służby 10.08.2021 - <a href="index.php?a=profile&amp;p=14" style="color: #ff0077">[KP-005] Tragar</a></h3>
                    <div id="modal-loading" class="text-center" style="display: none;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div id="modal-zawartosc">
                        <div class="row">
							<div class="col-4">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body text-center">
        								<h5>Informacje</h5>
                                        <p>
        									<b>Kierowca:</b> <span><a href="index.php?a=profile&amp;p=1" style="color: #3cbeda">[P-001] BREZES</a></span><br>
        									<b>Przewoźnik:</b> <span>ZTM Ostaszewo</span><br>
        									<b>Stanowisko:</b> <span style="color: #3cbeda">Prezes WP</span><br>
        									<b>Etat:</b> <span>0/7</span><br>
        									<b>Patron:</b> <span class="text-danger"><i class="fas fa-times"></i></span><br>
        									<b>Pojazd:</b> <span>brak danych!</span><br>
        								</p>
                                    </div>
                                </div>

                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body">
        								<h5>Legenda</h5>
        								<p>
        									<h6>Służba:</h6>
        									<ul>
                                                <li><strong>(1)</strong> - zajęta I zmiana</li>
                                                <li><strong>(2)</strong> - zajęta II zmiana</li>
                                                <li><strong>ZAJ</strong> - zajęta</li>
                                                <li><strong>NP</strong> - nie przydzielać</li>
        									</ul>
        								</p>
        								<p>
        									<h6>Pojazd:</h6>
        									<ul>
        										<li><strong>WST</strong> - wstrzymany z ruchu</li>
        										<li><strong>PRZ</strong> - przegląd nieaktualny</li>
                                                <li><strong>TYP</strong> - nieodpowiedni typ pojazdu dla służby</li>
                                                <li><strong>(1)</strong> - zajęta I zmiana</li>
                                                <li><strong>(2)</strong> - zajęta II zmiana</li>
                                                <li><strong>ZAJ</strong> - zajęty</li>
                                                <li><strong>UPR</strong> - brak uprawnień do przydzielenia</li>
                                                <li><strong>NP</strong> - nie przydzielać</li>
        									</ul>
        								</p>
                                    </div>
                                </div>

							</div>
							<div class="col-8">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body">
        								<h5 class="mb-3">Uwagi od administratora:</h5>
                                        <div class="alert alert-warning col-md-12" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i> <strong>UWAGA OD ADMINISTRATORA:</strong>
                                            <br/><h6>Nie przydzielać służb nocnych!</h6>
                                        </div>
                                        <div class="alert alert-danger col-md-12" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i> <strong>UWAGA OD ADMINISTRATORA:</strong>
                                            <br/><h6>Stała godzina podmiany to: <b>13:30</b>! Dla wszystkich linii dziennych!</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body">
                                        <h5>Formularz dodawania</h5>
        								<form action="index.php?a=zarzadzanie-grafik&action=add-duty&user=&date=" method="POST">
        									<p>Typ służby</p>
        									<p>
        										<div class="form-check">
        											<input class="form-check-input" type="radio" name="rodzaj" id="zwykla">
        											<label class="form-check-label" for="zwykla">
        												Zwykła służba
        											</label>
        										</div>
        										<div class="form-check">
        											<input class="form-check-input" type="radio" disabled>
        											<label class="form-check-label" for="rezerwa">
        												Rezerwa
        											</label>
        										</div>
        									</p>
                                            <div class="form-group mt-4">
                                                <label class="form-label" for="role">Służba:</label>
                                                <select class="form-select" id="role" name="reason">
                                                    <option selected disabled >Wybierz służbę</option>
                                                    <option value="2">Wtorek</option>
                                                    <option value="3">Środa</option>
                                                    <option value="4">Czwartek</option>
                                                    <option value="5">Piątek</option>
                                                    <option value="6">Sobota</option>
                                                    <option value="7">Niedziela</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-label" for="role">Pojazd:</label>
                                                <select class="form-select select2" id="role" name="reason">
                                                    <option selected disabled >Wybierz pojazd</option>
                                                    <option value="2">Wtorek</option>
                                                    <option value="3">Środa</option>
                                                    <option value="4">Czwartek</option>
                                                    <option value="5">Piątek</option>
                                                    <option value="6">Sobota</option>
                                                    <option value="7">Niedziela</option>
                                                </select>
                                            </div>
        										<!-- <div class="form-group">
        											<select class="form-control" aria-label="Pojazd" id="pojazd" name="pojazd">
        												<option selected disabled>Pojazd</option>
        											</select>
        										</div> -->
        									<p>
        										<div class="form-group">
        											<label for="uwagi"><b>Uwagi</b></label>
        											<textarea class="form-control" name="uwagi" id="uwagi" rows="5" placeholder="Uwagi"></textarea>
        										</div>
        									</p>
        									<button type="submit" id="przycisk" class="btn btn-outline-success"><i class="fas fa-save"></i> Zapisz</button>
        								</form>
                                        <br>
                                        <br>
                                    </div>
                                </div>
							</div>
							<div class="col-4">

							</div>
							<div class="col-12">
                                <h5>Ostatnie 6 dni</h5>
								<br>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-4 bg-dark">
                                            <div class="card-body text-center">
                                                <h3 class="m-0 font-weight-bold text-center" id="1628028000">04.08.2021</h3>
                                                <h6 class="m-1 font-weight-bold text-center">ŚRODA</h6>
                                                <p class="mt-4">
                                                    <b>-</b><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                    <div class="card shadow mb-4 bg-dark">
                                        <div class="card-body text-center">
                                            <h3 class="m-0 font-weight-bold text-center" id="1628114400">05.08.2021</h3>
                                            <h6 class="m-1 font-weight-bold text-center">CZWARTEK</h6>
                                            <p class="mt-4">
                                                <b>-</b><br>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="card shadow mb-4 bg-dark">
                                        <div class="card-body text-center">
                                            <h3 class="m-0 font-weight-bold text-center" id="1628200800">06.08.2021</h3>
                                            <h6 class="m-1 font-weight-bold text-center">PIĄTEK</h6>
                                            <p class="mt-4">
                                                <b>Służba:</b> <span>1/1/1</span><br>
                                                <b>Typ służby:</b> <span>BRAK DANYCH</span><br>
                                                <b>Pojazd:</b> <span><a href="index.php?a=profile&amp;g=105">Tatra KT4DtM #1 + #2</a></span><br>
                                                <b>Dyspozytor:</b> <span>brak danych!</span><br>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="card shadow mb-4 bg-dark">
                                        <div class="card-body text-center">
                                            <h3 class="m-0 font-weight-bold text-center" id="1628287200">07.08.2021</h3>
                                            <h6 class="m-1 font-weight-bold text-center">SOBOTA</h6>
                                            <p class="mt-4">
                                                <b>Służba:</b> <span>1/1/1</span><br>
                                                <b>Typ służby:</b> <span>BRAK DANYCH</span><br>
                                                <b>Pojazd:</b> <span><a href="index.php?a=profile&amp;g=105">Tatra KT4DtM #1 + #2</a></span><br>
                                                <b>Dyspozytor:</b> <span>brak danych!</span><br>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="card shadow mb-4 bg-dark">
                                        <div class="card-body text-center">
                                            <h3 class="m-0 font-weight-bold text-center" id="1628373600">08.08.2021</h3>
                                            <h6 class="m-1 font-weight-bold text-center">NIEDZIELA</h6>
                                            <p class="mt-4">
                                                <b>Służba:</b> <span>1/1/1</span><br>
                                                <b>Typ służby:</b> <span>BRAK DANYCH</span><br>
                                                <b>Pojazd:</b> <span><a href="index.php?a=profile&amp;g=105">Tatra KT4DtM #1 + #2</a></span><br>
                                                <b>Dyspozytor:</b> <span>brak danych!</span><br>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="card shadow mb-4 bg-dark">
                                        <div class="card-body text-center">
                                            <h3 class="m-0 font-weight-bold text-center" id="1628460000">09.08.2021</h3>
                                            <h6 class="m-1 font-weight-bold text-center">PONIEDZIAŁEK</h6>
                                            <p class="mt-4">
                                                <b>-</b><br>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"><i class="fas fa-check"></i> Zainteresowany</button>

                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal"><i class="fas fa-times"></i> Zamknij</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
