@extends('dashboard.index')
 
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create User </h3>

                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                    
                        <div class="col-auto">
                            <label  class="col-form-label">User Name<small class="text-danger">*</small></label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                            @error('name')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div>
                        <div class="col-auto">
                            <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                            @error('password')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div>

                        <div class="col-auto">
                            <label for="role">Select Role:<small class="text-danger">*</small></label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="2">Regular User</option>
                                    <option value="1">Agent</option>
                            </select>

                            @error('role')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div>

                        <div class="col-auto">
                            <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                            <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                            @error('password')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div>

                       
                        <div class="col-sm mt-3">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div> 

                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection