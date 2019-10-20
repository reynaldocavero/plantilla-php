<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<div  style="display: flex;justify-content: center;align-items:center;">
		<form>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div>
			<button type="button" class="btn btn-primary" id="login">Submit</button>
		</form>
	</div>

	

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#login').on('click',function(e) {
			var correo=$('#exampleInputEmail1').val();
			var password=$('#exampleInputPassword1').val();
			var metodo='login';
			var data=[];
			var usuario={
				
					correo:correo,
					password:password,
					metodo:metodo
				
			}


			$.ajax({
				type: "POST",
				url: "/REYNALDO/Controller/loginController.php",
				//data: 'correo='+correo+'&password='+password+'&metodo='+metodo,
				data: {metodo:metodo,
						usuario:JSON.stringify(usuario)},
				success: function(data) {
					console.log(data);
					if(data != '0'){
						location.href = data;
					}
				
				}
			});
		});
	</script>
</body>
</html>