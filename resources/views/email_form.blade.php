@extends('Master')
@section('title','Sent E-mail')
@section("content")
<div class="container mt-5"> 
    <h1>Envoyer un email :</h1> 
    @if (session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
    @endif 
    <form action="{{ route('send.email') }}" method="POST"> 
        @csrf 
        <div class="mb-3"> 
            <label for="email" class="form-label">Recipient Email:</label> 
            <input type="email" class="form-control" id="email" name="email" required>             </div> 
        <div class="mb-3"> 
            <label for="subject" class="formlabel">Subject:</label> 
            <input type="text" class="form-control" id="subject" name="subject" required> 
        </div> 
        <div class="mb-3"> 
            <label for="message" class="formlabel">Message:</label> 
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea> 
        </div> 
        <button type="submit" class="btn btn-primary">Send Email</button> 
    </form> 
</div> 

@endsection