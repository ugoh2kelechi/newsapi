<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Maker;
use App\Model\Vehicle;

class MakerVehiclesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$makers = Maker::find($id);

		if(!$makers)
		{
			return response()->json(['Error_msg'=>'No record with the id was retrived', 'Error_code' => 404], 404);
		}

		return response()->json(['results' => $makers->vehicles], 200);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,$vehicleId)
	{
		
		
			$maker = Maker::find($id);

			if(!$maker)
			{
				return response()->json(['Error_msg ' => 'No value of the provided valus could be retrieved', 'Error_code: ' => 404], 404);
			}

			$vehicle = $maker->vehicles->find($vehicleId);

			if(!$vehicle)
			{
				return response()->json(['error '=> 'No vehicle was returned for this maker.', 'errorCode: '=> '404'], 404);
			}

			return response()->json(['Status '=> $vehicle], 200);	

	}


	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
