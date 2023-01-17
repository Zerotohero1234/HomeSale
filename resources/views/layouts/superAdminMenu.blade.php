{{-- setting --}}
<li><a><i class="fa fa-desktop"></i> ຕັ້ງຄ່າລະບົບ <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li
            class="{{ Request::is('categories') || Request::is('categories/*') || Request::is('editBranch/*') ? 'current-page' : '' }}">
            <a href="/categories">ໝວດໝູ່</a>
        </li>
        <li
            class="{{ Request::is('plans') || Request::is('plans/*') || Request::is('editPlan/*') || Request::is('planThumbnail/*') || Request::is('planSlideImages/*') ? 'current-page' : '' }}">
            <a href="/plans">ແບບເຮືອນ</a>
        </li>
        <li
            class="{{ Request::is('users') || Request::is('users/*') || Request::is('editUser/*') ? 'current-page' : '' }}">
            <a href="/users">Users</a>
        </li>
    </ul>
</li>
