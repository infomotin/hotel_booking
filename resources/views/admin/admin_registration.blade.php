<!doctype html>
<html lang="en">
{{ asset('backend/') }}
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{ asset('backend/assets/images/login-images/register-cover.svg') }}" class="img-fluid auth-img-cover-login" width="550" alt=""/>
							</div>
						</div>

					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<img src="{{ asset('backend/assets/images/logo-icon.png') }}" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Rocker Admin</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
                                        <form class="row g-3" action="#" method="POST">
                                            @csrf
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label">User Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}">
                                                @error('phone')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <span class="input-group-text">
                                                        <a href="#"><i class="bx bx-hide"></i></a>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" value="1" {{ old('terms') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="terms">
                                                        I agree to the <a href="#">Terms and Conditions</a> <span class="text-danger">*</span>
                                                    </label>
                                                </div>
                                                @error('terms')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 d-grid">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p class="mb-0">Already have an account? <a href="{{ route('admin.login') }}">Login</a></p>
                                            </div>
                                        </form>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
