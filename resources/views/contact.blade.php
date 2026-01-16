@extends('layouts.app')

@section('content')
<h1>Contact Me</h1>

<form method="POST" action="#">
    @csrf
    <input type="text" placeholder="Your Name"><br><br>
    <input type="email" placeholder="Your Email"><br><br>
    <textarea placeholder="Your Message"></textarea><br><br>
    <button type="submit">Send</button>
</form>
@endsection
