<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main"
            style="background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);">
            {{-- <nav
                class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
                --}}
                <div class="nav-wrapper">
                    <ul class="navbar-list right">
                        <li style="display: flex; align-items: center;">
                            <span style="margin-right: 10px;">{{ auth()->user()->name }}</span>
                            <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                                data-target="profile-dropdown">
                                <span class="avatar-status avatar-online"
                                    style="display: flex; align-items: center; padding-top: 5px">
                                    <img src="{{ asset('dist/assets/images/avatar/avatar-7.png') }}" alt="avatar"
                                        style="margin-top: -5px;" />
                                </span>
                            </a>
                        </li>
                    </ul>

                    <!-- profile-dropdown-->
                    <ul class="dropdown-content" id="profile-dropdown">
                        <li style="height: 48px;">
                            <a class="grey-text text-darken-1" href="user-profile-page.html"
                                style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                <i class="material-icons" style="margin-right: 8px;">person_outline</i>
                                Profile
                            </a>
                        </li>
                        <li style="height: 48px;">
                            <form method="POST" action="" x-data>
                                @csrf
                                <a href="" @click.prevent="$root.submit();" class="grey-text text-darken-1"
                                    style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <i class="material-icons" style="margin-right: 8px;">keyboard_tab</i>
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>
</header>