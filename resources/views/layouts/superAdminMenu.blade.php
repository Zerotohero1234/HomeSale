{{-- setting --}}
<li><a><i class="fa fa-desktop"></i> ຕັ້ງຄ່າລະບົບ <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li
            class="{{ Request::is('categories') || Request::is('categories/*') || Request::is('editBranch/*') ? 'current-page' : '' }}">
            <a href="/categories">ໝວດໝູ່</a>
        </li>
        <li
            class="{{ Request::is('users') || Request::is('users/*') || Request::is('editUser/*') ? 'current-page' : '' }}">
            <a href="/users">Users</a>
        </li>
        {{-- <li
            class="{{ Request::is('partner') || Request::is('partner/*') || Request::is('editpartner/*') ? 'current-page' : '' }}">
            <a href="/partner">ຫຸ້ນສ່ວນ</a>
        </li>

        @if (Auth::user()->is_owner == 1)
        <li
            class="{{ Request::is('admin') || Request::is('admin/*') || Request::is('editAdmin/*') ? 'current-page' : '' }}">
            <a href="/admin">ແອັດມິນ</a>
        </li>
        @endif --}}
    </ul>
</li>
