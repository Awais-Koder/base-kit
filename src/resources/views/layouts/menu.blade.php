<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-header">MISCELLANEOUS</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-plus-square"></i>
        <p>
            Extras
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                    Login & Register v1
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>Login v1</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="pages/examples/lockscreen.html" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>Lockscreen</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-header">To be removed</li>



{{-- <li class="nav-item">
    <a href="{{ route('adm_folder_colors.index') }}"
        class="nav-link {{ Request::is('adm_folder_colors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Adm Folder Colors</p>
    </a>
</li> --}}

{{-- <li class="nav-item">
    <a href="{{ route('adm_category_colors.index') }}"
        class="nav-link {{ Request::is('adm_category_colors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Adm Category Colors</p>
    </a>
</li> --}}

{{-- <li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categories</p>
    </a>
</li> --}}

{{-- <li class="nav-item">
    <a href="{{ route('tags.index') }}" class="nav-link {{ Request::is('tags*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tags</p>
    </a>
</li> --}}
@if(view()->exists('folders.create'))
<li class="nav-item">
    <a href="{{ route('folders.index') }}" class="nav-link {{ Request::is('folders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Folders</p>
    </a>
</li>
@endif
{{-- <li class="nav-item">
    <a href="{{ route('pivot_users_flags.index') }}"
        class="nav-link {{ Request::is('pivot_users_flags*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Pivot Users Flags</p>
    </a>
</li> --}}



@if(auth()->user() && auth()->user()->isSuperUser)
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>Super Admin</p>
    </a>
</li>
@else
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>Not Super Admin</p>
    </a>
</li>
@endif

