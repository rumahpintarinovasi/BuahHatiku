@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Pengguna</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Pengguna</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- /Title -->

{{-- content --}}

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar User</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="user_view" class="table table-sm table-hover display text-nowrap">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Handphone</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
									<tbody>
										@foreach ($users as $user)
										<tr>	
											<td width="50">
												<div class="checkbox checkbox-primary">
													<input id="checkbox_{{ $loop->index + 1 }}" onchange="window.location.href='/user_toggle_status/{{$user->NoIdentitas}}';" @if($user->StatusAktif ==  1) checked @else '' @endif type="checkbox">
													<label for="checkbox_{{ $loop->index + 1 }}"></label>
												</div>
											</td>
											<td>{{ $user->Nama }}</td>
											<td>{{ $user->Email }}</td>
											<td>{{ $user->NoHP }}</td>
											<td>
												@if($user->Role == 1 )
													<span class="label label-primary ">Owner</span>
												@elseif($user->Role == 2 )
													<span class="label label-success ">Admin</span>
												@elseif($user->Role == 3 )
													<span class="label label-warning ">Terapis</span>
												@elseif($user->Role == 4 )
													<span class="label label-danger ">Staff</span>
												@endif
											</td>
											<td width="80">
												<button class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/user_edit/{{$user->NoIdentitas}}';"><i class="fa fa-pencil"></i></button>
												<button @if($user->has_relation()) disabled @endif data-toggle="modal" data-target="#responsive-modal{{$user->NoIdentitas}}" class="btn @if($user->has_relation()) btn-default @else btn-info @endif btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
										<div id="responsive-modal{{$user->NoIdentitas}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<form action="/user_delete/{{$user->NoIdentitas}}" method="POST">
												{{ csrf_field() }}
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title">Delete User</h5>
														</div>
														<div class="modal-body">
															Are you sure to delete {{$user->Nama}} ?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
															<button type="submit" class="btn btn-danger">Yes</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										@endforeach
									</tbody>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->

@endsection

@section('scripts')
    <!-- jQuery -->
	<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	
	<!-- Data table JavaScript -->
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	
	<!-- Init JavaScript -->
	<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection
