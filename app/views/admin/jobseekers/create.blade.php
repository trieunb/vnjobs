@extends('layouts.admin')
@section('title')Add new Jobseeker @stop
@section('content')
	<h3>Thêm mới người tìm việc: </h3>
	<hr>
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.jobseekers.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'ntv_email', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hoten', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngày sinh:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'ntv_ngaysinh', date('Y-m-d'), array('class'=>'form-control datepicker') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_gioitinh', array(1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ'), 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tình trạng hôn nhân:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_tinhtranghonnhan', array(1=>'Độc thân', 2=>'Đã lập gia đình'), 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_diachi', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh/Thành phố:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_tinhthanh', $provinces, 1, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Facebook ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_fbID', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Google Plus ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_googleID', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Linked ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_linkedinID', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('activated', array(1=>'Kích hoạt', 0=>'Không kích hoạt'), 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker3.css') }}
@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.vi.js') }}
	<script type="text/javascript">
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			language: "vi",
			autoclose: true,
			todayHighlight: true,
			endDate: new Date(),
		});
	</script>
@stop