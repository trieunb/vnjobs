@extends('layouts.employer')
@section('title')Xem thông tin hồ sơ {{ $resume->tieude_cv }} @stop
@section('content')
 	<section class="boxed-content-wrapper clearfix resume-info">
		<div class="container">
			
			<section id="" class="right">
				<div class="box box-resume-info">
					<div class="row box-header">
						<div class="col-xs-12 info-action">
							<div class="pull-right">
								<ul >
									<li><a href="#modalSaveFolder" data-toggle="modal" data-target="#modalSaveFolder">{{ HTML::image('assets/ntd/images/icon-save-cv.png') }} Lưu thư mục</a></li>
									<!-- <li><a href="{{ URL::to($locale.'/employers/search/basic?' . implode('&', ['keyword=', 'category=all', 'level='.($resume->capbachientai>0?$resume->capbachientai:'all'), 'location=all'])) }}" target="_blank">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li> -->
									<li><a href="{{ URL::to($locale.'/nha-tuyen-dung/tim-kiem/co-ban?keyword='.$history['keyword'].'&category=all&level='.$resume->capbachientai.'&location=all') }}" target="_blank">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li> 
									<li><a href="#modalSend" data-toggle="modal" data-target="#modalSend">{{ HTML::image('assets/ntd/images/icon-send-cv.png') }} Gửi hồ sơ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row resume-content">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-5">
									<h4 class="resume-title">Chức danh/vị trí: <span class="cl-orange">{{ $resume->heading }}</span></h4>
									<div class="clearfix"></div>
									<div class="col-xs-4">
										{{ HTML::image('assets/ntd/images/no-avatar.jpg') }}
									</div>
									<div class="col-xs-8">
										<div class="row td-info">
											<div class="col-xs-5">
												Ứng viên
											</div>
											<div class="col-xs-7">
												{{ $resume->application->first()->first_name }} {{ $resume->application->first()->last_name }}
											</div>
										</div>
										<div class="row td-info">
											<div class="col-xs-5">
												Tỉnh/Thành phố
											</div>
											<div class="col-xs-7">
												@if($resume->application->first()->province_id > 0)
												{{ $resume->application->first()->province->province_name }}
												@endif
											</div>
										</div>
										<div class="row td-info">
											<div class="col-xs-5">
												Quốc tịch
											</div>
											<div class="col-xs-7">
												Việt Nam
											</div>
										</div>
										
									</div>
								</div><!-- end .info left -->
								<div class="col-xs-7">
									<div class="buy-service">
										<div class="row buy-header">
											<?php $ngayhomnay=strtotime(date('Y-m-d H:i:s')) ?>
											@if(strtotime($check_order['ended_date']) > $ngayhomnay)

												<div class="col-xs-9">
													Gói dịch vụ xem hồ sơ của quí khách còn <span style="color:red"> {{ round((strtotime($check_order['ended_date']) - $ngayhomnay)/(24*3600))}} </span>ngày.
													Số lượng hồ sơ ứng viên có thể xem được là : <span id="cv_xem" style="color:red">{{$check_order['remain']}}</span> hồ sơ.
												</div>
												<div class="col-xs-3 pull-right">
													<!-- <a href="{{ URL::route('employers.orders.add') }}" class="btn btn-nomal bg-orange pull-right">Mua dịch vụ</a> -->
													<a class="btn btn-nomal bg-orange pull-right" id="show_info" href="#view_cv">Xem</a>
												</div>
											@else
											<div class="col-xs-9">
												Để xem hồ sơ hoàn chỉnh của ứng viên, quý khách vui lòng sử dụng dịch vụ "tìm hồ sơ"
											</div>
											<div class="col-xs-3 pull-right">
												<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-nomal bg-orange pull-right">Mua dịch vụ</a>
											</div>
											@endif
										</div>
										<div class="row buy-information">
											<div class="col-xs-6">
												<h5 class="information-title">
													Miền Nam: 
												</h5>
												<div class="row">
													<div class="col-xs-4">Địa chỉ:</div>
													<div class="col-xs-8">Số 36-38A Trần Văn Dư, Quận Tân Bình, Thành phố Hồ Chí Minh</div>
													<div class="col-xs-4">Điện thoại:</div>
													<div class="col-xs-8">+84-8-7300-7979</div>
													<div class="col-xs-4">Fax:</div>
													<div class="col-xs-8">+84-8-6293-6896</div>
												</div>
												
											</div>
											<div class="col-xs-6">
												<h5 class="information-title">
													Miền Bắc: 
												</h5>
												<div class="row">
													<div class="col-xs-4">Địa chỉ:</div>
													<div class="col-xs-8">Tầng 10, tòa nhà SUDICO, Đường Mễ Trì, Phường Mỹ Đình 1, Quận Nam Từ Liêm, Hà Nội </div>
													<div class="col-xs-4">Điện thoại:</div>
													<div class="col-xs-8">+84-4-3577-1608</div>
													<div class="col-xs-4">Fax:</div>
													<div class="col-xs-8">+84-4-3787-8212</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- end .package right -->
							</div> <!-- end .row top -->
						</div>
					</div> <!-- end .row info -->
					<div class="row resume-content">
						<div class="heading-title">
							<span>Nội dung hồ sơ</span>
						</div>
						<div class="col-xs-12">
							@if(strtotime($check_order['ended_date']) > $ngayhomnay && $check_order['remain']>0)
								<div id="no-cv-phu">
								@if($pdf)
								<iframe  frameborder="0" scrolling="no" src="{{ URL::route('employers.search.resume_viewer') }}?file={{ URL::to('/').'/uploads/jobseekers/cv/'.$resume->file_name }}" height="800" width="100%"></iframe>
								<!-- <a href="#" id="view" class="btn btn-nomal bg-orange pull-right">Xem hồ sơ</a>
								Lưu ý: Gói hồ sơ của quý khách sẽ giảm đi 1 tương ứng với mỗi lần xem hồ sơ chi tiết ứng viên -->
								@else
								Quí khách vui lòng tải về máy để xem.
								<a href="{{ URL::route('employers.search.print_cv',array($resume->id,'tai-chinh')) }}" class="btn btn-lg bg-orange">Tải CV</a>
								
								@endif
								</div>
								<div id="view_cv">
									<!-- @if($pdf)
									<iframe  frameborder="0" scrolling="no" src="{{ URL::route('employers.search.resume_viewer') }}?file={{ URL::to('/').'/uploads/jobseekers/cv/'.$resume->second_file_name }}&type=phu" height="800" width="100%"></iframe>
									@else 
									<div style="margin: 10px 0px 0px 0px">
									Lưu ý: Gói hồ sơ của quý khách sẽ giảm đi 1 tương ứng với mỗi lần tải hồ sơ chi tiết ứng viên
									<a href="{{ URL::route('employers.search.print_cv',array($resume->id,'tai-chinh')) }}" class="btn btn-lg bg-orange">Tải CV Chính</a>
									</div>
									@endif -->
								</div>

								
							@else 
							<div id="no-cv-phu">
								@if($pdf)
								<iframe  frameborder="0" scrolling="no" src="{{ URL::route('employers.search.resume_viewer') }}?file={{ URL::to('/').'/uploads/jobseekers/cv/'.$resume->file_name }}" height="800" width="100%"></iframe>
								<!-- <a href="#" id="view" class="btn btn-nomal bg-orange pull-right">Xem hồ sơ</a>
								Lưu ý: Gói hồ sơ của quý khách sẽ giảm đi 1 tương ứng với mỗi lần xem hồ sơ chi tiết ứng viên -->
								@else
								Quí khách vui lòng tải về máy để xem.
								<a href="{{ URL::route('employers.search.print_cv',array($resume->id,'tai-chinh')) }}" class="btn btn-lg bg-orange">Tải CV</a>
								
								@endif
								</div>
								<!-- <div class="row buy-header">
											<div class="col-xs-9">
												Để xem hồ sơ hoàn chỉnh của ứng viên, quý khách vui lòng sử dụng dịch vụ "tìm hồ sơ"
											</div>
											<div class="col-xs-3 pull-right">
												<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-nomal bg-orange pull-right">Mua dịch vụ</a>
											</div>
								</div> -->
							@endif
						</div>
					</div>
					<div class="row box-footer">
						<div class="col-xs-12 info-action">
							<div class="pull-right">
								<ul style="background:white; padding:10px;border-radius:10px">
									<li><a href="#modalSaveFolder" data-toggle="modal" data-target="#modalSaveFolder">{{ HTML::image('assets/ntd/images/icon-save-cv.png') }} Lưu thư mục</a></li>
								<!-- 	<li><a href="{{ URL::to($locale.'/employers/search/basic?' . implode('&', ['keyword=', 'category=all', 'level='.($resume->capbachientai>0?$resume->capbachientai:'all'), 'location=all'])) }}" target="_blank">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li> -->
								<li><a href="{{ URL::to($locale.'/nha-tuyen-dung/tim-kiem/co-ban?keyword='.$history['keyword'].'&category=all&level='.$resume->capbachientai.'&location=all') }}" target="_blank">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li> 
									<li><a href="#modalSend" data-toggle="modal" data-target="#modalSend">{{ HTML::image('assets/ntd/images/icon-send-cv.png') }} Gửi hồ sơ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>

	
