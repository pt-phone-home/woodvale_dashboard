@extends('layouts.app')

@section('content')
    <div class="bg-dark pb-5 pt-5 vh-100">
        <div class="row">
            <div class="col-md-6 mx-auto card px-4 py-4 rounded">
                <form action="{{route('profile.update')}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <h3 class="mb-4">Enter New Password</h3>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-block text-light" style="background-color: #D0237A" type="submit">Change Password</button>
                    </div>
                    @if(Session('success'))
                        <p class="mt-2 text-success text-capitalize">{{session('success')}}</p>
                    @endif
                    @if(Session('error'))
                        <p class="mt-2 text-danger text-capitalize">{{session('error')}}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
