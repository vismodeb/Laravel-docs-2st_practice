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
			<div class="col-lg-4">
				
				<div class="card">
					<div class="card-body">
						<div class="row col-sm mt-5">
							<img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('agent/agent_images/'.$profileData->photo) : url('agent/images.jpg') }}" alt="">
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

			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">

						<form method="POST" action="{{ route('agent.update.password') }}" class="forms-sample" enctype="multipart/form-data">
							@csrf

							<h2 class="text-center">Agent Change Password</h2>

							<div class="form-group mt-5">
								<label for="old_password">Old Password</label>
								<input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
							</div>

							<div class="form-group mt-5">
								<label for="new_password">Old Password</label>
								<input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
							</div>

							<div class="form-group mt-5">
								<label for="new_password_confirmation">Confirm New Password</label>
								<input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
							</div>

							<button type="submit" class="btn btn-primary mt-5">Save Change</button>
						</form>

					</div>
				</div>
			</div>

			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>

@endsection