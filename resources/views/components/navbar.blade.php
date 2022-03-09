<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a href="#app" class="navbar-brand">
            <img src="{{ asset('img/Banner.png') }}" alt="logo" class="img-fluid" width="100" height="100">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('search.category') }}"
                        class="nav-link {{ $title == 'Search Posts Category' ? 'active' : '' }}">Search Category
                        Posts</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('search.title') }}"
                        class="nav-link {{ $title == 'Search Posts Title' ? 'active' : '' }}">Search Title Posts</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ $title == 'About us' ? 'active' : '' }}">About
                        us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('support') }}"
                        class="nav-link {{ $title == 'Help & Support' ? 'active' : '' }}">Help &
                        Support</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            @if (Auth::user()->admin)
                                <a href="{{ route('user.index') }}"
                                    class="dropdown-item {{ $title == 'Manage User' ? 'active' : '' }}">Manage Users</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('category.create') }}"
                                    class="dropdown-item {{ $title == 'Create Category' ? 'active' : '' }}">Create
                                    Category</a>
                                <a href="{{ route('category.index') }}"
                                    class="dropdown-item {{ $title == 'Manage Category' ? 'active' : '' }}">Manage
                                    Category</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.post.list') }}"
                                    class="dropdown-item {{ $title == 'Manage Posts' ? 'active' : '' }}">Manage Posts</a>
                            @endif
                            <a href="{{ route('post.create') }}"
                                class="dropdown-item {{ $title == 'Create Post' ? 'active' : '' }}">Create Post</a>
                            <a href="{{ route('post.list') }}"
                                class="dropdown-item {{ $title == 'Posts List' ? 'active' : '' }}">Posts List</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}"
                                class="dropdown-item {{ $title == '' ? 'active' : '' }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="mx-2 btn btn{{ $title == 'Login' ? '' : '-outline' }}-secondary">Login</a>
                    <a href="{{ route('user.create') }}"
                        class="mx-2 btn btn{{ $title == 'Create new user' ? '' : '-outline' }}-secondary">Sign up</a>
                @endguest
            </ul>
        </div>
    </div>
</nav>
