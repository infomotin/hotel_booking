@extends('admin.dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Room Types</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Room Types</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.room_types.create') }}" class="btn btn-primary">Add New Room Type</a>
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

                    <!-- $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('icon')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->unsignedBigInteger('created_by')->nullable(); -->
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roomTypes as $roomType)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $roomType->name }}</td>
                            <td>{{ $roomType->description }}</td>
                            <td>{{ $roomType->price }}</td>
                            <td><i class="{{ $roomType->icon }}"></i></td>
                            <td>{{ $roomType->status }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('admin.room_types.edit', $roomType->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="if(confirm('Are you sure you want to delete this room type?')){ event.preventDefault(); document.getElementById('delete-form-{{ $roomType->id }}').submit();}">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $roomType->id }}" action="{{ route('admin.room_types.delete', $roomType->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" style="display: none;"></button>
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