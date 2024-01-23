@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Profile
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <!-- Form to update password -->
            {!! Form::open(['route' => ['edit_profiles.updatePassword', $editProfile->id], 'method' => 'post']) !!}

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <!-- Display Username -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', $email, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <!-- Old Password Field -->
                    <div class="row">

                        <div class="form-group col-sm-6">
                            {!! Form::label('old_password', 'Old Password:') !!}
                            {!! Form::password('old_password', ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <!-- New Password Field -->
                    <div class="row">

                        <div class="form-group col-sm-6">
                            {!! Form::label('new_password', 'New Password:') !!}
                            {!! Form::password('new_password', ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            {!! Form::label('Image', 'Image') !!}
                            {!! Form::file('profile_image', ['class' => 'form-control' , 'id' => 'profile_image']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <img src="" alt="" id="profileimagePreview">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update Password', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
@endsection
