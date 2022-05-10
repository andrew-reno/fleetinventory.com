<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

use Illuminate\Http\Request; 
 
 
class UserAccessTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
        
    }
    
    public function test_api_online()
    {
	    $response = $this->get('/');
        $response->assertStatus(200);
	}
	
    public function test_access_not_authenticated(){
		//$this->withoutExceptionHandling();
        $response = $this->put('api/edit', [
            'id' =>  5,
            'price' => 1.99
        ]);
        if( $response)
        $response->assertStatus(200);
        else
       	$this->assertTrue(true);
         
	}
}
