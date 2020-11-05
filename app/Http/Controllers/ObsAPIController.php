<?php

namespace App\Http\Controllers;

use App\Observation;
use App\Locations;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

use function Sodium\add;

class ObsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observations = Observation::where('active', '=', true)->get();
        Return view('observations.index',['observations' =>$observations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $hr = HotelRoom::where('active','=',true)->get();
        $u = User::where('user_type_id','=', 1)->get();
        $guestsList = range(1,10);
*/
        return view('observations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = 'Success';

        if ($request->user_id != null) {
            $o = new Observation();
            $o->guid = $request->guid;
            $o->user_id = $request->user_id;
            $o->location = $request->location;
            $o->species = $request->species;
            $o->notes = $request->notes;
            $o->approved = $request->approved;
            $o->created_at = now();
            $o->active = $request->active;
            $o->photo_string = "";

            $o->save();
        }
        else {
            $o = Observation::where('guid', '=', $request->guid)->firstOrFail();

            $o->photo_string = $o->photo_string . $request->photo_string;

            if ($request->end_of_photo == "true") {
                $a = base64_decode($o->photo_string);

                $o->photo = $a;
                $o->photo_string = null;
            }

            $o->touch();

            if ($request->end_of_photo == "true") {
                $message = 'Photo Inserted';
            }
        }

        return response([
                            'guid' => $request->guid,
                            'message' => $message,
                        ], 200);


        return redirect('/observations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getLocations()
    {
        $locations = Locations::all();

        return response([
                            'locations' => $locations,
                            'message' => 'Retrieved Successfully',
                        ], 200);
    }

    public function getSpecies()
    {
        $species = Species::all();

        return response([
                            'species' => $species,
                            'message' => 'Retrieved Successfully',
                        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $o = Observation::find($id);
     //   $hr = HotelRoom::where('active','=',true)->get();
     //   $u = User::where('user_type_id','=', 1)->get();
     //   $guestsList = range(1,10);
        $list = array("1"=>"Approve", "2"=>"Reject");

        return view('observations.update', compact('o', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $o = Observation::find($id);
        $o->active = false;
        $o ->touch();
        return redirect('/observations');
    }

    function fetch_image($id)
    {
        $o = Observation::find($id);

        $image_file = Image::make($o->photo);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
