@extends('admin.dashboard')
@section('admin')
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Booked Areas</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Booked Area</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!-- $table->string('image');
            $table->string('short_title')->nullable();
            $table->string('main_title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('link_url')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->unsignedBigInteger('created_by')->nullable(); -->

				<div class="row">
                    <div class="col-lg-12 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Edit Book Area</h5>
							</div>
                            <form action="{{ route('admin.book_areas.update', $bookArea->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                            <div class="card-body p-4">
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
                                    <label for="short_title" class="col-sm-3 col-form-label">Short Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="short_title" name="short_title" placeholder="Short Title" value="{{ old('short_title',$bookArea->short_title) }}">
                                        @error('short_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="main_title" class="col-sm-3 col-form-label">Main Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="main_title" name="main_title" placeholder="Main Title" value="{{ old('main_title',$bookArea->main_title) }}">
                                        @error('main_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_description" class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Short Description" value="{{ old('short_description',$bookArea->short_description) }}">
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description',$bookArea->description) }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="link_url" class="col-sm-3 col-form-label">Link URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="link_url" name="link_url" placeholder="Link URL" value="{{ old('link_url',$bookArea->link_url) }}">
                                        @error('link_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="status" name="status">
                                            <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                                            <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
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
