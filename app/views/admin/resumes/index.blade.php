@extends('layouts.admin')
@section('title')Resumes Manager @stop
@section('content')
	<h2>Danh sách hồ sơ</h2>
	<hr>
	@include('includes.notifications')
	<!--<a href="{{ URL::route('admin.resumes.create') }}" class="btn btn-success pull-right">Thêm mới</a>-->
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="resumes">
		<thead>
			<tr>
				<th>STT</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Ngày cập nhật</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Địa điểm</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/dataTables.bootstrap.js') }}
	<script type="text/javascript">
		$('#resumes').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('resumes.datatables') }}",
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 0 ] }
				],
				"fnDrawCallback": function (oSettings) {
					//if(oSettings.bSorted || oSettings.bFiltered) {
						var current = $('ul.pagination li.active a').text();
						var crshow = $('#resumes_length select option:selected').val();
						//alert(crshow);
						for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
							$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i]].nTr).html(i+1+(crshow*current-crshow));	
							
						}

					//}
				}
			});
		$('input[type="search"]').on( 'keyup', function () {
			$(this).val(locdau($(this).val()));
		} );

		function locdau(str){
			str= str.toLowerCase();
			str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
			str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
			str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
			str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
			str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
			str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
			str= str.replace(/đ/g,"d");
			str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'|\"|\&|\#|\[|\]|~/g,"-");
			str= str.replace(/-+-/g,"-");
			str= str.replace(/^\-+|\-+$/g,"");
			return str;
		}

	</script>

@stop