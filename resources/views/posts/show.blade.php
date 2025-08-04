<div>

<h2 class="text-xl font-bold mt-10">Comments</h2>

{{-- Show Comments --}}
@forelse($post->comments as $comment)
    <div class="mt-4 p-4 bg-gray-100 rounded">
        <strong>{{ $comment->user->name }}</strong> said:
        <p>{{ $comment->body }}</p>
        <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
    </div>
@empty
    <p class="text-gray-500 mt-4">No comments yet.</p>
@endforelse

{{-- Comment Form --}}
@auth
    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-6">
        @csrf
        <textarea name="body" rows="4" class="w-full border rounded p-2" placeholder="Write a comment..." required></textarea>
        <button type="submit" class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded">
            💬 Post Comment
        </button>
    </form>
@else
    <p class="mt-4">Please <a href="{{ route('login') }}" class="text-indigo-600 underline">log in</a> to comment.</p>
@endauth

    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
</div>
