<?php

class MyJob extends \Eloquent {
	protected $fillable = ['ntv_id', 'job_id'];
	protected $table = 'my_jobs';

	public function application(){
		return $this->beLongsTo('Application', 'job_id');
	}
}