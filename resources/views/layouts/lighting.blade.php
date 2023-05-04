{{-- setting --}}
<li>
    <a><i class="fa fa-desktop"></i> ຕັ້ງຄ່າລະບົບ <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li
            class="{{ Request::is('manageLamps') || Request::is('editLamp/*') || Request::is('lampThumbnail/*') ? 'current-page' : '' }}">
            <a href="/manageLamps">ໂຄມໄຟ</a>
        </li>
        <li class="{{ Request::is('lampCategories') || Request::is('editLampCategory/*') ? 'current-page' : '' }}">
            <a href="/lampCategories">ໝວດໝູ່ໂຄມໄຟ</a>
        </li>
    </ul>
</li>
