@extends('layouts.master-backend')

@section('title', $title)

<?php use App\ClassModel; ?>

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">{{ $title }}</h3>
            <br>
            <form class="form-horizontal" method="POST" action="{{ url('class/save') }}">
                <div class="form-group m-b-0">
                    <div class="col-sm-12 pull-right">
                        <a href="{{ url('class') }}" class="btn btn-warning"> <i class="fa fa-undo"></i> Back </a>
                        <button type="submit" class="btn btn-info" name="btnsave" value="submit"> <i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
                <br>
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control" value="{{ $model->id }}" >
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-12">Class Name*</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value="{{ count($errors) > 0 ? old('name') : $model->name }}" >
                        @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label class="col-md-12">Description</label>
                    <div class="col-md-12">
                        <textarea class="form-control my-editor" rows="3" name="description">{{ count($errors) > 0 ? old('description') : $model->description }}</textarea>
                        @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('teacher') ? 'has-error' : '' }}">
                    <label for="teacher" class="col-sm-12">Teacher*</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="teacher" name="teacher">
                            <?php $teacherId = count($errors) > 0 ? old('teacher') : $model->teacher_id; ?>
                            <option value="">Select Teacher</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $teacherId ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('teacher'))
                        <span class="help-block">{{ $errors->first('teacher') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('students') ? 'has-error' : '' }}">
                    <label for="students" class="col-sm-12">Student</label>
                    <div class="col-sm-12">
                        <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose" name="students[]">
                            <?php
                            $studentIds = []; 
                            foreach ($model->studentClass as $studentClass) {
                                $studentIds [] = $studentClass->student_id;
                            }
                            ?>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ in_array($student->id, $studentIds) ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        @if($errors->has('student'))
                        </select>

                        <span class="help-block">{{ $errors->first('students') }}</span>
                        @endif
                    </div>
                </div>

                    
            </form>
        </div>
    </div>
</div>
<!--./row-->
@endsection


@section('script')
@parent
<script>
    jQuery(document).ready(function() {
        $(".select2").select2();
    });
</script>
    
@endsection
    