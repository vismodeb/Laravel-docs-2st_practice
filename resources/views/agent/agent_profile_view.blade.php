@extends('agent.agent_dashboard')
@section('agent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2">
				<h2>Profile</h2>
			</div>
			<div class="col-lg-8"></div>
			<div class="col-lg-2">
				<h5>New add</h5>
			</div>
		</div>
		<!-- <hr> -->

		<div class="row">
			<div class="col-lg-6 d-flex justify-content-center">
				
				<div class="card">
					<div class="card-body">
						<div class="row col-sm mt-5">
							<img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('agent/agent_images/'.$profileData->photo) : url('agent/images.jpg') }}" alt="">
							<!-- <span class="h4 ms-3">{{ $profileData->username }}</span> -->
						</div>
						<div class="row col-sm mt-3">
							<b>Name : </b>&nbsp;
							<p>{{ $profileData->name }}</p>
						</div>
						<div class="row col-sm">
							<b>Email : </b>&nbsp;
							<p>{{ $profileData->email }}</p>
						</div>
						<div class="row col-sm">
							<b>Phone : </b>&nbsp;
							<p>{{ $profileData->phone }}</p>
						</div>
						<div class="row col-sm mt-3">
							<b>Address : </b>&nbsp;
							<p>{{ $profileData->address }}</p>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">

						<form method="POST" action="{{ route('agent.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
							@csrf

							<h2 class="text-center">Profile Upadate</h2>

							<div class="form-group mt-5">
								<label for="name">UserName</label>
								<input type="text" name="username" class="form-control" id="username" value="{{ $profileData->username }}">
							</div>

							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" id="name" value="{{ $profileData->name }}">
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" id="email" value="{{ $profileData->email }}">
							</div>

							<div class="form-group">
								<label for="phone">Phone Number</label>
								<input type="text" name="phone" class="form-control" id="phone" value="{{ $profileData->phone }}">
							</div>

							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" class="form-control" id="address" value="{{ $profileData->address }}">
							</div>

							<div class="form-group">
								<label for="photo" class="form-label">Photo</label>
								<input type="file" name="photo" class="form-control" id="image">
							</div>

							<div class="form-group">
								<label for="photo" class="form-label"></label>
								<img id="showImage" class="wd-50 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('agent/agent_images/'.$profileData->photo) : url('agent/images.jpg') }}" alt="profile">
							</div>

							<button type="submit" class="btn btn-primary mt-5">Update</button>
						</form>

					</div>
				</div>
			</div>

			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection