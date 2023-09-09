<div>
    <h1>{{ $titulo }}</h1>


    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div class="">
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                    <img src="{{  asset('/uploads/'.$post->imagen) }}" alt="">

                </a>
            </div>
        @endforeach
    </div>


    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>

</div>
