<div class="mt-16 max-w-4xl mx-auto px-4" style="margin-left:45%;">

    <!-- Heading -->
    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 flex items-center gap-3">
        💬 Comments <span class="text-base font-medium text-gray-500">({{ $post->comments->count() }})</span>
    </h2>

    <!-- Comment List -->
    <div class="space-y-6">
        @forelse ($post->comments as $comment)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="flex items-start gap-4">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 bg-indigo-600 text-white flex items-center justify-center rounded-full text-lg font-bold">
                            <!-- {{ strtoupper(substr($comment->user->name, 0, 1)) }} -->
                        </div>
                    </div>
                    <!-- Comment content -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <h4 class="text-md font-semibold text-gray-800 dark:text-white">
                                {{ $comment->user->name }}
                            </h4>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400 italic">😶 No comments yet. Be the first to share your thoughts!</p>
        @endforelse
    </div>

    <!-- Comment Form -->
    @auth
        <div class="mt-12">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Leave a Comment</h3>
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="space-y-4">
                @csrf
                <textarea
                    name="body"
                    rows="4"
                    placeholder="What do you think about this post?"
                    required
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white p-4 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none resize-none"
                ></textarea>
                <button
                    type="submit"
                    class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
                >
                     Post Comment
                </button>
            </form>
        </div>
    @else
        <p class="mt-10 text-gray-600 dark:text-gray-400 text-center">
            Please
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-semibold">log in</a>
            to comment.
        </p>
    @endauth
</div>
