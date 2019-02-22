@extends('layouts.master')

@section ('content')

    <div class="col-md-8">

        <h1>Sign In</h1>

        <form method="POST" action="/login">

            {{csrf_field()}}


            <div class="form-group">
                <label for="email">e-mail:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>


            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign In</button>

            </div>

            @include('layouts.errors')

        </form>
    </div>



    @endsection