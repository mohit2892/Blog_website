<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            👋 Hello, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <x-slot name='body'>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Welcome Card --}}
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl p-8 text-center">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    🌍 Welcome to Blog World
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                    Express your thoughts, share your stories, and inspire others through writing.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('posts.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition">
                        ➕ Create New Post
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl transition">
                        📄 View All Posts
                    </a>
                </div>
            </div>

            {{-- Optional Section: Featured Posts or Stats --}}
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
                    📢 What’s New?
                </h3>
                <ul class="list-disc ml-5 text-gray-600 dark:text-gray-300 space-y-2">
                    <li>Start creating your own articles to share with the world.</li>
                    <li>Engage with other users by commenting on their posts.</li>
                    <li>Stay tuned for more features in the future!</li>
                </ul>
            </div>

        </div>
    </div>
</x-slot>
</x-app-layout>
