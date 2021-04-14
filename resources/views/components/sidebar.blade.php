<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Admin Binusa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($userrole as $ur)
            <ul class="sidebar-menu">
                <li class="menu-header">
                    @if ($ur->model_id == auth()->user()->id)
                        @foreach ($role as $r)
                            @if ($r->id == $ur->role_id)
                                {{ $r->name }}
                            @endif
                        @endforeach
                    @endif
                </li>
                @foreach ($menu as $m)
                    @if ($m->role_id == $ur->role_id)
                        <li class="{{ Request::routeIs($m->route) ? 'active' : '' }}">
                            <a href="{{ route($m->route) }}" class="nav-link">
                                <i class="{{ $m->icon }}"></i>
                                <span>{{ $m->menu }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endforeach
        <ul class="sidebar-menu">
            <li class="menu-header">
                Logout
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="font-black nav-link" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>
            </li>
        </ul>
    </aside>
</div>
