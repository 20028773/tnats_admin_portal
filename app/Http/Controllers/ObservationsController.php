<?php

namespace App\Http\Controllers;

use App\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

use function Sodium\add;

class ObservationsController extends Controller
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
        if (request('id') == null) {
            $o = new Observation();

            $o->user_id = 1;
            $o->species = request('oSpecies');
            $o->notes = request('oNotes');
            $o->approved = false;
            $o->active = true;
            $o->created_at = now();

            if (request('oPhoto') != null) {

                $request->validate(
                    [
                        'oPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100024',
                    ]
                );

                $file_ext = request('oPhoto')->getClientOriginalExtension(); 

                $image = Image::make(request('oPhoto'));

                Response::make($image->encode('jpeg'));

                $photoFile = $o->user_id . '_photo_' . time() . '.' . $file_ext;

                request('oPhoto')->storeAs('/images/', $photoFile, 'public');
                
                $o->photo = $image;
            }
            
            $o->save();
        }
        else{
            $o = Observation::find(request('id'));

            $o->species = request('oSpecies');
            $o->notes = request('oNotes');
            $o->approved = request('oApproved');
            $o->updated_at = now();

            $o->touch();
        }

        return redirect('/observations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
