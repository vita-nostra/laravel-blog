<div class="col-md-4">
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title">Тэги</h5>
        <div class="widget-content">
            @foreach($tags as $tag)
                <a href="{{ route('tag.index', $tag->id) }}" class="post-tag">{{ $tag->title }}</a>
            @endforeach
        </div>
    </div>
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title">Категории</h5>
        <div class="widget-content">
            <ul class="category-list">
                @foreach($categories as $category)
                    <li><a href="{{ route('category.index', $category->id) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
