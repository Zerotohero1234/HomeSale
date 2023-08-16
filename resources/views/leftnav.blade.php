<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title text-center"><span>Admin Dashboard</span></a>
        </div>

        <div class="clearfix"></div>

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                {{-- <h3>General</h3> --}}
                <ul class="nav side-menu">
                    @if (Auth::user()->lamp == 1)
                        @include('layouts.lighting')
                    @else
                        @include('layouts.superAdminMenu')
                    @endif
                </ul>
            </div>

        </div>
    </div>
</div>
