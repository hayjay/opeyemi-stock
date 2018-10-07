@extends('layout.master')

	@section('title')
		RECORD PRODUCT SALE
	@endsection

	@section('content')

		<div class="row well">
			<div class="col-lg-6 col-lg-offset-3">
				<form action="" method="POST">
					<legend>Add New Record <a class="btn btn-success btn-sm" data-toggle="modal" href='#new-product'>New Product</a> </legend>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Select Product Name</label>
								<div class="form-group">
									<div class="">
										<select name="product_id" id="input" class="form-control" required="required">
											<option value="">Choose Product</option>
											@foreach($products as $product)
												<option value="{{$product->id}}">{{$product->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Quantity</label>
								<div class="form-group">
									<div class="">
										<select name="quantity" id="quantity" class="form-control" required="required">
											<option value="">Quantity</option>
											@for($i = 1; $i <= 300; $i++)
												<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Price</label>
								<div class="form-group">
									<div class="">
										<input class="form-control" id="price" type="number" name="price">
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Total</label>
								<div class="form-group">
									<div class="">
										<input readonly="" id="total" class="form-control" type="text" name="total">
									</div>
								</div>
							</div>
						</div>
					</div>
					<center>
						<button type="submit" class="btn btn-primary">Save Record</button>
					</center>
				</form>			
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
							<th>Time Recorded</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Maggie</td>
							<td>10</td>
							<td>4000</td>
							<td>40000</td>
							<td>March 2nd 2018</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	@endsection