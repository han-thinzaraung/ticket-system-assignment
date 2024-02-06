@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="text-dark mb-3"> Ticket Detail </h3>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Label</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ $ticket->priority }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->category->name }}</td>
                                <td>{{ $ticket->label->name }}</td>
                            </tr>
                        </tbody>     
                    </table>
                    <div class="mb-4">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
