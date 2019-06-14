@include('back-end.auth.layouts.header')

@component('back-end.auth.form', ['routeName' => route('login')])
    {{-- @slot('form')
        
    @endslot --}}
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            @error('email')
            
             <div class="alert alert-danger">
                 <p>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </p>
            </div>
            @enderror

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">
                <p>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </p>
            </div>
            @enderror
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" name="remember" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    
    
    <a href="{{ route('password.request') }}">Forgot My Password</a><br>
@endcomponent
@include('back-end.auth.layouts.footer')