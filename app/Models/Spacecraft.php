<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spacecraft extends Model
{
    use HasFactory;
    
    //protected $fillable = ['name','class']; 
    protected $guarded = ['id'];
    
    public function getAll($filter = null, $param)
    {

        $sc = Spacecraft::query();

        if ($filter and $param) {
            $sc ->where($filter,$param);
		}
        return $sc ->get();
    }
    
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
    
    public function UpdateSc($id, $value){
		$sc = Spacecraft::find($id);
		$sc->value = $value;
		$sc->save();
		echo json_encode($sc) ;
	}
	
    function DestroySc($id){
		return parent::destroy($id);
			 
	}
}
