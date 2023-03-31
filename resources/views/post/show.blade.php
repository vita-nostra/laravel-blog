@extends('layouts.main')

@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <img src="{{ '/storage/' . $post->main_image }}" alt="blog post" class="post-featured-image">
                        <p class="post-date">{{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }}</p>
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
                    <div class="comment-section wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <h5 class="section-title">Комментарии</h5>
                        <form action="POST" class="oleez-comment-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="content">*Сообщение</label>
                                    <textarea name="content" id="content" rows="10" class="oleez-textarea" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </main>
@endsection
