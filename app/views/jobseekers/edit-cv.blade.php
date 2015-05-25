@extends('layouts.jobseeker')
@section('content')

	<div class="container">
		<div class="col-sm-8">
			@include('includes.jobseekers.breadcrumb')
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				{{HTML::image('assets/images/ruibu.jpg', null, array('class'=>'avatar'))}}
				<strong><em>Hi, Anh Điệp</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				@include('includes.jobseekers.menu-ntv')
			</nav>
		</div>
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
				<div class="box">
					<div class="col-sm-3">
						<div class="avatar">
							{{ HTML::image('assets/images/ruibu.jpg') }}
						</div>
					</div>
					<div class="col-sm-9">
						<div class="profile">
							<h2>{{$user->first_name}} {{$user->last_name}}</h2>
							<p>Điện thoại: <span class="text-blue">{{$user->phone_number}}</span></p>
							<p>Email: <span class="text-blue">{{$user->email}}</span></p>
							<p>Hồ Sơ: <a href="#" class="text-blue" target="_blank">http://www.vnjobs.com/myjobs/tran.diep.4</a></p>
						</div>
					</div>
					<div class="clearfix"></div>
						<div class="complete-profile col-sm-8">
							<div class="col-sm-5">
								<div class="progress-radial progress-70">
			  						<div class="overlay">25%</div>
								</div>
								<span class="text-orange">Hồ sơ chưa hoàn tất</span>
							</div>
							<div class="col-sm-7 ">
								<a href="#"><i class="glyphicon glyphicon-search"></i>Cho phép tìm kiếm hồ sơ này</a>
							</div>
						</div>
						<div class="print-trash col-sm-4">
							<a href="#"><i class="glyphicon glyphicon-print"></i></a>	
							<a href="#"><i class="glyphicon glyphicon-trash"></i></a>	
							{{Form::button('Đăng Hồ Sơ', array('class'=>'btn btn-lg bg-orange'))}}
						</div>
				</div><!-- Box -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin cá nhân</h2> 
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
						{{Form::open(array('class'=>'form-horizontal', 'id'=>'saveBasicInfo'))}}
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="DOB">
					                    {{Form::input('text','date_of_birth', $user->date_of_birth, array('class'=>'date_of_birth form-control', 'placeholder'=>'YYYY-MM-DD','data-date-format'=>'YYYY-MM-DD'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
					                
								</div>
								<label for="" class="col-sm-3 control-label">Giới tính<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											{{Form::radio('gender',0, $user->gender, array('checked'=>'checked', 'class'=>'gender'))}}
											Nam
										</label>
										<label>
											{{Form::radio('gender',1, $user->gender, array('class'=>'gender'))}}
											Nữ
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											{{Form::radio('marital_status',0, $user->marital_status,array('checked'=>'checked', 'class'=>'marital_status'))}}
											Độc thân
										</label>
										<label>
											{{Form::radio('marital_status',1, $user->marital_status, array('class'=>'marital_status'))}}
											Đã kết hôn
										</label>
									</div>
								</div>
								<label for="" class="col-sm-3 control-label">Quốc tịch<abbr>*</abbr></label>
								<div class="col-sm-3">
									{{ Form::select('nationality_id', Country::lists('country_name', 'id'),$user->nationality_id, array('class'=>'nationality_id form-control', 'id' => 'Nationality') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Địa chỉ</label>
								<div class="col-sm-9">
									{{Form::input('text', 'address', $user->address, array('class'=>'address form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quốc gia</label>
								<div class="col-sm-3">
									{{ Form::select('country_id', Country::lists('country_name', 'id'),$user->country_id, array('class'=>'country_id form-control', 'id' => 'Country') ) }}
								</div>
								<label for="" class="col-sm-3 control-label">Tỉnh/Thành phố<abbr>*</abbr></label>
								<div class="col-sm-3">
										{{ Form::select('province_id', Province::lists('province_name', 'id'),$user->province_id, array('class'=>'province_id form-control', 'id' => 'Cities') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quận huyện</label>
								<div class="col-sm-3">
									{{ Form::select('district_id', Country::lists('country_name', 'id'),$user->district_id, array('class'=>'district_id form-control', 'id' => 'District') ) }}
								</div>
								<label for="" class="col-sm-3 control-label">Điện thoại
								<abbr>*</abbr></label>
								<div class="col-sm-3">
									{{Form::input('text', 'phone_number', $user->phone_number, array('class'=>'phone_number form-control'))}}
								</div>
							</div>
							<div class="form-group">
									<div class="checkbox col-sm-offset-2 col-sm-10">
										<label>
											{{Form::checkbox('hide_info_with_ntd', 1, $user->is_publish, array('class'=>'hide_info_with_ntd'))}}
											Ẩn thông tin này với nhà tuyển dụng
										</label>
									</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin chung</h2> 
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
					{{Form::open(array('class'=>'form-horizontal','id'=>'saveGeneralInfo'))}}
						<div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm<abbr>*</abbr></label>
			                <div class="col-sm-3">
			                	{{Form::input('text', 'info_years_of_exp', null, array('class'=>'info_years_of_exp form-control', 'maxlength'=>'2', 'placeholder'=>'Ví dụ 2', 'disabled' =>'disabled'))}} 
			                </div>
			                <div class="col-sm-6">
			                    <div class="checkbox">
			                    	<label>
			                    		{{Form::checkbox('info_years_of_exp', 0, null, array('class'=>'default_years_of_exp','checked'=>'checked'))}}
			                    		  Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
			                    	</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_highest_degree', Country::lists('country_name', 'id'),null, array('class'=>'info_highest_degree form-control', 'id' => 'HighestDegree') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	
			            	<div class="row fr-lang lang block">
				            	<label class="col-sm-3 control-label">Ngoại ngữ<abbr>*</abbr></label>
				            	<div class="col-sm-3 ">
				            		{{ Form::select('foreign_languages_1', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),null, array('class'=>'foreign_languages_1 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_1', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),null, array('class'=>'level_languages_1 form-control', 'id' => 'Level') ) }}
				            	</div>
			            	</div>
			            	<div class="row fr-lang lang hidden-xs">
				            	<label class="col-sm-3 control-label"></label>
				            	<div class="col-sm-3 ">
				            		{{ Form::select('foreign_languages_2', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),null, array('class'=>'foreign_languages_2 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_2', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),null, array('class'=>'level_languages_2 form-control', 'id' => 'Level') ) }}
				            	</div>
				            	<div class="col-sm-1">
		                            <div class="fa fa-remove text-red remove-fr-lang"></div>
		                        </div>
			            	</div>
			            	<div class="row fr-lang lang hidden-xs">
				            	<label class="col-sm-3 control-label"></label>
				            	<div class="col-sm-3 ">
				            		{{ Form::select('foreign_languages_3', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),null, array('class'=>'foreign_languages_3 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_3', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),null, array('class'=>'level_languages_3 form-control', 'id' => 'Level') ) }}
				            	</div>
				            	<div class="col-sm-1">
		                            <div class="fa fa-remove text-red remove-fr-lang"></div>
		                        </div>
			            	</div>

			            	<!--<label class="col-sm-3 control-label">Chứng chỉ liên quan<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('certificate', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'Certificate') ) }}
			            	</div>-->
			            	
			            	<div class="col-sm-offset-3 col-sm-7 add-language-button-wrapper">
			            		<a class="text-blue add-new-fr-lang"><i class="fa fa-plus-circle"></i> Thêm mới</a>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công ty gần đây nhất</label>
			            	<div class="col-sm-9">
			            		{{Form::input('text', 'info_latest_company', null, array('class'=>'info_latest_company form-control'))}}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công việc gần đây nhất</label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'info_latest_job', null, array('class'=>'info_latest_job form-control'))}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_current_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_current_level form-control', 'id' => 'CurrentLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Vị trí mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'info_wish_position', null, array('class'=>'info_wish_position form-control'))}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_wish_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_wish_level form-control', 'id' => 'WishLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
				            <label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				 
			            		{{Form::select('info_wish_place_work', Province::lists('province_name', 'id'), null, array('class'=>'info_wish_place_work form-control chosen-select', 'id' => 'WishPlaceWork', 'multiple'=>'true','data-placeholder'=>'VD: Hồ Chí Minh') )}}
				            		<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
			            		</div>
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::select('info_category', Category::lists('cat_name', 'id'), null, array('class'=>'info_category form-control chosen-select', 'id' => 'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'VD: Kế toán') )}}
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-4">
				                	<div for="specific-salary">
				                    	{{Form::radio('specific_salary_radio', 1, null, array('id'=>'specific-salary'))}}
				                        {{Form::input('number','specific_salary', null, array('class'=>'specific_salary form-control edit-control text-blue','id'=>'specific-salary-input', 'placeholder'=>'Ví dụ: 8.000.000', 'disabled'))}}
				                    	<span>VND / tháng</span>
				                    </div>
								</div>
				                <div class="radio col-sm-4">
				                    {{Form::radio('specific_salary_radio', 0, null, array('id'=>'specific-salary-0', 'checked'=>'checked'))}}
				                    <span>Thương lượng </span>
				                </div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>	
					{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
								<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Định hướng nghề nghiệp</h2>
					</div>
					<label><abbr>*</abbr> Giới Thiệu Bản Thân Và Miêu Tả Mục Tiêu Nghề Nghiệp Của Bạn</label>
					{{Form::open(array('id'=>'saveCareerGoal'))}}
						<div class="form-group">
							{{Form::textarea( 'introduct_yourself', $my_resume->dinhhuongnn, array('class'=>'form-control introduct_yourself', 'rows'=>'5'))}}
							<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
						</div>
							{{Form::open(array('class'=>'form-horizontal', 'id'=>'saveWorkExp'))}}
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Chức danh<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text','position', null, array('class'=>'position form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Công ty<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text', 'company_name', null, array('class'=>'company_name form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Từ tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="From_date">
					                    {{Form::input('text','from_date', null, array('class'=>'from_date form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="To_date">
					                    {{Form::input('text','to_date', null, array('class'=>'to_date form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<label>
											{{Form::checkbox('is-current-job', null)}}
											Công việc hiện tại
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
				            	<label class="col-sm-2 control-label">Lĩnh vực<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field',array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field form-control', 'id' => 'Fields') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('specialized', array(''=>'- Vui lòng chọn -')+Specialized::lists('name', 'id'),null, array('class'=>'specialized form-control', 'id' => 'Specialized') ) }}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Cấp bậc<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Level::lists('name', 'id'),null, array('class'=>'level form-control', 'id' => 'LatestLevel') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Mức lương</label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'salary', null, array('class'=>'salary form-control'))}}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mô tả</label>
				            	<div class="col-sm-10">
									{{Form::textarea( 'job_detail', null, array('class'=>'job_detail form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						{{Form::close()}}
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
						</div>
						{{Form::open(array('class'=>'form-horizontal','id'=>'saveEducation'))}}
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-9">
				            		{{Form::input('text', 'specialized', null, array('class'=>'specialized form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'school', null, array('class'=>'school form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('level', Education::lists('name', 'id'),null, array('class'=>'level form-control', 'id' => 'Diploma') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-4">
				            		<div class="input-group date" id="Study_from">
					                    {{Form::input('text','study_from', null, array('class'=>'study_from form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		<div class="input-group date" id="Study_to">
					                    {{Form::input('text','study_to', null, array('class'=>'study_to form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field_of_study', array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field_of_study form-control', 'id' => 'FieldOfStudy') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Điểm<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('average_grade_id', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),null, array('class'=>'average_grade_id form-control', 'id' => 'AverageGrade') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									{{Form::textarea( 'achievement', null, array('class'=>'achievement form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						{{Form::close()}}
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kỹ năng</h2>
							<a class="pull-right text-blue add-new-skill"><i class="fa fa-plus-circle"></i> Thêm mới</a>
						</div>
						<!-- Thêm kỹ năng cũ
						<label>Thêm kỹ năng nghề nghiệp đề nhận được những đề nghị công việc phù hợp hơn</label>
						
						<div class="box">
							<div id="tags-edit">
								<span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
							</div>

						</div>
						<div class="add-new-tag">
							<div class="row">
								<div class="col-sm-10">
									{{Form::input('text', 'study-from', null, array('class'=>'form-control input-sm', 'id'=>'key-skills', 'placeholder'=>'Hãy điền thông tin về lĩnh vực chuyên môn của bạn'))}}
								</div>
									{{Form::submit('Thêm', array('class'=>'btn btn-default col-sm-2 btn-sm'))}}
							</div>
							<div class="clearfix push-top-sm">
								<a class="text-blue pull-left what-is-this-skill-section clickable" data-toggle="popover"  data-content="<p>Ngay bây giờ bạn có thể làm giàu hồ sơ của mình bằng cách <strong>thêm các kỹ năng nghề nghiệp</strong>.</p> Kỹ năng sẽ giúp chúng tôi rất nhiều trong việc <strong>đề xuất việc làm phù hợp nhất với bạn</strong> (dựa vào giải thuật về <strong>Điểm số phù hợp</strong> sẽ được cập nhật trong thời gian tới).">Thêm kỹ năng là gì?</a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>-->
						<div class="col-sm-8"><h3 class="text-gray-light">Kỹ năng</h3></div>
						<div class="col-sm-4"><h3 class="text-gray-light">Mức độ thành thạo</h3></div>
						<div class="box">
							{{Form::open(array('class'=>'form-horizontal','id'=>'saveSkills'))}}
								<?php $skills = json_decode($my_resume->kynang);?>
								@if(count($skills) > 0)
									@for ($i=0; $i < count($skills) ; $i++)
										<div class='form-group'>
										<div class='col-sm-8'>
											{{Form::input('text', 'skill-'.$i.'', $skills[$i][0], array('class'=>'skill form-control'))}}
										</div>
										<div class='col-sm-4'>
											{{Form::select('level_skill-'.$i.'', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'), $skills[$i][1], array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
										</div>
										</div>
									@endfor
								@else
								<div class="form-group">
									<div class="col-sm-8">
										{{Form::input('text', 'skill-1', null, array('class'=>'skill form-control'))}}
									</div>
									<div class="col-sm-4">
										{{Form::select('level_skill-1', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'),null, array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
									</div>
								</div>
								@endif
								<div class="form-submit">
									<div class="col-sm-offset-3 col-sm-7">
										{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
										{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									</div>
								</div>
							{{Form::close()}}
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
	</section>
	<aside id="sidebar" class="col-sm-3 pull-right">
				<div class="col-sm-12 card-item alert-warning">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-orange"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-orange"></i>
	                    	<i class="fa fa-user fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Hồ Sơ/Mục Tiêu Nghề Nghiệp</h4>
	                </div>
	                <div class="col-sm-2 box-label warning"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-info">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-blue"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-blue"></i>
	                    	<i class="fa fa-bank fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Kinh Nghiệm Làm Việc</h4>
	                </div>
	                <div class="col-sm-2 box-label primary"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-success">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-green"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-green"></i>
	                    	<i class="fa fa-graduation-cap fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Học Vấn Và Bằng Cấp</h4>
	                </div>
	                <div class="col-sm-2 box-label success"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-danger">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-red"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-red"></i>
	                    	<i class="fa fa-info fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Thông Tin Tham Khảo</h4>
	                </div>
	                <div class="col-sm-2 box-label danger"><strong>10%</strong></div>
	            </div> 
				<div class="widget row">
					<h3>Cẩm nang nghề nghiệp</h3>
					<ul>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
					</ul>
				</div>
		</aside>
	</section>

@stop

@section('scripts')
	
	<script type="text/javascript">
	$('#saveBasicInfo').submit(function(e){
        e.preventDefault();
        $('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("basic", $id_cv )) }}';
        $.ajax({
            type: "POST",
            url: url,//Relative or absolute path to response.php file
          	dataType: 'json',
            data: {
            	date_of_birth: $('.date_of_birth').val(),
		        gender:$('.gender').val(),
		        marital_status: $('.marital_status').val(),
		        nationality_id: $('.nationality_id').val(),
		        address: $('.address').val(),
		        country_id: $('.country_id').val(),
		        province_id: $('.province_id').val(),
		        district_id: $('.district_id').val(),
		        phone_number: $('.phone_number').val(),
		        hide_info_with_ntd: $('.hide_info_with_ntd').val()
            },
            success : function(json){
            	if(! json.has)
            	{	$('#saveBasicInfo').find(".has-error").removeClass('has-error');
	            	$('#saveBasicInfo').find(".error-message").remove();
            		var j = $.parseJSON(json.message);
            		$.each(j, function(index, val) {
            			
	            			$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
	            			if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
	            				$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
	            			}
	            			$('.loading-icon').hide();      		
            		});
            	}else{
            		$('#saveBasicInfo').find(".has-error").removeClass('has-error');
            		$('#saveBasicInfo').find(".error-message").remove();
            	}
            	$('.loading-icon').hide();
            }
        });    
    });

	$('#saveCareerGoal').submit(function(e){
        e.preventDefault();
        $('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("career-goal", $id_cv )) }}';
        $.ajax({
            type: "POST",
            url: url,//Relative or absolute path to response.php file
          	dataType: 'json',
            data: { introduct_yourself: $('.introduct_yourself').val()},
            success : function(json){
            	if(! json.has)
            	{	$('#saveCareerGoal').find(".has-error").removeClass('has-error');
	            	$('#saveCareerGoal').find(".error-message").remove();
            		var j = $.parseJSON(json.message);
            		$.each(j, function(index, val) {
	            			$('.'+index).parent().closest('div').addClass('has-error');
	            			if($('.'+index).parent().closest('div').find(".error-message").length < 1){
	            				$('.'+index).parent().closest('div').append('<span class="error-message">'+val+'</span>')
	            			}
	            			$('.loading-icon').hide();           		
            		});
            	}else{
            		$('#saveCareerGoal').find(".has-error").removeClass('has-error');
            		$('#saveCareerGoal').find(".error-message").remove();
					$('.loading-icon').hide();
            	}
            	$('.loading-icon').hide();
            }
        });    
    });
	$('#saveWorkExp').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("work-exp", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				position: $('.position').val(),
				company_name: $('.company_name').val(),
				from_date: $('.from_date').val(),
				to_date: $('.to_date').val(),
				job_detail: $('.job_detail').val(),
				field: $('.field').val(),
				specialized: $('.specialized').val(),
				level: $('.level').val(),
				salary: $('.salary').val()
			},
			success : function(json) {
				if(! json.has)
	            {	
	            	$('#saveWorkExp').find(".has-error").removeClass('has-error');
		            $('#saveWorkExp').find(".error-message").remove();
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
		            	$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
		            	if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
		           			$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
		            	}
		           		$('.loading-icon').hide();           		
	           		});
	            }else{
	           		$('#saveWorkExp').find(".has-error").removeClass('has-error');
	           		$('#saveWorkExp').find(".error-message").remove();
					$('.loading-icon').hide();
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});

	$('#saveEducation').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("education-history", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				school: $('#saveEducation .school').val(),
				field_of_study: $('#saveEducation .field_of_study').val(),
				level: $('#saveEducation .level').val(),
				study_from: $('#saveEducation .study_from').val(),
				study_to: $('#saveEducation .study_to').val(),
				achievement: $('#saveEducation .achievement').val(),
				specialized: $('#saveEducation .specialized').val(),
				average_grade_id: $('#saveEducation .average_grade_id').val()
			},
			success : function(json) {
				if(! json.has)
	            {	
	            	$('#saveEducation').find(".has-error").removeClass('has-error');
		            $('#saveEducation').find(".error-message").remove();
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
		            	$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
		            	if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
		           			$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
		            	}
		           		$('.loading-icon').hide();           		
	           		});
	            }else{
	           		$('#saveEducation').find(".has-error").removeClass('has-error');
	           		$('#saveEducation').find(".error-message").remove();
					$('.loading-icon').hide();
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});
	
	$('#saveSkills').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("skills", $id_cv )) }}';
      	var arr = [];
        $('#saveSkills .form-group').each(function() {
        	var skill =  $(this).find('.skill').val();
        	var level_skill =  $(this).find('.level_skill').val();
        		var row = [];
	        	row.push(skill);
			    row.push(level_skill);
			    arr.push(row);
        });

 		$.ajax({
 			url: url,
 			type: 'POST',
 			data: {skills: arr},
 			success : function(data){
 				$('.loading-icon').hide();
 			}
 		})
	});
	
	$('#saveGeneralInfo').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
		var a = $('.select2-selection__choice').html();

        url = '{{ URL::route("jobseekers.save-cv", array("general", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				info_years_of_exp: 		$('#saveGeneralInfo .info_years_of_exp').val(),
				info_highest_degree: 	$('#saveGeneralInfo .info_highest_degree').val(),
				info_current_level: 	$('#saveGeneralInfo .info_current_level').val(),
				info_wish_position: 	$('#saveGeneralInfo .info_wish_position').val(),
				info_wish_level: 		$('#saveGeneralInfo .info_wish_level').val(),
				info_wish_place: 		$('#saveGeneralInfo .info_wish_place').val(),
				specific_salary: 		$('#saveGeneralInfo .specific_salary').val(),
				info_latest_company: 	$('#saveGeneralInfo .info_latest_company').val(),
				info_latest_job: 		$('#saveGeneralInfo .info_latest_job').val(),
				info_category: 			$('#saveGeneralInfo .info_category').val(),
				info_wish_place_work: 	$('#saveGeneralInfo .info_wish_place_work').val(),
				foreign_languages_1: 	$('#saveGeneralInfo .foreign_languages_1').val(),
				foreign_languages_2: 	$('#saveGeneralInfo .foreign_languages_2').val(),
				foreign_languages_3: 	$('#saveGeneralInfo .foreign_languages_3').val(),
				level_languages_1: 		$('#saveGeneralInfo .level_languages_1').val(),
				level_languages_2: 		$('#saveGeneralInfo .level_languages_2').val(),
				level_languages_3: 		$('#saveGeneralInfo .level_languages_3').val(),

			},
			success : function(json) {
				if(! json.has)
	            {	
	            	$('#saveGeneralInfo').find(".has-error").removeClass('has-error');
		            $('#saveGeneralInfo').find(".error-message").remove();
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
		            	$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
		            	if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
		           			$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
		            	}
		           		$('.loading-icon').hide();           		
	           		});
	            }else{
	           		$('#saveGeneralInfo').find(".has-error").removeClass('has-error');
	           		$('#saveGeneralInfo').find(".error-message").remove();
					$('.loading-icon').hide();
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});

	</script>
@stop
