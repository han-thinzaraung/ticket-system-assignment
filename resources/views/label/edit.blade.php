@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body align-labels-center m-4">

                <h3 class="text-dark mb-3"> Edit label </h3>

                <form action="{{route('label.update' , $label->id)}}" method="post">
                @method('PUT')
                @csrf
               
                <div class="col-auto">
                    <label  class="col-form-label">Label Name<small class="text-danger">*</small></label>
                    <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $label->name }}">

                    @error('name')
                    <div class="text-danger">*{{$message}}</div>
                    @enderror

                </div>
               
                 
                <div class="col-sm mt-3">
                <a href="{{ route('label.index') }}" class="btn btn-outline-dark">Back</a>
                <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>



                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
