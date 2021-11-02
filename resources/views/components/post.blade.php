@props(['post' => $post])

<div class="mb-4">
    {{-- post user and time --}}
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    {{-- post content --}}
    {{-- <p class="mb-2">{{ $post->body }}</p> --}}
    <p><a href="{{ route('posts.show', $post) }}" class="mb-2">{{ $post->body }}</a></p>
    {{-- post like and unlike --}}
    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-2">
                @csrf
                <button type="submit" class="text-blue-500 text-sm">Like</button>
            </form>
            @else
            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500 text-sm">Unlike</button>
            </form>
            @endif

            {{-- delete post button --}}
            {{-- @if ($post->ownedBy(auth()->user())) --}}

            {{-- THIS IS USING POLICY --}}
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 mr-4">Delete</button>
                </form>
            @endcan

            {{-- @endif --}}

        @endauth
        {{-- diplay the likes count --}}
        <span class="text-sm">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>