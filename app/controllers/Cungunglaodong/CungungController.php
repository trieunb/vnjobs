<?php 
	class CungungController extends Controller
	{
		public function home()
		{
			$data=Partner::get();
			return View::make('cungunglaodong.home')->with('data',$data);
		}

		public function detail($id)
		{
			$services=TrainingCat::where('id','=',$id)->first(); 
			$data=TrainingPost::where('training_cat_id','=',$id)
			->select('title','content')
			->get()
			->toArray();
			 
			 
			return View::make('cungunglaodong.detail')->with(array('services'=>$services,'data'=>$data));
		}

	}
?>