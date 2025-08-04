@extends('layouts.app')

@section('content')
<h1>Contact Us</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    <input type="text" name="name" placeholder="Your Name" required><br><br>
    <input type="email" name="email" placeholder="Your Email" required><br><br>
    <textarea name="message" placeholder="Your Message" rows="5" required></textarea><br><br>
    <button type="submit">Send Message</button>
</form>
@endsection
