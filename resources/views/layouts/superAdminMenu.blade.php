{{-- setting --}}
<li>
    <a><i class="fa fa-desktop"></i> ຕັ້ງຄ່າລະບົບ <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li
            class="{{ Request::is('categories') || Request::is('categories/*') || Request::is('editBranch/*') ? 'current-page' : '' }}">
            <a href="/categories">ໝວດໝູ່</a>
        </li>
        <li
            class="{{ Request::is('plans') || Request::is('editPlan/*') || Request::is('planThumbnail/*') || Request::is('planSlideImages/*') || Request::is('floors/*') || Request::is('editFloor/*') || Request::is('rooms/*') || Request::is('editRoom/*') ? 'current-page' : '' }}">
            <a href="/plans">ແບບເຮືອນ</a>
        </li>
        <li class="{{ Request::is('homeSlideImages') ? 'current-page' : '' }}">
            <a href="/homeSlideImages">Home Slide</a>
        </li>
        <li class="{{ Request::is('topSellingSlideImages') ? 'current-page' : '' }}">
            <a href="/topSellingSlideImages">ແບບບ້ານຍອດນິຍົມ</a>
        </li>
        <!-- <li
            class="{{ Request::is('pastWorks') || Request::is('editPastWork/*') || Request::is('pastWorksImages/*') ? 'current-page' : '' }}">
            <a href="/pastWorks">ຜົນງານທີ່ຜ່ານມາ</a>
        </li>
        <li
            class="{{ Request::is('presentWorks') || Request::is('editPresentWork/*') || Request::is('presentWorksImages/*') ? 'current-page' : '' }}">
            <a href="/presentWorks">ຜົນງານປະຈຸບັນ</a>
        </li>
        <li
            class="{{ Request::is('futureWorks') || Request::is('editFutureWork/*') || Request::is('futureWorksImages/*') ? 'current-page' : '' }}">
            <a href="/futureWorks">ຜົນງານໃນອະນາຄົດ</a>
        </li> -->
        <li
            class="{{ Request::is('users') || Request::is('users/*') || Request::is('editUser/*') ? 'current-page' : '' }}">
            <a href="/users">Users</a>
        </li>
    </ul>
</li>
