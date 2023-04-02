@extends('layouts.main')

@section('content')
    <main class="blog-standard">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Список статей</h1>
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <article class="blog-post wow fadeInUp">
                            <img src="{{ '/storage/' . $post->preview_image }}" alt="blog post" class="post-thumbnail">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <p class="post-date">{{ $post->created_at }}</p>
                                @auth()
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <span> {{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            @if (auth()->user()->likedPosts->contains($post->id))
                                                <i class="fa-solid fa-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span> {{ $post->liked_users_count }}</span>
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <h4 class="post-title">{{ $post->title }}</h4>
                            <p class="post-excerpt">{!! Str::limit($post->content, 250) !!}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="post-permalink">Читать дальше</a>
                        </article>
                    @endforeach
                    {{ $posts->links() }}
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </main>
@endsection
