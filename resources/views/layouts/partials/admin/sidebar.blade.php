<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                @if (auth()->user()->is_admin)

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>Blogs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.trashed') }}" class="nav-link">
                            <i class="nav-icon fas fa-trash"></i>
                            <p>Trashed</p>
                        </a>
                    </li>

                @endif

            </ul>
        </nav>

    </div>

</aside>

