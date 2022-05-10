
<html lang="en-GB" >

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			 Imperial Fleet Inventory Rest API 
		</title>

		<script type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		 <script type="text/javascript" >
		 	
		 	jQuery(document).ready(function($) 
			{
				$('.api_form').submit(function(e) {
					var postData = $(this).serializeArray();
					var formURL = $('input[type=radio][name=env]:checked').val() + $(this).attr("action");
					var env = $('input[type=radio][name=env]:checked').attr('id');
					
					$("#results_data").html("");
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
					       	
					       	 var obj = JSON.stringify(data);
					       	obj = obj.replace(/\\/g, "");
					       	 // var obj = JSON.parse(obj)
					       	$("#results_data").html(
								obj
							);
					       	 if(data.org_id !=undefined){
							 	$(".org_id").val(data.org_id);
							 	$(".org_id_text").html(data.org_id);
							 } 
					    },
					    error: function(jqXHR, textStatus, errorThrown) {
					    	alert('Error occurred!');
					        
					        var obj = JSON.stringify(jqXHR.responseJSON);
					       	obj = JSON.parse(obj)
					       	 //obj = obj.replace(/\\/g, "");
					       	 // var obj = JSON.parse(obj)
					        var t = '';
							
							// ES5
							Object.keys(obj).forEach(function(k){t +=  k + ' - ' + obj[k]});
							// ES6
							//Object.keys(obj).forEach(key => {t += key + ' - ' + obj[key]});
							// ES7
							//Object.entries(obj).forEach(([key, value]) => {t += key + ' - ' + value})

							$("#results_data").html(t);
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
		<input type="radio" id="live_env" name="env" value="https://3ev.com/api/">
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
	
	<!-- BEGIN ENDPOINT -->
	<div class="endpoints"> <p>List all the spaceships allowing filtering by name, class, status. Show details of a single spaceship by id. Parameter is optional (todo vue.js interface) <span class="org_id_text"></span></p>
		<form action="show" method="POST" class="api_form">
			<select name="method">
				<option value="">all</option>
				<option value="name">name</option>
				<option value="class">class</option>
				<option value="status">status</option>
				<option value="id">id</option>
			</select>
			 
			 <label>
			<input type="text" name="filter"  placeholder="param">
			</label>
			  <input type="text" name="token" class="token" placeholder="token">
			<input type="submit" value="submit_now" />
		</form>
	</div>
	<!-- END ENDPOINT -->
	
 
	<!-- BEGIN ENDPOINT -->
	
	<div class="endpoints"> <p>Ceate a new spaceship</p>  <span class="org_id_text"></span>
		<form action="create" method="POST" class="api_form">
			 
			  <input type="text" name="token" class="token" placeholder="token">
			<input type="submit" value="submit_now" />
		</form>
	</div>
	<!-- END ENDPOINT -->
 
	<!-- BEGIN ENDPOINT -->
	<div class="endpoints"> <p>Edit/update an existing spaceship by id <span class="org_id_text">e.g 100101</span></p>
		<form action="edit" method="PUT" class="api_form">
			 
			 <input type="text" name="token" class="token" placeholder="token">
			  <input type="text" name="sc_id" placeholder="id">
			   <input type="text" name="price" placeholder="new price">
			<input type="submit" value="submit_now">
		</form>
	</div>
	<!-- END ENDPOINT -->
	
	<!-- BEGIN ENDPOINT -->
	<div class="endpoints"> <p>Delete an existing spaceship by id <span class="org_id_text">e.g 100101</span></p>
		<form action="delete" method="DELETE" class="api_form">
			 
			 <input type="text" name="token" class="token" placeholder="token">
			 <input type="text" name="sc_id" placeholder="id">
			<input type="submit" value="submit_now">
		</form>
	</div>
	<!-- END ENDPOINT -->
	
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
	
	<div id="results_data"> </div>
	</body>

</html>
