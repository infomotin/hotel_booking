@extends('admin.dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('admin.teams.create') }}" class="btn btn-primary">Add New Team Member</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">DataTable Example</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">

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
								<thead>
									<tr>
                                        <th>Sl</th>
										<th>Name</th>
										<th>Position</th>
										<th>image</th>
										<th>Facebook</th>
										<th>twitter</th>
										<th>linkedin</th>
										<th>about</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->position }}</td>
                                            <td><img src="{{ (!empty($team->image)) ? asset('upload/teams/'.$team->image) : asset('upload/no_image.jpg') }}" alt="{{ $team->name }}" width="50"></td>
                                            <td>{{ $team->facebook }}</td>
                                            <td>{{ $team->twitter }}</td>
                                            <td>{{ $team->linkedin }}</td>
                                            <td>{{ $team->about }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{ route('admin.teams.edit', $team->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                    <a href="" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="if(confirm('Are you sure you want to delete this team member?')){ event.preventDefault(); document.getElementById('delete-form-{{ $team->id }}').submit();}">
                                                        <i class="bx bx-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $team->id }}" action="{{ route('admin.teams.delete', $team->id) }}" method="POST" style="display: none;">
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