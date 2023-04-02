<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('main.index') }}" class="brand-link">
        <img src="{{ asset('assets/images/logo-l.png') }}" style="width: 200px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('personal.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.liked.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>Понравившиеся рецепты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comment.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>Комментарии</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
