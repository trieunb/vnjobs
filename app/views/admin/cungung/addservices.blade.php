@extends('layouts.admin')
@section('title')Cung ứng lao động @stop
@section('page-header')Chỉnh sửa dịch vụ @stop
@section('style')

 
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
		@include('includes.notifications')
		 
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'name',null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		 
		 
		 
		 

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">
				{{ Form::file('banner',array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>

			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{URL::to('cungunglaodong/assets/images/logo.png')}}" alt="banner" />

			</div>


			 
		</div>
		 
		 
		 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
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
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#thumbnail").change(function(){
        readURL(this);
    });
	</script>

@stop