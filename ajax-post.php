
<html lang="en-GB" >

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			Ajax Post - TPM API
		</title>

		<script type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		 <script type="text/javascript" >
		 	
		 	jQuery(document).ready(function($) 
			{
				$('.api_form').submit(function(e) {
					var postData = $(this).serializeArray();
					var formURL = $('input[type=radio][name=env]:checked').val() + $(this).attr("action");
					var env = $('input[type=radio][name=env]:checked').attr('id');

					/* start ajax submission process */
					$.ajax({
					    url: formURL,
					    type: $(this).attr('method'),
					    data: postData,
					    dataType: "json",
					    headers: {"Authorization": 'Bearer '+$('.token').val()},
					     headers1: {
						 	"key" : "value"
						 },
						 
					    success: function(data, textStatus, jqXHR) {
					        alert('Success!');
					        if(data.access_token !=undefined)
					       		$(".token").val(data.access_token) ;
					       	
					       		//var obj = JSON.parse(data);
					       	
					       	 if(data.org_id !=undefined){
							 	$(".org_id").val(data.org_id);
							 	$(".org_id_text").html(data.org_id);
							 } 
					    },
					    error: function(jqXHR, textStatus, errorThrown) {
					        alert('Error occurred!');
					    }
					});

					e.preventDefault(); //STOP default action
					/* ends ajax submission process */
				});	 
			});
			
		 </script>
	</head>

	<body>

<!-- 
$ curl -X POST -F 'name=Administrator' -F 'email=admin@test.com' -F 'password=tpm12345' http://localhost/api.com:8001/api/register
-->

<div class="endpoints"> 
	<h1>SET ENDPOINT </h1> 
	<label for="env"> Live 
		<input type="radio" id="live_env" name="env" value="https://api.creategroup.uk.com/api/">
	</label>
	<label for="env"> Local
		<input type="radio" id="localhost" name="env" value="http://localhost/fleetinventory.com/api/" checked>
	</label>
</div>
	
<hr/>

