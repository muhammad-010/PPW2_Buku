@extends('layout.master')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter Name...">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="profile_photo" class="col-md-4 col-form-label text-md-end text-start">Profile Photo</label>
                        <div class="col-md-6">
                            @if ($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail mb-2" style="width: 100px; height: 100px;">
                            @endif
                            <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo">
                            @if ($errors->has('profile_photo'))
                                <span class="text-danger">{{ $errors->first('profile_photo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
