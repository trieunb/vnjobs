		<?php $per=json_decode($user->permissions) ?>
		<div id="sidebar" class="sidebar responsive">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="{{ HTML::active(['admin.settings.*']) }}">
						<a href="{{ URL::route('admin.dashboard') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					@if(in_array('admin_full',$per))
					<li class="{{ HTML::active(['admin.users.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Quản trị viên </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin.users.index']) }}">
								<a href="{{ URL::route('admin.users.index') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin.users.create']) }}">
								<a href="{{ URL::route('admin.users.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Thêm mới
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					@endif
					 
					@if(in_array('ntv_full',$per))
					<li class="{{ HTML::active(['admin.jobseekers.*', 'admin.resumes.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Người tìm việc </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="{{ HTML::active(['admin.resumes.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Quản lý Hồ Sơ
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="{{ HTML::active(['admin.resumes.index']) }}">
										<a href="{{ URL::route('admin.resumes.index') }}">
											<i class="menu-icon fa fa-bar-chart purple"></i>
											Danh sách hồ sơ
										</a>

										<b class="arrow"></b>
									</li>

									

									<li class="{{ HTML::active(['admin.resumes.not-active']) }}">
										<a href="{{ URL::route('admin.resumes.not-active') }}">
											<i class="menu-icon fa fa-clock-o purple"></i>
											Hồ sơ chưa duyệt
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<li class="{{ HTML::active(['admin.jobseekers.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Chăm sóc NTV
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="{{ HTML::active(['admin.jobseekers.index']) }}">
										<a href="{{ URL::route('admin.jobseekers.index') }}">
											<i class="menu-icon fa fa-bar-chart purple"></i>
											Thống kê & Danh sách NTV
										</a>

										<b class="arrow"></b>
									</li>

									

									<li class="{{ HTML::active(['admin.jobseekers.not-login']) }}">
										<a href="{{ URL::route('admin.jobseekers.not-login') }}">
											<i class="menu-icon fa fa-clock-o purple"></i>
											Danh sách NTV chưa đăng ký
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					@endif
					 
					@if(in_array('ntd_full',$per))
					<li class="{{ HTML::active(['admin.employers.*', 'admin.jobs.*','admin.order.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Nhà tuyển dụng </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin.jobs.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Quản lý Tin tuyển dụng
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="{{ HTML::active(['admin.jobs.report']) }}">
										<a href="{{ URL::route('admin.jobs.report') }}">
											<i class="menu-icon fa fa-bar-chart purple"></i>
											Thống Kê
										</a>

										<b class="arrow"></b>
									</li>

									

									<li class="{{ HTML::active(['admin.jobs.waiting']) }}">
										<a href="{{ URL::route('admin.jobs.waiting') }}">
											<i class="menu-icon fa fa-clock-o purple"></i>
											Tin mới chưa duyệt
										</a>

										<b class="arrow"></b>
									</li>
									<li class="{{ HTML::active(['admin.jobs.vipwaiting']) }}">
										<a href="{{ URL::route('admin.jobs.vipwaiting') }}">
											<i class="menu-icon fa fa-check-square-o purple"></i>
											Quản lý tin vip
										</a>

										<b class="arrow"></b>
									</li>
									<li class="{{ HTML::active(['admin.jobs.index']) }}">
										<a href="{{ URL::route('admin.jobs.index') }}">
											<i class="menu-icon fa fa-plus purple"></i>
											Tất cả tin tuyển dụng
										</a>

										<b class="arrow"></b>
									</li>

									
									<!-- <li class="">
										<a href="{{ URL::route('admin.jobs.create') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Thêm tin tuyển dụng
										</a>

										<b class="arrow"></b>
									</li> -->
								</ul>
							</li>
							<li class="{{ HTML::active(['admin.employers.*','admin.order.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Quản lý nhà tuyển dụng
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							<ul class="submenu">
								<li class="{{ HTML::active(['admin.employers.report']) }}">
									<a href="{{ URL::route('admin.employers.report') }}">
										<i class="menu-icon fa fa-caret-right"></i>
										Thống kê và danh sách nhà tuyển dụng vip
									</a>
									<b class="arrow"></b>
								</li>

								<!-- <li class="">
									<a href="#">
										<i class="menu-icon fa fa-caret-right"></i>
										Tài khoản được chia
									</a>
									<b class="arrow"></b>
								</li> -->

								<li class="{{ HTML::active(['admin.employers.index']) }}">
									<a href="{{ URL::route('admin.employers.index') }}">
										<i class="menu-icon fa fa-caret-right"></i>
										Tổng số nhà tuyển dụng
									</a>
									<b class="arrow"></b>
								</li>
								<li class="{{ HTML::active(['admin.employers.create']) }}">
									<a href="{{ URL::route('admin.employers.create') }}">
										<i class="menu-icon fa fa-caret-right"></i>
										Thêm mới nhà tuyển dụng
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							</li>
							
						</ul>
					</li> <!-- end ntd -->
					@endif
					<!--start training-->
					@if(in_array('train_full',$per))
					 
					<li class="{{ HTML::active(['admin/training','admin/training/*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Đào tạo </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin/training']) }}">
								<a href="{{ URL::to('admin/training') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Thống kê chi tiết
								</a>
								<b class="arrow"></b>
							</li>


							<li class="{{ HTML::active(['admin/training/all-couser']) }}">
								<a href="{{ URL::to('admin/training/all-couser') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Khóa học
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/training/post']) }}">
								<a href="{{ URL::to('admin/training/post') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Tin tức 
								</a>
								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin/training/document']) }}">
								<a href="{{ URL::to('admin/training/document') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Tài liệu
								</a>
								<b class="arrow"></b>
							</li>


							<li class="{{ HTML::active(['admin/training/people/*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Giảng viên và học viên
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="{{ HTML::active(['admin/training/people/1']) }}">
										<a href="{{ URL::to('admin/training/people/1') }}">
											<i class="menu-icon fa fa-plus purple"></i>
											Giảng viên
										</a>

										<b class="arrow"></b>
									</li>

									<li class="{{ HTML::active(['admin/training/people/3']) }}">
										<a href="{{ URL::to('admin/training/people/3') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Học viên Cũ
										</a>

										<b class="arrow"></b>
									</li>

									<li class="{{ HTML::active(['admin/training/people/2']) }}">
										<a href="{{ URL::to('admin/training/people/2') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Học viên vừa đăng ký
										</a>

										<b class="arrow"></b>
									</li>

									<li class="{{ HTML::active(['admin/training/people/4']) }}">
										<a href="{{ URL::to('admin/training/people/4') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Học viên Tiêu biểu
										</a>

										<b class="arrow"></b>
									</li>


								</ul>
							</li>
						</ul>
					</li>
					@endif
					<!--end- traning-->
					@if(in_array('culd_full',$per))
					 
					<!--Cung ung lao dong-->
					<li class="{{ HTML::active(['admin/cungunglaodong','admin/cungunglaodong/*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Cung ứng lao động </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin/cungunglaodong']) }}">
								<a href="{{ URL::to('admin/cungunglaodong/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Tất cả dịch vụ
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/cungunglaodong/post-services']) }}">
								<a href="{{ URL::to('admin/cungunglaodong/post-services') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Bài đăng của các dịch vụ 
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/cungunglaodong/partner']) }}">
								<a href="{{ URL::to('admin/cungunglaodong/partner') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Quản lý đối tác 
								</a>
								<b class="arrow"></b>
							</li>

							 


							 
						</ul>
					</li><!--end- cungunglaodong-->
					@endif
					@if(in_array('admin_full',$per))
					 
					<!--Ngành nghề-->

					<li class="{{ HTML::active(['admin/category','admin/category/*']) }}">
						<a href="{{URL::to('admin/category')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Ngành nghề </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin/category/']) }}">
								<a href="{{ URL::to('admin/category/') }}">
									<i class="menu-icon fa fa-list-ol purple"></i>
									Danh sách
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/category/add']) }}">
								<a href="{{ URL::to('admin/category/add') }}">
									<i class="menu-icon fa fa-plus purple"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li><!--end- category-->

					<!--Địa điểm-->
					<li class="{{ HTML::active(['admin/province','admin/province/*']) }}">
						<a href="{{URL::to('admin/province')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-map-marker"></i>
							<span class="menu-text"> Địa điểm </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin/province/']) }}">
								<a href="{{ URL::to('admin/province/') }}">
									<i class="menu-icon fa fa-list-ol purple"></i>
									Danh sách
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/province/add']) }}">
								<a href="{{ URL::to('admin/province/add') }}">
									<i class="menu-icon fa fa-plus purple"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li><!--end- province-->
					@endif

					@if(in_array('news_full',$per))
					 
					<!--start training-->
					<li class="{{ HTML::active(['news.index*','news.index*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-newspaper-o"></i>
							<span class="menu-text"> Tin tức </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['news.index*']) }}">
								<a href="{{ URL::route('news.index') }}">
									<i class="menu-icon fa fa-bars"></i>
									Quản lý
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['news.add*']) }}">
								<a href="{{ URL::route('news.add') }}">
									<i class="menu-icon fa fa-plus-square"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<!--end- traning-->
					@endif
					@if(in_array('hiring_full',$per))
					 
					<!--start training-->
					<li class="{{ HTML::active(['admin.hiring.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-newspaper-o"></i>
							<span class="menu-text"> Cẩm nang việc làm </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin.hiring.index']) }}">
								<a href="{{ URL::route('admin.hiring.index') }}">
									<i class="menu-icon fa fa-bars"></i>
									Quản lý
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin.hiring.create']) }}">
								<a href="{{ URL::route('admin.hiring.create') }}">
									<i class="menu-icon fa fa-plus-square"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<!--end- traning-->

					@endif
					@if(in_array('admin_full',$per))
					 
					<li class="{{ HTML::active(['admin.product.*']) }}">
						<a href="{{ URL::route('admin.product.index') }}">
							<i class="menu-icon fa fa-newspaper-o"></i>
							<span class="menu-text"> Dịch vụ </span>
						</a>
					</li>
					@endif

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