</div>
<div class="modal fade" id="modalSaveFolder">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">THÊM HỒ SƠ VÀO THƯ MỤC</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form" name="form1" onsubmit="saveFolder();return false;">
					<div id="result"></div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputAdd" value="1" checked="checked">
									Thêm vào thư mục
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							{{ Form::select('cv_folder', EFolder::where('ntd_id', Auth::id())->orderBy('id', 'desc')->lists('folder_name', 'id'), null, ['id'=>'cv_folder'] ) }}
							
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputCreate" value="2">
									Tạo thư mục mới
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							<input type="text" name="folder_name" required="required" id="inputFolder_name" disabled="disabled" class="form-control">
						</div>
					</div>
				
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" id="save-cv" class="btn btn-lg bg-orange">Lưu</button>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<div class="modal fade" id="modalSend">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Gửi hồ sơ</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form" name="" onsubmit="sendResume();return false;">
					<div id="result_send"></div>
					
					<h4>Thông tin yêu cầu</h4>
					<p>Bạn có thể sử dụng mẫu bên dưới để gửi hồ sơ đến người quen</p>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Email của người bạn:</label>
						<div class="col-sm-10">
							{{ Form::email('email', null, ['required', 'id'=>'send_email']) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Tiêu đề:</label>
						<div class="col-sm-10">
							{{ Form::text('subject', null, ['required', 'id'=>'send_subject']) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Nội dung:</label>
						<div class="col-sm-10">
							{{ Form::textarea('content', null, ['rows'=>5, 'id'=>'send_content']) }}
						</div>
					</div>
				
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" id="btn-send" class="btn btn-lg bg-orange">Gửi cho bạn bè</button>
								<button type="button" class="btn btn-lg bg-orange" data-dismiss="modal">Close</button>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

@stop
@section('script')
	<script type="text/javascript">
	$('#view').click(function(event) { 

		 
		var cv= $('#cv_xem').text();
		 $('#cv_xem').text(cv-1);
		 $('#view_cv').empty();
		 $('#no-cv-phu').empty();
		$('#view_cv').append('<iframe style="" id="cv"  frameborder="0" scrolling="no" src="{{ URL::route("employers.search.resume_viewer") }}?file={{ URL::to("/")."/uploads/jobseekers/cv/".$resume->file_name }}" height="800" width="100%"></iframe>');
					
		/*else

		$('#view_cv').append('<a href="{{ URL::route('employers.search.print_cv', $resume->id) }}" class="btn btn-lg bg-orange">Tải CV</a>');
	*/
	});	


	
	$('#inputAdd').click(function(event) { 
		$('#inputFolder_name').prop({
			disabled: 'disabled'
		});
		$('#cv_folder').removeAttr('disabled');	
	});
	$('#inputCreate').click(function(event) {
		$('#cv_folder').attr('disabled', 'disabled');
		$('#inputFolder_name').removeProp('disabled');
	});
	var saveFolder = function()
	{
		var where_cv = ($('#inputCreate').is(':checked'))?1:0;
		var cv_id = {{ $resume->id }};
		if(where_cv == 0)
		{
			var action = 'saveToFolder';
			var param = $('#cv_folder').val();
		} else {
			var action = 'createFolder';
			var param = $('#inputFolder_name').val();
		}
		$.ajax({
			url: '{{ URL::route('employers.search.ajax') }}',
			data: {action: action, param: param, cvid: cv_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result').html('<div class="alert alert-success">Hoàn thành.</div>');
				} else {
					$('#result').html('<div class="alert alert-danger">Có lỗi khi thực hiện.</div>');
				}
				setTimeout(function(){ $('#result').html(''); }, 1500);
				setTimeout(function(){ $('#modalSaveFolder').modal('hide');  }, 1500);
			}
		})
	}
	var sendResume = function()
	{
		var send_email = $('#send_email').val();
		var send_subject = $('#send_subject').val();
		var send_content = $('#send_content').val();
		$('#send_email').attr('disabled', 'disabled');
		$('#send_subject').attr('disabled', 'disabled');
		$('#send_content').attr('disabled', 'disabled');
		$('#btn-send').attr('disabled', 'disabled');
		var cv_id = {{ $resume->id }};
		$('#result_send').attr('style', 'display: none');
		$('#result_send').html('<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" id="pg_send" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div></div>');
		$('#result_send').slideDown();
		blockInput();
		$.ajax({
			url: '{{ URL::route('employers.search.ajax') }}',
			data: {action: 'sendMail', send_email: send_email, send_subject: send_subject, send_content: send_content, cv_id: cv_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result_send').html('<div class="alert alert-success">Gửi mail thành công.</div>');
				} else {
					$('#result_send').html('<div class="alert alert-danger">Có lỗi khi thực hiện.</div>');
				}
				$('#send_email').removeAttr('disabled');
				$('#send_subject').removeAttr('disabled');
				$('#send_content').removeAttr('disabled');
				$('#btn-send').removeAttr('disabled');
				setTimeout(function(){ 
					$('#result_send').html(''); 
					$('#send_email').val('');
					$('#send_subject').val('');
					$('#send_content').val('');

				}, 3000);
				setTimeout(function(){ $('#modalSend').modal('hide');  }, 3000);
			}
		});

	}
	var blockInput = function()
	{
		setTimeout(function(){ 
			var div = $('#pg_send').attr('aria-valuenow');
			if (typeof div != 'undefined' && div < 75) {
				div = parseInt(div) + 25;
				$('#pg_send').attr('aria-valuenow', div);
				$('#pg_send').attr('style', 'width: '+div+'%');
				$('#pg_send').text(div + '%');
				blockInput();
			};
			
		}, 2000);
	}
	
	</script>
@stop