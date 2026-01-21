@extends('layout.layout')

<?php 
    $errors = [];
    if (session()->has('errors')) {
        $errors = session()->get('errors')->getMessages();
    }
    
?>
@section("content")
<div class="row">
    <div class="col">
        <h3>Edit Contact</h3>
    </div>
</div>
<ul>
    @foreach($errors as $error)
        <li class="text-danger">{{ $error[0] }}</li>
    @endforeach

<div class="row">
    <div class="col">
        <form action="{{route('contacts.update', ['id' => $contact->id])}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ $contact->contact }}">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <hr>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('contacts.list') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection