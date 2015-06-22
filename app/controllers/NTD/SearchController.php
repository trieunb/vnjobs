<?php 
namespace NTD;
use View, Redirect, NTD, Auth, Job, Validator, Hash, Input, DB, Resume, RSFolder, EFolder, Response, Category;
class SearchController extends \Controller {
	public function getBasic()
	{
		if(Input::get('category'))
		{
			$history = array();
			$resumes = \Resume::orderBy('id', 'desc');
			if(Input::get('keyword'))
			{
				if(Input::get('full_keyword')) $resumes->where('tieude_cv', Input::get('keyword'));
				else $resumes->where('tieude_cv', 'LIKE', "%".Input::get('keyword')."%");
				$history['keyword'] = Input::get('keyword');
			}
			if(is_numeric(Input::get('category')))
			{
				$resumes->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'))->where('rs_id', '>', 0);
				});
				$history['category'] = Input::get('category');
			}
			if(is_numeric(Input::get('location')))
			{
				$resumes->whereHas('location', function($q) {
					$q->where('province_id', Input::get('location'))->where('rs_id', '>', 0);
				});
				$history['location'] = Input::get('location');
			}
			if(is_numeric(Input::get('level')))
			{
				$resumes->where('capbachientai', Input::get('level'));
				$history['level'] = Input::get('level');
			}
			$result = $resumes->paginate(10);
			$input = Input::all();
			foreach ($input as $key => $value) {
				if($key == 'submit') continue;
				$result->appends(array($key=>$value));
			}
			//insert history
			$history['ntd_id'] = Auth::id();
			$history['total_result'] = $result->getTotal();
			$history['search_date'] = date('Y-m-d');
			if(isset($input['submit'])) \SearchHistory::create($history);
			return View::make('employers.search.basic', compact('result', 'input'));
		} else {
			return View::make('employers.search.basic');
		}
	}
	public function getAdvance()
	{
		if(Input::get('category'))
		{
			$resume = Resume::orderBy('id', 'desc');
			if (Input::get('keyword')) {
				if(Input::get('full_keyword')) $resume->where('tieude_cv', Input::get('keyword'));
				else $resume->where('tieude_cv', 'LIKE', "%".Input::get('keyword')."%");
			}
			if (is_numeric(Input::get('category'))) {
				$resume->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'));
				});
			}
			if (is_numeric(Input::get('location'))) {
				$resume->whereHas('location', function($q) {
					$q->where('province_id', Input::get('location'));
				});
			}
			if (is_numeric(Input::get('level'))) {
				$resume->where('capbacmongmuon', Input::get('level'));
			}
			if (is_numeric(Input::get('namkinhnghiem'))) {
				$resume->where('namkinhnghiem', Input::get('namkinhnghiem'));
			}
			if (is_numeric(Input::get('language'))) {
				$resume->whereHas('cvlanguage', function($q) {
					$q->where('lang_id', Input::get('language'));
				});
			}
			if (is_numeric(Input::get('updated_at'))) {
				if(Input::get('updated_at') == 1) { //cập nhật hôm nay
					$resume->whereRaw('YEAR(updated_at)=? and MONTH(updated_at)=? and DAY(updated_at)=?', [date('Y'), date('n'), date('j')]);
				}
				if(Input::get('updated_at') == 2) { //cập nhật hôm qua
					$resume->whereRaw('YEAR(updated_at)=? and MONTH(updated_at)=? and DAY(updated_at)=?', [date('Y', strtotime('- 1 day')), date('n', strtotime('- 1 day')), date('j', strtotime('- 1 day'))]);
				}
				if(Input::get('updated_at') == 3) { //cập nhật tuần này
					$resume->whereRaw('updated_at > NOW() - INTERVAL 7 DAY');
				}
				if(Input::get('updated_at') == 4) { //cập nhật tháng này
					$resume->whereRaw('updated_at > NOW() - I`');
				}
				if(Input::get('updated_at') == 5) { //cập nhật năm này
					$resume->whereRaw('updated_at > NOW() - INTERVAL 365 DAY');
				}
			}
			if (is_numeric(Input::get('gender'))) {
				$resume->whereHas('ntv', function($q) {
					$q->where('gender', Input::get('gender'));
				});
			}
			if (is_numeric(Input::get('education'))) {
				$resume->whereHas('bangcap', function($q) {
					$q->where('bangcapcaonhat', Input::get('education'));
				});
			}
			if (is_numeric(Input::get('luong_from'))) {
				$resume->where('mucluong', '>=', Input::get('luong_from'));
			}
			if (is_numeric(Input::get('luong_to'))) {
				$resume->where('mucluong', '<=', Input::get('luong_to'));
			}
			$input = Input::all();
			
			$result = $resume->paginate(10);
			foreach ($input as $key => $value) {
				if($key == 'submit') continue;
				$result->appends(array($key=>$value));
			}
			return View::make('employers.search.advance_result', compact('result', 'input'));
		} else {
			return View::make('employers.search.advance');
		}
	}
	public function getCat($id = false)
	{
		return "$id chưa có layout";
	}
	public function getCategory($id = false)
	{
		if(is_numeric($id))
		{
			$result = Resume::orderBy('id', 'desc')
			->whereHas('cvcategory', function($q) use($id) {
				$q->where('cat_id', $id);
			})->paginate(10);
			$input = ['category'=>$id, 'location'=>'all'];
			$cats = Category::where('parent_id', 1)->lists('cat_name', 'id');
			return View::make('employers.search.advance_result', compact('result', 'input', 'cats'));
		} else {
			$category = \Category::where('parent_id', '>', 0)
			->with([
				'mtcategory'	=>	function($q) {
					$q->where('rs_id', '>', 0)->whereHas('resume', function($q1) {
						$q1->where('is_public', 1)->where('is_visible', 0);
					});
				}])
			->get();
			return View::make('employers.search.category', compact('category'));
		}
		
	}
	public function postCalendarView()
	{
		$td = $this->calendar();
		$html = "";
		foreach ($td as $key => $value) {
			$html .= "<tr>";
			foreach ($value as $val) {
				$html .= "<td><a class=\"view-history\" id=\"view_$val\">$val</a></td>";
			}
			$html .= "</tr>";
		}
		return $html;
	}
	public function calendar()
	{
		$year = Input::get('year');
		$month = str_pad(Input::get('month'), 2, '0', STR_PAD_LEFT);
		$total_day = date('t', strtotime($year."-".$month."-01"));
		$td = array();
		$lead_day = date('w', strtotime($year."-".$month."-01")) + 1;
		$start = 1;
		for($i = 1; $start <= $total_day; $i++)
		{
			$tmp = array();
			foreach (range(1, 7) as $key => $value) {
				if($i < $lead_day || $start > $total_day) {
					$tmp[] = '&nbsp;';
				} else {
					$tmp[] = $start;
					$start += 1;
				}
				$i += 1;
			}
			$td[] = $tmp;
		}
		return $td;	
	}
	public function postCalendar()
	{
		
		$td = $this->calendar();
		$html = "";
		foreach ($td as $key => $value) {
			$html .= "<tr>";
			foreach ($value as $val) {
				$html .= "<td><a data-toggle=\"modal\" id=\"date_$val\" href=\"#modal-history\" class=\"show-modal\">$val</a></td>";
			}
			$html .= "</tr>";
		}
		return $html;
	}
	
	public function getHistory()
	{

	}
	public function getHistoryInfo()
	{
		$year = Input::get('year');
		$month = str_pad(Input::get('month'), 2, '0', STR_PAD_LEFT);
		$day = str_pad(Input::get('day'), 2, '0', STR_PAD_LEFT);
		$result = \SearchHistory::orderBy('id', 'desc')
		->where('ntd_id', Auth::id())
		->where('search_date', $year.'-'.$month.'-'.$day)
		->orderBy('id', 'desc')
		->paginate(10);
		$result->appends(array('year' => $year, 'month'=>$month,'day'=>$day));
		$category = \Category::lists('cat_name', 'id');
		$level = \Level::lists('name', 'id');
		$location = \Province::lists('province_name', 'id');
		return View::make('employers.search.table_result', compact('result', 'category', 'level', 'location'));
	}
	public function getResumeInfo($id)
	{
		$resume = Resume::where('id', $id)->with('cvcategory')->with('location')->first();
		if(!$resume)
		{
			return Redirect::route('employers.search.basic');
		} else {
			$resume->views += 1;
			$resume->timestamps = false;
			$resume->save();
			if(@$resume->ntv->id) {
				return View::make('employers.search.resume_info', compact('resume'));
			} else {
				return View::make('employers.search.resume_info_nologin', compact('resume'));
			}
		}
	}
	public function postAjax()
	{
		if(Input::get('action') == 'saveToFolder')
		{
			$data['ntd_id'] = Auth::id();
			$data['folder_id'] = Input::get('param');
			$data['cv_id'] = Input::get('cvid');
			$rs = RSFolder::firstOrCreate($data);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'createFolder')
		{
			$folder = EFolder::firstOrCreate(['ntd_id'=>Auth::id(), 'folder_name'=>Input::get('param')]);
			$data['ntd_id'] = Auth::id();
			$data['folder_id'] = $folder->id;
			$data['cv_id'] = Input::get('cvid');
			$rs = RSFolder::firstOrCreate($data);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
	}
}