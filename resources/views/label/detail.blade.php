@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="text-dark mb-3"> Label Detail </h3>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Label Name</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $label->name }}</td>
                            </tr>
                        </tbody>     
                    </table>
                    <div class="mb-4">
                        <a href="{{ route('label.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
