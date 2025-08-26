@extends('admin.dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Booking Areas</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Booking Areas</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.book_areas.create') }}" class="btn btn-primary">Add New Booking Area</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">DataTable Example</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">

                    <!-- $table->string('image');
            $table->string('short_title')->nullable();
            $table->string('main_title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('link_url')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->unsignedBigInteger('created_by')->nullable(); -->
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Short Title</th>
                            <th>Main Title</th>
                            <th>Short Description</th>
                            <th>Description</th>
                            <th>Link URL</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookAreas as $bookArea)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ (!empty($bookArea->image)) ? asset('upload/book_areas/'.$bookArea->image) : asset('upload/no_image.jpg') }}" alt="{{ $bookArea->short_title }}" width="50"></td>
                            <td>{{ $bookArea->short_title }}</td>
                            <td>{{ $bookArea->main_title }}</td>
                            <td>{{ $bookArea->short_description }}</td>
                            <td>{{ $bookArea->description }}</td>
                            <td>{{ $bookArea->link_url }}</td>
                            <td>{{ $bookArea->status }}</td>
                            
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('admin.book_areas.edit', $bookArea->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="if(confirm('Are you sure you want to delete this book area?')){ event.preventDefault(); document.getElementById('delete-form-{{ $bookArea->id }}').submit();}">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $bookArea->id }}" action="{{ route('admin.book_areas.delete', $bookArea->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
@endsection