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
        <h3>Create contact</h3>
    </div>
</div>
<ul>
    @foreach($errors as $error)
        <li class="text-danger">{{ $error[0] }}</li>
    @endforeach

<div class="row">
    <div class="col">
        <form action="{{route('contacts.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection