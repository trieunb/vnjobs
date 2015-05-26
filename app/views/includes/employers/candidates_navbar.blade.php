<div class="widget row menu-management-resume">
	<h3>Quản lý hồ sơ</h3>
	<ul class="menu-images-icons">
		
		<li class="{{ HTML::active(['employers.candidates.job', 'employers.candidates.index']) }}">
			<a href="#" onclick="return false;"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ ứng tuyển<br><small>(Chưa đăng ký xem hồ sơ)</small></span></a>
  			<ul>
  				@if(count($job_name))
					@foreach($job_name as $id=>$title)
						<li class="{{ HTML::active(['employers.candidates.job']) }}"><a href="{{ URL::route('employers.candidates.job', $id) }}" title="{{ $title }}">{{ Str::limit($title,25) }}</a></li>
					@endforeach
  				@else
					<li><a href="#" onclick="return false;">Bạn chưa có tin tuyển dụng nào</a></li>
  				@endif
  				
  			</ul>

		</li>
		<li class="">
			<a href="#" onclick="return false;"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ đã chọn</span></a>
  			<ul>
  				<li class="selected"><a href="#"><i class="fa fa-folder-o"></i>Quản lý thư mục</a></li>
  				<li><a href="#"><i class="fa fa-folder-o"></i>Quản lý thư mục</a></li>
  				<li><a href="#"><i class="fa fa-folder-o"></i>Quản lý thư mục</a></li>
  				<li><a href="#">Quản lý thư mục</a></li>
  			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ đã xóa</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Danh sách từ chối</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Số HS đã xem/HS được xem(12/100)</span></a>
		</li>
	</ul>
</div>