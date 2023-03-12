@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование статьи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Статьи</a></li>
                        <li class="breadcrumb-item active">Редактирование статьи</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Статья</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Название статьи" value="{{ $post->title }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputFile">Изменить превью</label>
                        <div class="w-25">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50 mb-2">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputFile">Изменить главное изображение</label>
                        <div class="w-25">
                            <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-50 mb-2">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>Выберите категорию</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? ' selected' : ''}}>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <textarea id="summernote" name="content" style="display: none;">{{ $post->content }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выберите тэги</label>
                        <select class="select2 select2-hidden-accessible" multiple="" name="tag_ids[]" data-placeholder="Тэги" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}>
                                    {{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Изменить</button>
                    <!-- /.card-body -->
                </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
