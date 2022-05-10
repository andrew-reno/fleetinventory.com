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
    public function index(){}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Spacecraft $sc)
    {
		$data = $sc->Create();
		
		if($data)
			$data['success'] = true;
		else
			$data['success'] = false;

		return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Spacecraft $sc)
    {
    	$request->validate([
    		'method'  => 'required' 
        ]);
         
    	$data = $sc->getAll($request->method,$request->filter);
    	 
    	if(count($data))
			$data['success'] = true;
		else
			$data['success'] = false;
		  
    	return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Spacecraft $sc)
    {	   
     	$request->validate([
            'sc_id' => 'required',
            'price' => 'required' 
        ]);
        
       if($sc->UpdateSc($request->sc_id, $request->price))
       		$data['success'] = true;
       else
       {	$data['success'] = false;
       		$data['message'] = "No record found to edit";
		}
		
		return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$request->validate([
            'sc_id' 	 => 'required',
            'price' 	 => 'required' 
        ]);
        
        //
        $sc = new Spacecraft;
        $data = $sc->UpdateSc($request->id, $request->value);
        if($data)
         	$data['success'] = true;
        
        echo json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Spacecraft $sc) 
    {
    	$request->validate([
            'sc_id' 	 => 'required'
        ]);
        
		$data['success'] = false;

		if($sc->DestroySc($request->sc_id) )
			$data['success'] = true;
			
		return response($data);		
	}
}