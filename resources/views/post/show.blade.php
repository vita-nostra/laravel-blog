@extends('layouts.main')

@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <img src="{{ '/storage/' . $post->main_image }}" alt="blog post" class="post-featured-image">
                        <div class="d-flex flex-row justify-content-between">
                        <p class="post-date">{{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }}</p>
                        @auth()
                            <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                    @if (auth()->user()->likedPosts->contains($post->id))
                                        <i class="fa-solid fa-heart"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @endauth
                        </div>
                    </div>
                    <div class="post-content wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        {!! $post->content !!}
                    </div>
                    <div class="post-tags wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tag.index', $tag->id) }}" class="post-tag">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                    <div class="post-navigation wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <button class="btn prev-post"> Предыдущая статья</button>
                        <button class="btn next-post"> Следующая статья</button>
                    </div>
                    <h5 class="section-title mb-3">Комментарии ({{ $post->comments->count() }})</h5>
                    <div class="row">
                        @foreach($post->comments as $comment)
                            <div class="col-lg-12 mb-12 mb-lg-0 card-comments mt-3">
                                <div class="card-comment" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="comment-text">
                                        <span class="post-category"><b>{{ $comment->user->name }}</b></span> {{ $comment->dateAsCarbon->diffForHumans() }}
                                    </div>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @auth()
                        <div class="comment-section wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post" class="oleez-comment-form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="content">*Сообщение</label>
                                        <textarea name="content" id="content" rows="10" class="oleez-textarea" required=""></textarea>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-submit">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endauth
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </main>
@endsection
