@extends('layout.layout')

@section("content")
    <div class="row">
        <div class="col">
            <h3>{{$contact->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ $contact->contact }}</td>
                </tr>
            </table>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('contacts.delete', ['id' => $contact->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</a>
        </div>
    </div>
    <a href="{{ route('contacts.list') }}" class="btn btn-secondary">Back</a>
@endsection