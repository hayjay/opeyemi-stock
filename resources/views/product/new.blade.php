@extends('layout.master')

	@section('title')
		ADD NEW PRODUCT
	@endsection

	@section('content')
		<div class="row well">
			<div class="col-lg-6 col-lg-offset-3">
				<form action="" method="POST">
					<legend>Add New Record</legend>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Product Name</label>
								<div class="form-group">
									<div class="">
										<input class="form-control" type="text" name="product">
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
		</div>
	@endsection