<?php

class Category extends \Eloquent {
	protected $fillable = [];
	protected $table = 'categories';

	public static function getList()
	{
		$cats = Category::select('cat_name', 'id', 'parent_id')->get();
		if(count($cats))
		{
			$parent = $child = array();
			foreach ($cats as $key => $value) {
				if($value->parent_id == 0) $parent[$value->id] = $value->cat_name;
				if($value->parent_id != 0) $child[$value->parent_id][$value->id] = $value->cat_name;
			}
			$category = array();
			foreach ($parent as $key => $value) {
				if(empty($child[$key])) {
					$category[$value] = array();
				} else {
					$category[$value] = $child[$key];
				}
				
			}
			return $category;
		}
		return array();
	}
}