<?php

class JobSeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /jobseeker
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /jobseeker/create
	 *
	 * @return Response
	 */
	public function datatables()
	{
		$users = User::orderBy('id', 'desc')->select('id', 'username', 'email', 'created_at', 'id as ids');
		$stt = 1;
		return Datatables::of($users)
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.users.destroy", $id) )) }}
			<a class="btn btn-sm btn-info" href="{{URL::route("admin.users.edit", array($id) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you want delete ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
		->make();
	}
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /jobseeker
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /jobseeker/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}