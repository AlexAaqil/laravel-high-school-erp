<aside>
    <div class="brand">
        <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
    </div>

    <ul class="links">
        @php
            $navLinks = [
                ['route' => 'admin.dashboard', 'icon' => 'fas fa-home', 'text' => 'Dashboard'],
                ['route' => 'users.index', 'icon' => 'fas fa-users', 'text' => 'Users'],
                ['route' => 'classes.index', 'icon' => 'fas fa-chalkboard', 'text' => 'Classes'],
                // ['route' => 'users.index', 'icon' => 'fas fa-house-user', 'text' => 'Dorms'],
                ['route' => 'settings.edit', 'icon' => 'fas fa-cogs', 'text' => 'Settings'],
                // ['route' => 'blogs.index', 'icon' => 'fas fa-blog', 'text' => 'Blogs'],
                ['route' => 'user-messages.index', 'icon' => 'fas fa-comment', 'text' => 'Messages'],
            ];
        @endphp

        @foreach($navLinks as $link)
            <li class="link {{ Route::currentRouteName() === $link['route'] ? 'active' : '' }}">
                <a href="{{ $link['route'] ? route($link['route']) : '#' }}">
                    <i class="{{ $link['icon'] }}"></i>
                    <span class="text">{{ $link['text'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="footer">
        <div class="profile">
            <a href="{{ route('profile.edit') }}">
                <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Image">
            </a>
            <span class="text">
                <a href="{{ route('profile.edit') }}">
                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                </a>
                <span>{{ Auth::user()->email }}</span>
            </span>
        </div>

        <div class="logout">
            <form action="{{ route('logout') }}" method="post">
                @csrf

                <button type="submit">
                    <span class="text">Logout</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
