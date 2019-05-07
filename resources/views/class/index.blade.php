@extends('layouts.master-backend')

@section('title', 'Class')

<?php use App\ClassModel; ?>

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Class List</div>
            <div class="button-box pull-right" style="padding-bottom:10px;">
                <a href="{{ url('class/print') }}" target="_blank" class="btn btn-info waves-effect waves-light"> <i class="fa fa-print m-r-5"></i> <span>Print PDF</span></a>
                <a href="{{ url('class/add') }}"  class="btn btn-primary waves-effect waves-light"> <i class="fa fa-plus m-r-5"></i> <span>Add New Class</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">Num</th>
                            <th>Name</th>
                            <th>Desciption</th>
                            <th>Teacher</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $no => $model)
                        <?php 
                        $class         =  ClassModel::find($model->id);
                    	$createdDate   = new \DateTime($model->created_at);
                    	$publishedDate = !empty($model->published_at) ? new \DateTime($model->published_at) : null;
                    	?>
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->description }}</td>
                            <td>{{ $class->teacher->name }}</td>
                            <td>{{ $createdDate->format('d M Y | H:i') }}</td>
                            <td>
                                <a href="{{ url('class/edit/'.$model->id) }}" type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-pencil-alt"></i></a>
                                <a href="{{ url('class/delete/'.$model->id) }}" type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5"><i class="fa fa-remove"></i></a>
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