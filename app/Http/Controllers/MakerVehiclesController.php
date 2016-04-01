<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Maker;
use App\Model\Vehicle;

use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests\CreateMakerRequest;

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
	public function store(CreateVehicleRequest $request, $makerId)
	{
		$maker = Maker::find($makerId);

		if(!$maker)
		{
			return response()->json(['Error_msg'=>'No record with the maker id was retrived', 'Error_code' => 404], 404);
		}

		$values = $request->all();

		$maker->vehicles()->create($values);

		
		return response()->json(['message'=>'The Vehicle associated was created.'],201);

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
	public function update(CreateVehicleRequest $request, $id, $vehicleId)
	{
		$maker = Maker::find($id);

		if(!$maker)
			{
				return response()->json(['Error_msg ' => 'No maker id of such was found', 'Error_code: ' => 404], 404);
			}

		$vehicle = $maker->vehicles->find($vehicleId);

		if(!$vehicle){
			return response()->json(['Error Message'=> 'Vehicle id was not found.','Error code'=> 404], 404);
		}



			$code = $request->get('code');
			$power = $request->get('power');
			$capacity = $request->get('capacity');
			$speed = $request->get('speed');

			$vehicle->code = $code;
			$vehicle->phone = $power;
			$vehicle->phone = $capacity;
			$vehicle->phone = $speed;

			$vehicle->save();

			return response()->json(['msg'=>'Vehicle details was updated'], 200);

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
