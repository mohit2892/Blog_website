@extends('layouts.app') {{-- or 'admin.layout' depending on your setup --}}

@section('content')
<div class="container mt-5">
    <h2>Create New Post</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        {{-- Body --}}
        <div class="mb-3">
            <label for="body" class="form-label">Post Content</label>
            <textarea name="body" class="form-control" id="body" rows="5" required></textarea>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (optional)</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
