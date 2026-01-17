@extends('layout.layout')

@section("content")
<div class="row">
    <div class="col">
        <h3>Contacts List</h3>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->contact }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection