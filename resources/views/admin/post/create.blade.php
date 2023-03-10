@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление статьи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Статьи</a></li>
                        <li class="breadcrumb-item active">Добавление статьи</li>
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
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Статья</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Название статьи" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger">Поле обязательно для заполнения</div>
                            @enderror
                        </div>
                    <div class="form-group col-6">
                        <label for="exampleInputFile">Добавить превью</label>
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
                        <label for="exampleInputFile">Добавить главное изображение</label>
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
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : ''}}>
                                {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group col-12">
                            <textarea id="summernote" name="content" style="display: none;">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">Поле обязательно для заполнения</div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </div>
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
