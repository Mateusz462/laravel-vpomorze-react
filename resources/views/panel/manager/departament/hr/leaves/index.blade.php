@extends('layouts.panel')

@section('title')
    Ustawienia Panelu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    ADMIN
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item">Menedżer firmy</li>
                    <li class="breadcrumb-item">Kadry</li>
                    <li class="breadcrumb-item active">Urlopy</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
		<div class="col-12">
            <h3 class="mb-4"><i class="fas fa-user-md me-2"></i><b>Urlopy</b></h3>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6>Today Presents</h6>
                            <h4>12 / 60</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6>Planned Leaves</h6>
                            <h4>8 <small class="text-muted">Today</small></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6>Unplanned Leaves</h6>
                            <h4>0 <small class="text-muted">Today</small></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6>Pending Requests</h6>
                            <h4>12</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row filter-row mb-4">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <select class="form-select " tabindex="-1" aria-hidden="true">
                        <option disabled selected> -- Leave Type -- </option>
                        <option>Casual Leave</option>
                        <option>Medical Leave</option>
                        <option>Loss of Pay</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
					<select class="form-select" tabindex="-1" aria-hidden="true">
						<option disabled selected> -- Leave Status -- </option>
						<option> Pending </option>
						<option> Approved </option>
						<option> Rejected </option>
					</select>
    		   </div>
			   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
					<div class="form-group mb-4">
						<input type="date" id="form1" class="form-control form-icon-trailing" />
					</div>
				</div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group">
                        <!-- <i class="fas fa-da-circle trailing"></i> -->
                        <!-- <i class="far fa-da-calendar trailing"></i> -->
                        <input type="date" id="form1" class="form-control form-icon-trailing" />
                        <!-- <label class="form-label" for="form1">To</label> -->
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                	<a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
        	</div>
            <div class="row">
                <div class="col-12">
                    @if(count($users) > 0)
                        <div class="table-responsive border">
                            <table class="table table-dark table-striped table-hover text-white mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Leave Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th class="text-center">No of Days</th>
                                        <th>Reason</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Akcje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ $row->getPicture() }}" class="rounded-circle" height="38" alt="" loading="lazy">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-0" style="color: {{$row->roles->first()->color}}">[{{$row->code}}] {{$row->login}}</p>
                                                        <p class="mb-0">{{$row->roles->first()->name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Casual Leave
                                            </td>
                                            <td>
                                                10 Jan 2019
                                            </td>
                                            <td>
                                                11 Jan 2019
                                            </td>
                                            <td class="text-center">
                                                <p class="fw-bold mb-1">
                                                    <span class="badge bg-danger">1231</span>
                                                </p>
                                            </td>
                                            <td>
                                                Going to Hospital
                                            </td>
                                            <td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-dark btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <?php if ($key % 2): ?>
                                                            <i class="far fa-dot-circle text-success me-2"></i>Approved
                                                        <?php elseif ($key == 4): ?>
                                                            <i class="far fa-dot-circle text-secondery me-2"></i>New
                                                        <?php elseif ($key % 3): ?>
                                                            <i class="far fa-dot-circle text-info me-2"></i>Pending
                                                        <?php else: ?>
                                                            <i class="far fa-dot-circle text-danger me-2"></i>Declined
                                                        <?php endif; ?>
													</a>
													<div class="dropdown-menu dropdown-menu-right" style="">
														<a class="dropdown-item" href="#"><i class="far fa-dot-circle text-secondery me-2"></i>New</a>
														<a class="dropdown-item" href="#"><i class="far fa-dot-circle text-info me-2"></i>Pending</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="far fa-dot-circle text-success me-2"></i>Approved</a>
														<a class="dropdown-item" href="#"><i class="far fa-dot-circle text-danger me-2"></i>Declined</a>
													</div>
												</div>
											</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                    @can('user_edit')
                                                    <a href="{{ route('users.user.edit', $row->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                </div>
            </div>
			<div class="card mb-4 d-none">
				<div class="card-body p-1">

				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
