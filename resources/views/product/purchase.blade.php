@extends('layout.master')

	@section('title')
		RECORD PRODUCT SALE
	@endsection

	@section('content')

		<div class="row well">
			<div class="col-lg-6 col-lg-offset-3">
				<form action="" method="POST">
					{{csrf_field()}}
					<legend>Add New Record <a class="btn btn-success btn-sm" data-toggle="modal" href='#new-product'>New Product</a> </legend>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Select Product Name</label>
								<div class="form-group">
									<div class="">
										<select name="product" id="input" class="form-control" required="required">
											<option value="">Choose Product</option>
											@foreach($products as $product)
												<option value="{{$product->id}}">{{$product->name}}</option>
											@endforeach
										</select>
										@if ($errors->has('product')) <p class="help-block" style="color: red">{{ $errors->first('username') }}</p> @endif
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
										@if ($errors->has('quantity')) <p class="help-block" style="color: red">{{ $errors->first('quantity') }}</p> @endif
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
										<input value="{{old('price')}}" class="form-control" id="price" type="number" name="price">
										@if ($errors->has('price')) <p class="help-block" style="color: red">{{ $errors->first('price') }}</p> @endif
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Total</label>
								<div class="form-group">
									<div class="">
										<input readonly="" value="{{old('total')}}" id="total" class="form-control" type="text" name="total">
										@if ($errors->has('total')) <p class="help-block" style="color: red">{{ $errors->first('total') }}</p> @endif
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
						@foreach($purchased as $p)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{ $p->product->name }}</td>
								<td><center>{{ $p->quantity }}</center></td>
								<td>{{ number_format($p->price, 2) }}</td>
								<td>{{ number_format($p->total, 2) }}</td>
								<td>{{ date("M d, Y",strtotime($p->created_at)) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endsection