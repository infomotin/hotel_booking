@extends('admin.dashboard')
@section('admin')
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Teams</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Validations</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				                      <!-- $table->string('name');
            $table->string('position');
            $table->string('image')->nullable();
            //social media links
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            //about
            $table->text('about')->nullable();
            //description
            $table->text('description')->nullable(); -->

				<div class="row">
                    <div class="col-lg-12 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Edit Team Member</h5>
							</div>
                            <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body p-4">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name', $team->name) }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="position" class="col-sm-3 col-form-label">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" value="{{ old('position', $team->position) }}">
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="preview-image" src="#" alt="Preview" class="img-thumbnail d-none" style="max-width: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#image').change(function(e) {
                                            const file = e.target.files[0];
                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    $('#preview-image').attr('src', e.target.result).removeClass('d-none');
                                                }
                                                reader.readAsDataURL(file);
                                            } else {
                                                $('#preview-image').addClass('d-none').attr('src', '#');
                                            }
                                        });
                                    });
                                </script>
                                <div class="row mb-3">
                                    <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Facebook URL" value="{{ old('facebook', $team->facebook) }}">
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Twitter URL" value="{{ old('twitter', $team->twitter) }}">
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="linkedin" class="col-sm-3 col-form-label">LinkedIn</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn URL" value="{{ old('linkedin', $team->linkedin) }}">
                                        @error('linkedin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="about" class="col-sm-3 col-form-label">About</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="about" name="about" rows="3" placeholder="About">{{ old('about', $team->about) }}</textarea>
                                        @error('about')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description', $team->description) }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
						</div>
					</div>
				</div>
				<!--end row-->


			</div>

@endsection