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
							<table >
								<thead>
									<tr>
										<th>Waktu/Terapis</th>
										@foreach($senin->first() as $header)
											<th>{{ $header->Terapis }}</th>
										@endforeach
									</tr>
									<tbody>
										@foreach ($senin as $waktu => $group)
										<tr>
											<td>{{ $waktu }}</td>
											@foreach($group as $item)
												<td>{{ $item->Anak }}</td>
											@endforeach
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
