<!DOCTYPE html>
<html>
<head>
  <title>WELCOME</title>
  <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css/toastr.min.css') }}">


</head>

<body>
	<style type="text/css">
		.btn-primary{
			background: #e2615c;
			border: #e2615c;
		}
		.our_color{
			color: #e2615c;
		}
	</style>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand our_color" href="#" style="color:#e2615c;"><b>
					STOCK MANAGEMENT SYSTEM
				</b></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{url('product/purchase')}}" style="color:#e2615c;">Add New Record</a></li>
					<li class="active"><a data-toggle="modal" href='#new-product' style="color:#e2615c;">Add New Product</a></li>
					<li><a href="" id="show-products" style="color:#e2615c;">See All products</a></li>
					<li><a href="{{url('/logout')}}" style="color:#e2615c;">Logout!</a></li>
				</ul>
				
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				
			</div>
		</div>
		@yield('content')
	</div>

	<!-- add product modal -->
	<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
	<div class="modal fade" id="new-product">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Product</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="{{ url('product/') }}">
						{{csrf_field()}}
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Product Name</label>
								<div class="form-group">
									<div class="">
										<input class="form-control" placeholder="Enter product name e:g Indomie" type="text" name="product">
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Save Product" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</form>

			</div>
		</div>
	</div>

	{{-- product modal --}}
	{{-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> --}}
			<div class="modal fade" id="modal-products">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							{{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
							<center>
								<h5 class="modal-title delete_class">All Products</h5>
							</center>
						</div>
						<div class="modal-body" id="modal_body">
							<div class="loader">
							</div>
							<div class="alert alert-danger" id="not_found_skills" style="display: none;">
							  <strong>Oops!</strong> Something went wrong!.
							</div>
							<table class="table all_skills table-bordered table-hover table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>NAME</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="product_output">

								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>





	<script src="{{ asset('style/js/jquery.min.js') }}"></script>
	<script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('style/js/toastr.min.js') }}"></script>

	    <script type="text/javascript">
        toastr.options.preventDuplicates = true;
        // toastr.success("ola");
        @if (session('middleware'))
          toastr.error("{{session('middleware')}}");
        @endif

        @if (session('welcome_back'))
          toastr.success("{{session('welcome_back')}}");
        @endif

        @if (session('welcome'))
          toastr.success("{{session('welcome')}}");
        @endif

        @if (session('delete_message'))
          toastr.error("{{session('delete_message')}}");
        @endif

        @if (session('success'))
          toastr.success("{{session('success')}}");
        @endif

        @if (session('success_image'))
          toastr.success("{{session('success_image')}}");
        @endif

        @if (session('error'))
          toastr.error("{{session('error')}}");
        @endif

        @if ($errors->has('image_reference')) 
          toastr.error("{{$errors->first('image_reference')}}");
        @endif

        function getProductTotalPrice(){
        	var price = parseInt($(this).val());
        	var quantity = parseInt($("#quantity").val());
        	var total = price * quantity;
        	return total;
        }

        $("#price").on("keyup", function(){
        	var price = parseInt($(this).val());
        	var quantity = parseInt($("#quantity").val());
        	var total = price * quantity;
        	$("#total").val(total);
        });

	        $("#quantity").on("change", function(e){
	        	e.preventDefault();
	        	// console.log();
	        	var price = parseInt($("#price").val());
	        	var quantity = e.target.value;
	        	var total = price * quantity;
		        if(parseInt($("#price").val())){
		        	$("#total").val(total);
			    }
	        });     



	        // product listing   	// 
	        // $(document).ready(function(){
			 $('#show-products').click(function(){
			    // $('.loader').show();
			    var i = 1;
          		var output = '';
			   // AJAX request
			   $.ajax({			   	
			    url: '/product/list-product',
			    type: 'get',
			    success: function(response){
			    $('.loader').show();
			    	$.each(response.skills, function(key, val){
			    	    output += '<tr ' + 'data-skill-id="'+val.id+'">';
			    	    output+= '<td> '+i+++' </td>';
			    	    output+= '<td> '+val.name+' </td>';
			    	    output+= '<td><a class="delete_skill" id="'+val.id+'" style="color:red; text-decoration:underline;"><i class="fa fa-trash delete_skill"></i></a></td>';
			    	    output += '</tr>';
			    	});
			      // Add response in Modal body
			      $('#product_output').html(output);

			      // Display Modal
			      $('#modal-products').modal('show');
			   	  $('.loader').hide();
			    },
			    error : function(err){
			    	$("#not_found_skills").show();
			    	$(".all_skills").hide();
			    	$(".loader").hide();
			      	$('#modal-skills').modal('show');
			    }
			  });
			 });
  </script>


</body>
</html>