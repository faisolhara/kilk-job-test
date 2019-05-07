@extends('layout.master-backend')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title"></h3>
            <div class="alert alert-info"> <h3 style="color:white;">Selamat Datang Admin Website PT. AR Karyati!!</h3></div>
			<img src="{{ asset('asset-backend/images/dashboard_Fotor.jpg') }}" alt="image" class="img-responsive img-rounded text-center">
	    </div>
    </div>
@endsection