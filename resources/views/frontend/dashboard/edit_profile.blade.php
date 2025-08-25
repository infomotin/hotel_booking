@extends('frontend.main_master')
@section('main')
<!-- Inner Banner -->
<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>User Dashboard </li>
            </ul>
            <h3>User Dashboard</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->
<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.layout.sidebar')
            </div>


            <div class="col-lg-9">
                <div class="service-article">


                    <section class="checkout-area pb-70">
                        <div class="container">
                            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">User Profile </h3>

                                            <div class="row">

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>User Name <span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="required">*</span></label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                                    </div>
                                                </div>



                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>User Profile <span class="required">*</span></label>
                                                        <input type="file" class="form-control" name="photo" accept="image/*" onchange="previewImage(event)">
                                                    </div>
                                                    <div class="mt-3">
                                                        <img id="profileImagePreview"
                                                            src="{{ !empty($user->photo) ? asset('upload/user_images/' . $user->photo) : asset('upload/no_image.jpg') }}"
                                                            alt="Profile Image"
                                                            class="rounded" style="width: 120px; height: 120px; object-fit: cover;">
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-danger">Save Changes </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </section>

                </div>
            </div>


        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<!-- Service Details Area End -->
@endsection