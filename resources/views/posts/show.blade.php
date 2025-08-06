{{-- Post Details --}}
<h1 class="text-2xl font-bold" style="text-align:center;">{{ $post->title }}</h1>
<p class="mb-6" style="text-align:center;">{{ $post->body }}</p>

{{-- ivewire Comments connect --}}
<livewire:post-comments :post="$post" />





