@extends('layouts.admin')

@section('title')
Login
@stop

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="email">Email address</label>

        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        
    </div>


    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

</form>
@endsection