<h2 class="text-2xl font-semibold mb-4">
    Comments ({{ $article->comments->count() }})
</h2>

<div class="space-y-6">
    @foreach ($article->comments as $comment)
        <div class="p-4 bg-gray-100 rounded-lg">
            <p class="text-gray-800">{{ $comment->content }}</p>
            <p class="text-sm text-gray-500 mt-2">
                By {{ $comment->user->name }}
                on {{ $comment->created_at->format('M d, Y H:i') }}
            </p>
        </div>
    @endforeach

    @if ($article->comments->isEmpty())
        <p class="text-gray-500">No comments yet.</p>
    @endif
</div>