<!-- BEGIN ENDPOINT -->
	<div class="endpoints"> <p>api/register  <span class="org_id_text"></span></p>
			<form action="register" method="POST" class="api_form">
			<input type="text" name="name" placeholder="Name" value="Test Account">
			<input type="text" name="email" placeholder="email" value="test@test.com" >
			<input type="text" name="password" placeholder="password" value="password"> 
			<input type="submit" value="submit_now">
			</form>
	</div>
	<!-- END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT -->
	<div class="endpoints"> <p>api/login  <span class="org_id_text"></span></p>
		<form action="login" method="POST" class="api_form">
			<input type="text" name="name" placeholder="Name" value="Test Account">
			<input type="text" name="email" placeholder="email" value="test@test.com" >
			<input type="text" name="password" placeholder="password" value="password"> 
			<input type="submit" value="submit_now">
		</form>
	</div>
	<!-- END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>api/user  <span class="org_id_text"></span></p>
		<form action="user" method="POST" class="api_form">
			<input type="text" name="name" placeholder="Name">
			<input type="text" name="email" placeholder="email" >
			<input type="text" name="password" placeholder="password">
			<input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	 
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>api/organisation/store  <span class="org_id_text"></span></p>
		<form action="organisation/store" method="POST" class="api_form">
			<input type="text" name="name" placeholder="Name">
			<input type="text" name="email" placeholder="email" >
			<input type="text" name="password" placeholder="password">
			<input type="submit" value="submit_now">
		</form>
	</div>
	 END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>api/me  <span class="org_id_text"></span></p>
		<form action="me" method="POST" class="api_form">
			<input type="text" name="token" class="token" placeholder="token" value="">
			<input type="submit" value="submit_now">
		</form>
	</div>
	 END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints""> <p>api/user   <span class="org_id_text"></span></p>
		<form action="user" method="POST" class="api_form">
			<input type="text" name="token" class="token" placeholder="token">
			<input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>List all:  Return list of all API organisations - Working <span class="org_id_text"></span></p>
		<form action="organisation" method="GET" class="api_form">
			<select name="id">
				<option value="1">1</option>
				 <option value="2">2</option>  
			</select>
			<input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	
	
	<!-- BEGIN ENDPOINT 
	<div class="endpoints"> <p>Sanctum, auth TPM create_org   <span class="org_id_text"></span></p>
		<form action="createorg" method="POST" class="api_form">
			 <input type="text" name="token" class="token" placeholder="token">
			<input type="submit" value="submit_now"> 
			<input style="width: 100%;margin: 0.5em 0em;padding: 0.5em;" name="rdata" value='<?php echo json_encode(array('firstname' => 'andrew', 'surname' => 'reno','org_name' =>'best org', 'email' => 'test@example.com','order_id' => '1234', 'productid' => '2662', 'address1' => '2 grange close', 'telephone' => "+44 (01454) 612000", 'address2' => 'Bradley stoke', 'city' => 'bristol', 'postcode' => 'bs320ah', 'country' => 'uk','password' => 'Create123+')) ?>'>
		</form> 
	</div>
	  END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>test_api, TPM create_org (No Auth) <span class="org_id_text"></span></p> 
		<form action="ready" method="POST" class="api_form">
			<select name="action">
				<option value="test_api">test_api</option>
				<option value="create_org">create_org</option>
			</select>
			<input type="submit" value="submit_now"> 
			<input style="width: 100%;margin: 0.5em 0em;padding: 0.5em;" name="rdata" value='<?php echo json_encode(array('firstname' => 'andrew', 'surname' => 'reno','org_name' =>'best org', 'email' => 'test@example.com','order_id' => '1234', 'productid' => '2662', 'address1' => '2 grange close', 'telephone' => "+44 (01454) 612000", 'address2' => 'Bradley stoke', 'city' => 'bristol', 'postcode' => 'bs320ah', 'country' => 'uk','password' => 'Create123+')) ?>'>
		</form> 
	</div>
 END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT 
	<div class="endpoints"> <p>get tpm org by id: <span class="org_id_text">e.g 100101</span></p>
		<form action="ready" method="POST" class="api_form">
			<select name="action" >
				<option value="get_org">get_org</option>
			</select>
			 <input name="org_id" value="100101">
			<input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT -->
	<h1>List all the spaceships allowing filtering by name, class, status</h1>
	<div class="endpoints">   </p>
		<form action="show" method="POST" class="api_form">
			<select name="method">
				<option value="all">all</option>
				<option value="name">name</option>
				<option value="class">class</option>
				<option value="status">status</option>
			</select>
			 
			  <input type="text" name="token" class="token" placeholder="token">
			<input type="submit" value="submit_now" />
		</form>
	</div>
	<!-- END ENDPOINT -->
	
	
 
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>delete org and org users:  <span class="org_id_text">e.g 100101</span></p>
		<form action="deleteorgbyid" method="POST" class="api_form">
			<select name="action" >
				<option value="deleteorgbyid">deleteorgbyid</option>
			</select>
			 <input type="text" name="token" class="token" placeholder="token">
			 <input type="text" name="org_id" class="org_id" placeholder="org_id">
			<input type="submit" value="submit_now">
		</form>
	</div>
	 END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>add user to org:  <span class="org_id_text">e.g 100101</span></p>
		<form action="ready" method="POST" class="api_form">
			<select name="action" >
				<option value="add_user_to_org">add_user_to_org</option>
			</select>
			 <input style="width: 100%;margin: 0.5em 0em;padding: 0.5em;" name="rdata" value='<?php echo json_encode(array('firstname' => 'andrew', 'surname' => 'reno',  'email' => 'andrew.reno@comeragroup.co.uk', 'order_id' => '1234', 'productid' => '50', 'password' => 'Create123+')); ?>'>
			 <input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT  
	<div class="endpoints"> <p>test: (test db connections)  </p>
		<form action="test" method="GET" class="api_form">
			 
			<input type="submit" value="submit_now">
		</form>
	</div>
	  END ENDPOINT -->
	
	
	</body>

</html>
