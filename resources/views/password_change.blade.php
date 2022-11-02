@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--content start-->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Change Your Password') }}</div>
        
                        <div class="card-body">
                            @if (session()->has('success'))
                                <strong class="text-success">{{session()->get('success')}}</strong>
                            @endif
                            @if (session()->has('error'))
                                <strong class="text-danger">{{session()->get('error')}}</strong>
                            @endif
                            <form action="{{ route('update.password') }}" method="POST">
                            @csrf 
                                <div>
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" placeholder="Current password" value="{{old('current_password')}}" required>
                                </div><br>
                                <div>
                                    <label>Current Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>
                                <div>
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required autocomplete="new-password">
                                </div><br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container mt-4">
    
</div>
@endsection
