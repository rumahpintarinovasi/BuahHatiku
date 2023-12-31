<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					@if(Auth::user()->Role == 1 || Auth::user()->Role == 2)
					<li>
						<a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i class="icon-home mr-10"></i>Dashboard</a>
					</li>
					<li>
						<a class="{{ Request::is('biodata_insert', 'questionnaire_insert', 'tipe_absensi_insert', 'jadwal_rolling') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#master"><i class="fa fa-database mr-10"></i>Master Data <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="/biodata_insert">Buat Biodata Anak</a>
							</li>
							<li>
								<a href="/questionnaire_insert">Buat Questionnaire</a>
							</li>
							<li>
								<a href="/tipe_absensi_insert">Buat Tipe Absensi</a>
							</li>
							<li>
								<a href="/jadwal_rolling">Buat Jadwal Rolling</a>
							</li>
						</ul>
					</li>
					@endif
					@if(Auth::user()->Role != 4)
					<li>
						@php( $biodata_count = App\Models\Biodata::count() )
						<a class="{{ Request::is('biodata_view') ? 'active' : '' }}" href="/biodata_view"><i class="icon-folder mr-10"></i>Biodata<span class="pull-right"><span class="label label-success mr-10">{{$biodata_count > 99 ? '99+' : $biodata_count}}</span></span></a>
					</li>
					@endif
					<li>
						<a class="{{ Request::is('jadwal_rolling_view') ? 'active' : '' }}" href="/jadwal_rolling_view"><i class="icon-calender mr-10"></i>Jadwal Terapis</a>
					</li>
					@if(Auth::user()->Role != 4)
						<li>
							<a class="{{ Request::is('parental_questionnaire') ? 'active' : '' }}" href="/parental_questionnaire"><i class="icon-question mr-10"></i>Questionnaire</a>
						</li>
						@if(Auth::user()->Role == 3)
						<li>
							<a class="{{ Request::is('daftar_absensi_terapis') ? 'active' : '' }}" href="/daftar_absensi_terapis"><i class="icon-notebook mr-10"></i>Absensi</a>
						</li>
						@else
						<li>
							<a class="{{ Request::is('daftar_absensi') ? 'active' : '' }}" href="/daftar_absensi"><i class="icon-notebook mr-10"></i>Absensi</a>
						</li>
						@endif
						<li>
							<a class="{{ Request::is('kehadiran') ? 'active' : '' }}" href="/kehadiran"><i class="icon-list mr-10"></i>Kehadiran</a>
						</li>
						@if(Auth::user()->Role == 1 || Auth::user()->Role == 2)
						<li>
							<a  class="{{ Request::is('input_invoice', 'invoice_archive') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#invoice"><i class=" icon-folder-alt mr-10"></i>Faktur<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
							<ul id="invoice" class="collapse collapse-level-1">
								<li>
									<a href="/input_invoice">Buat Faktur</a>
								</li>
								<li>
									<a href="/invoice_archive">Daftar Faktur</a>
								</li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->Role == 1 || Auth::user()->Role == 2)
						<li>
						<a class="{{ Request::is('uang_makan') ? 'active' : '' }}" href="/uang_makan"><i class="fa fa-money mr-10"></i>Uang Makan</a>
						</li>
						@endif
						@if(Auth::user()->Role == 1)
						<li>
							<a class="{{ Request::is('user_form', 'user_view') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#User"><i class="icon-user mr-10"></i>Pengguna<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
							<ul id="User" class="collapse collapse-level-1">
								<li>
									<a href="/user_form">Buat Pengguna</a>
								</li>
								<li>
									<a href="/user_view">Lihat Pengguna</a>
								</li>
							</ul>
						</li>
						@endif
					@endif
				</ul>
			</div>
			<!-- /Left Sidebar Menu -->
