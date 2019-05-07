@extends('layouts.master-backend')

@section('title', $title)

<?php use App\Teacher; ?>

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">{{ $title }}</h3>
            <br>
            <form class="form-horizontal" method="POST" action="{{ url('teacher/save') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control" value="{{ $model->id }}" >
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-12">Teacher Name</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value="{{ count($errors) > 0 ? old('name') : $model->name }}" >
                        @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <textarea class="form-control my-editor" rows="3" name="address">{{ count($errors) > 0 ? old('address') : $model->address }}</textarea>
                        @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 pull-left">
                        <a href="{{ url('teacher') }}" class="btn btn-warning"> <i class="fa fa-undo"></i> Back </a>
                        <button type="submit" class="btn btn-info" name="btnsave" value="submit"> <i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--./row-->
@endsection
    