@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body align-tickets-center m-4">

                <h3 class="text-dark mb-3"> Edit Ticket </h3>

                <form action="{{route('ticket.update' , $ticket->id)}}" method="post" enctype="multipart/form-data">
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
                    <label class="col-form-label">Upload File<small class="text-danger">*</small></label>
                    @foreach ($ticket->ticketFiles as $file)
                    <img src="{{ asset('storage/gallery/'. $file->file_name) }}" alt="{{ $file->file_name }}" style="max-width: 50px; max-height: 50px;" class="m-3">
                    @endforeach
                    <input type="file"  class="form-control mb-3" name="files[]" multiple>

                    @error('file')
                    <div class="text-danger">*{{$message}}</div>
                    @enderror

                </div>


                <div class="col-auto">
                    <label for="priority">Select Priority:</label>
                    <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ $ticket->priority }}">
                            <option value="LOW" @if($ticket->priority == 'LOW') selected @endif>LOW</option>
                            <option value="HIGH" @if($ticket->priority == 'HIGH') selected @endif>HIGH</option>
                    </select>

                    @error('priority')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>

                <div class="col-auto">
                    <label for="status">Select Status:</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ $ticket->status }}">
                            <option value="Open" @if($ticket->status == 'Open') selected @endif>Open</option>
                            <option value="Closed" @if($ticket->status == 'Closed') selected @endif>Closed</option>
                    </select>

                    @error('status')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3 mt-2 col-auto">
                    <label for="role" class="form-label">Categories<small class="text-danger">*</small></label><br>
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" {{ in_array($category->id, $existingLabels) ? 'checked' : '' }}> 
                        <label for="category{{ $category->id }}" class="m-3">{{ $category->name }}</label>
                    @endforeach
                    @error('category')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 mt-2 col-auto">
                    <label for="role" class="form-label">Labels<small class="text-danger">*</small></label><br>
                    @foreach($labels as $label)
                        <input type="checkbox" value="{{ $label->id }}" name="label_id[]" {{ in_array($label->id, $existingLabels) ? 'checked' : '' }}>
                        <label for="label{{ $label->id }}" class="m-3">{{ $label->name }}</label>
                    @endforeach
                </div>

                @if(auth()->user()->role == '0')
                <div class="col-auto">
                    <label for="agent_id">Select Agent To Assign:</label>
                    <select name="agent_id" id="status" class="form-control @error('agent_id') is-invalid @enderror">
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>

                    @error('agent_id')
                        <div class="text-danger">*{{$message}}</div>
                    @enderror
                </div>
                @endif

                {{-- <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}"> --}}

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
