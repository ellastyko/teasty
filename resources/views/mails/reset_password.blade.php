@extends('layouts.email')

@section('content')
    <p>Hello {{ $user->name }}</p>
    <a href="{{ $resetLink  }}" target="_blank">Reset password</a>
@endsection
