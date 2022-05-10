<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spacecraft extends Model
{
    use HasFactory;
    
    //protected $fillable = ['name','class']; 
    protected $guarded = ['id'];
    
    /**
	* Find and return a spacecraft by id e.g filter = id param = 2, no filter return all...
	* @param Condition 1 $filter
	* @param Condition 2 $param
	* 
	* @return
	*/
    public function getAll($filter = null, $param)
    {
        $sc = Spacecraft::query();

        if ($filter and $param) {
            $sc ->where($filter,$param);
		}
        
        return $sc ->get();
    }
    
    /**
	* Create a new spacecraft
	* 
	* @return the new object
	*/
    public function Create()
    { 
	     try {
	 			$sc = parent::create ([    
	 				
	            	'name' 		=>  'Dynamic Destroy',
	                'class'   	=> 'Star Destroyer',
	                'crew'		=> 35000,
	                'image'		=> 'https:\\url.to.image',
	                'value'		=> 1999.99,
	                'status'	=>  'Operational',
	                'armament'	=> json_encode( array(
	        								  array('title' => 'Turbo Laser', 'qty' => '60'), 
	        								  array('title' => 'Ion Cannons', 'qty' => '60') ,
	        								  array('title' => 'Tractor Beam', 'qty' => '60') 
	                						))
					]);
			} catch ( QueryException $exception) {
				$errorInfo = $exception->errorInfo;
				echo json_encode($exception->errorInfo) ;
		}
		
		return $sc;
    }
    
    /**
	* 
	* @param Update by $id
	* @param todo add interface for full edit all. Only accept changes to price with $value param
	* 
	* @return success or fail for api message
	*/
    public function UpdateSc($id, $value)
    {
		$sc = Spacecraft::find($id);
		
		if($sc){
			$sc->value = $value;
			$sc->save();
			return 1;
		}
		return 0;
	}
	
	/**
	* Delete from database
	* @param spacecraft $id
	* 
	* @return 0 or 1 for api message
	*/
    function DestroySc($id){
		return parent::destroy($id);	 
	}
}
