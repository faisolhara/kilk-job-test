@extends('layouts.master-backend')

@section('title', 'Student')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Student List</div>
            <div class="button-box pull-right" style="padding-bottom:10px;">
                <a href="{{ url('student/add') }}" class="btn btn-primary waves-effect waves-light"> <i class="fa fa-plus m-r-5"></i> <span>Add New Student</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">Num</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $no => $model)
                        <?php 
                    	$createdDate   = new \DateTime($model->created_at);
                    	$publishedDate = !empty($model->published_at) ? new \DateTime($model->published_at) : null;
                    	?>
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->address }}</td>
                            <td>{{ $createdDate->format('d M Y | H:i') }}</td>
                            <td>
                                <a href="{{ url('student/edit/'.$model->id) }}" type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-pencil-alt"></i></a>
                                <a href="{{ url('student/delete/'.$model->id) }}" type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5"><i class="fa fa-remove"></i></a>
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