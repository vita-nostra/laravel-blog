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
                            <p class="post-date">{{ $post->created_at }}</p>
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
