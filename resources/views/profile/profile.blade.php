@extends('layout.master')

@section('title', 'Profile')

@section('content')
<style>
    .profile-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
    }

    .profile-header {
        margin-bottom: 30px;
    }

    .profile-header h1 {
        color: #333;
        font-size: 2.5em;
        margin-bottom: 20px;
    }

    .profile-image {
        margin-bottom: 30px;
    }

    .profile-image img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .profile-image img:hover {
        transform: scale(1.05);
    }

    .profile-details {
        padding: 20px;
    }

    .profile-details h2 {
        color: #2c3e50;
        font-size: 2em;
        margin-bottom: 15px;
    }

    .profile-details p {
        color: #34495e;
        font-size: 1.1em;
        margin-bottom: 10px;
    }

    .edit-profile-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .edit-profile-btn:hover {
        background-color: #2980b9;
        color: #fff;
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1>User Profile</h1>
    </div>
    
    <div class="profile-image">
        @if (Auth::user()->profile_photo)
            <img src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="Profile Photo">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Photo">
        @endif
    </div>

    <div class="profile-details">
        <h2>{{ Auth::user()->name }}</h2>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <a href="{{ route('profile.edit') }}" class="edit-profile-btn">Edit Profile</a>
    </div>
</div>
@endsection