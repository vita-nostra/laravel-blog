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
                            <p class="post-excerpt">{{ Str::limit($post->content, 250) }}</p>
                            <a href="#!" class="post-permalink">Читать дальше</a>
                        </article>
                    @endforeach
                    {{ $posts->links() }}
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Тэги</h5>
                        <div class="widget-content">
                            @foreach($tags as $tag)
                                <a href="#!" class="post-tag">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Категории</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach($categories as $category)
                                    <li><a href="#!">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Популярные статьи</h5>
                        <ul class="category-list">
                            @foreach($posts as $post)
                                <a href="#!"><article class="blog-post wow fadeInUp">
                                    <img src="{{ '/storage/' . $post->preview_image }}" alt="blog post"
                                         class="post-thumbnail">
                                    <h4 class="post-title">{{ $post->title }}</h4>
                                </article>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
