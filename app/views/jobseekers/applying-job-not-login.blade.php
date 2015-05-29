@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container sm">
		<div class="boxed">
			<div class="rows">
			<div class="title-page">
				<h2>Công việc ứng tuyển</h2>
			</div>
			<div class="box">
				<div class="tag">Apply Job</div>
				{{ Form::open( array('route'=>array('jobseekers.applying-job', $job->id), 'class'=>'form form-horizontal', 'method'=>'POST', 'files'=>true) ) }}
					<div class="form-group">
						<label class="control-label col-sm-2">Fullname</label>
						<div class="col-sm-2">
							{{Form::select('prefix_title',array('Ông'=>'Ông', 'Bà' => 'Bà'),null, array('class'=>'form-control', 'id'=>'Gender'))}}
						</div>
						<div class="col-sm-3">
							{{Form::input('text','first_name', null, array('class'=>'form-control', 'placeholder'=>'First Name'))}}
						</div>
						<div class="col-sm-3">
							{{Form::input('text','last_name', null, array('class'=>'form-control', 'placeholder'=>'Last Name'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Headline</label>
						<div class="col-sm-5">
							{{Form::input('text','headline', null, array('class'=>'form-control'))}}
							<span class="error-message">{{$errors->first('headline')}}</span>
							<small class="legend">Senior manager at a multinational corporation</small>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email</label>
						<div class="col-sm-5">
							{{Form::input('text','email', null, array('class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Contact phone</label>
						<div class="col-sm-5">
							{{Form::input('text','contact_phone', null, array('class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Live in</label>
						<div class="col-sm-3">
							{{Form::input('text','address', null, array('class'=>'form-control'))}}
						</div>
						<div class="col-sm-2">
							{{Form::select('province_id',Province::lists('province_name'),null, array('class'=>'form-control', 'id'=>'Cities'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Cover letter</label>
						<div class="col-sm-5">
							{{Form::textarea('cover_letter', null, array('class'=>'form-control headline', 'rows'=> '5'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Chọn CV</label>
						<div class="col-sm-10">
							<div class="fileUpload btn bg-orange col-sm-2">
								Chọn tệp tin
								{{ Form::file('cv_upload',array('class'=>'upload', 'id' =>'uploadBtn')) }}
							</div>
							<div class="col-sm-7">
								{{Form::input('text', 'file_name', null, array('class'=>'form-control', 'id'=>'uploadFile', 'disable', 'placeholder'=>'không có tệp nào được chọn'))}}
							</div>
							<div class="clearfix"></div>
							<span class="small">Formats: MS Word, PDF, Image, Rar, Zip (2MB maximum)</span>
							<span class="error-message">{{$errors->first('file_name')}}</span>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10">
						{{Form::button('Hủy bỏ', array('class'=>'btn btn-lg bg-dark'))}}
						{{Form::submit('Nộp đơn', array('class'=>'btn btn-lg bg-dark'))}}
					</div>
					{{Form::input('hidden','is_file', 'is_file',array('class'=>'is_file'))}}
				{{Form::close()}}
			</div>
			</div>
		</div>
	</section>
@stop