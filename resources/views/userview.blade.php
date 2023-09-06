@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">analytical</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>dashboard</span></a></li>
			<li class="active"><span>analytical</span></li>
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
							<table id="datable_1" class="table table-sm table-hover display text-nowrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Username</th>
										<th>Email</th>
										<th>Handphone</th>
										<th>Role</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<tbody>
										@foreach ($users as $user)
										<tr>	
											<td width="50">{{ $loop->index + 1 }}</td>
											<td>{{ $user->Nama }}</td>
											<td>{{ $user->Email }}</td>
											<td>{{ $user->NoHP }}</td>
											<td>
												@if($user->Role == 1 )
													Owner
												@elseif($user->Role == 2 )
													Admin
												@elseif($user->Role == 3 )
													Terapis
												@endif
											</td>
											<td><input type="checkbox" @if($user->StatusAktif ==  1) checked @else '' @endif class="js-switch" data-color="#FAAB15" data-size="small"></td>
											<td width="80">
												<button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
												<button class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
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