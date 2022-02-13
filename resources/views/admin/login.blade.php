<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style type="text/css">
    	.login_form_sec {
    		height: 600px;
    		display: grid;
    		align-items: center;
    	}
    	.login_form_sec .login_form_div {
    		background: #e8e8e8;
    		padding: 20px;
    	}
    </style>
  </head>
  <body>
    <section class="login_form_sec">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-5">
    				<div class="login_form_div">
    					@if($errors->any())
						<div class="alert alert-danger" role="alert">
						  {{$errors->first()}}
						</div>
						@endif
    					<form method="post" action="{{url('adminpanel')}}">
    						{{csrf_field()}}
    						<div class="text-center">
    							<h2>Login</h2>
    						</div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Email address</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
						  </div>
						  <!-- <div class="mb-3 form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Check me out</label>
						  </div> -->
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
    				</div>
    			</div>

    		</div>
    	</div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>