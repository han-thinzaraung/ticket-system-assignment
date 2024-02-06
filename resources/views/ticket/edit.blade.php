@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body align-tickets-center m-4">

                <h3 class="text-dark mb-3"> Edit Ticket </h3>

                <form action="{{route('ticket.update' , $ticket->id)}}" method="post" >
                @method('PUT')
                @csrf
               
                <div class="col-auto">
                    <label  class="col-form-label">Ticket Title<small class="text-danger">*</small></label>
                    <input type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $ticket->title }}">

                    @error('title')
                    <div class="text-danger">*{{$message}}</div>
                    @enderror

                </div>
                <div class="col-auto">
                    <label  class="col-form-label">Description</label><small class="text-danger">*</small></label>
                    <textarea class="form-control" name="description">{{ $ticket->description }}</textarea>
                </div>

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
                <div class="col-auto">
                    <label for="category_id">Select Category:</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>
                <div class="col-auto">
                    <label for="label_id">Select Label:</label>
                    <select name="label_id" id="label_id" class="form-control @error('label_id') is-invalid @enderror">
                        @foreach($labels as $label)
                            <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endforeach
                    </select>

                    @error('label_id')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>


                 
                <div class="col-sm mt-3">
                <a href="{{ route('ticket.index') }}" class="btn btn-outline-dark">Back</a>
                <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>



                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
