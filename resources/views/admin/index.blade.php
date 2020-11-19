@extends('layouts.master')

@section('content')


	<div class="">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Add Admin
	   </button>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">All Users</h3>
			</div>

			<div class="box-body">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Modify</th>
						</tr>
						
					</thead>

					<tbody>

						@foreach($users as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									<button class="btn btn-info" data-mytitle="{{$user->email}}" data-mydescription="{{$user->password}}" data-catid={{$user->id}} data-toggle="modal" data-target="#edit">Edit</button>
									
									<button class="btn btn-danger" data-catid={{$user->id}} data-toggle="modal" data-target="#delete">Delete</button>
								</td>
							</tr>

						@endforeach
					</tbody>


				</table>				
			</div>
		</div>
	</div>



	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Admin </h4>
      </div>
      <form action="{{route('admin.store')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('admin.form_add')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Admin </h4>
      </div>
      <form action="{{route('admin.update')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="category_id" id="cat_id" value="">
				@include('admin.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('admin.destroy')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="category_id" id="cat_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>


@endsection