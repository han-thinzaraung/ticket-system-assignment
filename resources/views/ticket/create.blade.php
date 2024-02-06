@extends('dashboard.index')
 
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create Ticket </h3>

                    <form action="{{ route('ticket.store') }}" method="post">
                        @csrf
                    
                        <div class="col-auto">
                            <label  class="col-form-label">Ticket Title<small class="text-danger">*</small></label>
                            <input type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                            @error('title')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label  class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
                        </div>

                        {{-- <div class="col-auto">
                            <label  class="col-form-label">File</label><small class="text-danger">*</small></label>
                            <input type="file"  class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">

                            @error('file')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div> --}}

                        <div class="col-auto">
                            <label for="priority">Select Priority:</label>
                            <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                                    <option value="LOW">LOW</option>
                                    <option value="HIGH" selected>HIGH</option>
                            </select>

                            @error('priority')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label for="status">Select Status:</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                            </select>

                            @error('status')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        {{-- <div class="col-auto">
                            <label for="user_id">Select User:</label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-auto">
                            <label for="category_id">Select Category:</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach($categories as $category)
                                    <option {{ $category->name }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
 
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div> --}}
                        @foreach($categories as $category)
                        <div class="col-auto m-2 form-check d-inline-block">
                            <input type="checkbox" class="form-check-input" id="categoryCheckBox" name="categoryCheckBox">
                            <label class="form-check-label" for="categoryCheckBox">{{ $category->name }}</label>
                        </div>
                        @endforeach
                        
                        @foreach($labels as $label)
                        <div class="col-auto m-2 form-check d-inline-block">
                            <input type="checkbox" class="form-check-input" id="labelCheckBox" name="labelCheckBox">
                            <label class="form-check-label" for="labelCheckBox">{{ $label->name }}</label>
                        </div>
                        @endforeach

                       
                        <div class="col-sm mt-3">
                        <a href="{{ route('ticket.index') }}" class="btn btn-outline-dark">Back</a>
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