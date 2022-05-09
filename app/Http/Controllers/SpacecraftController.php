<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Response;

use App\Models\Spacecraft;

class SpacecraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Spacecraft $sc)
    {
         $data  = $sc->Create();
         //if($data)
         //$data['success']  = true;
         
         return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Spacecraft $sc)
    {
    		
    	//$d = Spacecraft::find($request->id);
    	 
 		//$data = Spacecraft::All();
    	$data = $sc->getAll($request->method,$request->filter);
    	//$d = $sc->getAll('class','Star Destroyer');
    	//$d = $sc->getAll('status','Damaged');
    	 
		 $data['success'] = true;
		 
    	return response($data);
 //           ->header('Content-Type', "json")
   //         ->header('X-Header-One', 'success');
            
    	//echo json_encode($d);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Spacecraft $sc)
    {	
    
       $sc->UpdateSc($request->sc_id, $request->price);
       
       $data['success'] = true;
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
    public function destroy(Request $request, Spacecraft $sc) 
    {
		$data['success'] = false;

		if($sc->DestroySc($request->sc_id) )
			$data['success'] = true;
			
		return response($data);		
	}
}

