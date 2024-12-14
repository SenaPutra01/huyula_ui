<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper" style="display: flex; align-items: center; padding-top:35px">
            <a class="brand-logo darken-1" href="index.html" style="display: flex; align-items: center;">
                <img src="{{ asset('dist/assets/images/logo/telkomsel-seeklogo.svg') }}" alt="materialize logo"
                    style="width: 40px; height: 40px;" />
                <span class="logo-text hide-on-med-and-down" style="margin-left: 10px;">Analysis</span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">
        <x-nav-link :active="request()->routeIs('dashboard')" href="/dashboard"><i
                class="material-icons">dashboard</i><span data-i18n="eCommerce">Dashboard</span>
        </x-nav-link>

        <li class="navigation-header">
            <a class="navigation-header-text">PRODUCT MANAGEMENT </a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        {{-- <x-nav-link :active="request()->routeIs('reporting')" href="/reporting"><i
                class="material-icons">insert_drive_file</i><span data-i18n="eCommerce">Reporting</span>
        </x-nav-link> --}}
        <x-nav-link :active="request()->routeIs('product-catalog')" href="/product-catalog"><i
                class="material-icons">view_list</i><span data-i18n="eCommerce">Product Catalog</span>
        </x-nav-link>

        <li class="navigation-header">
            <a class="navigation-header-text">SUBSCRIPTION MANAGEMENT</a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <x-nav-link :active="request()->routeIs('subscription')" href="/subscription"><i
                class="material-icons">receipt</i><span data-i18n="eCommerce">Subcription</span>
        </x-nav-link>

        <li class="navigation-header">
            <a class="navigation-header-text">Reporting</a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i
                    class="material-icons">insert_drive_file</i><span class="menu-title"
                    data-i18n="User">Reporting</span><span
                    class="badge badge pill purple float-right mr-10">3</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <x-nav-link :active="request()->routeIs('reporting.report-portal')" href="/reporting/portal"><i
                            class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Report
                            Portal</span>
                    </x-nav-link>
                    <x-nav-link :active="request()->routeIs('reporting.report-digiport')" href="/reporting/digiport"><i
                            class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Report
                            Digiport</span>
                    </x-nav-link>
                    <x-nav-link :active="request()->routeIs('reporting.report-softcancel')"
                        href="/reporting/softcancel"><i class="material-icons">radio_button_unchecked</i><span
                            data-i18n="eCommerce">Report
                            softcancel</span>
                    </x-nav-link>
                </ul>
            </div>
            <x-nav-link :active="request()->routeIs('logs')" href="/logs"><i class="material-icons">assessment</i><span
                    data-i18n="eCommerce">Log Activity</span>
            </x-nav-link>
        </li>

        <li class="navigation-header">
            <a class="navigation-header-text">USER & SETTINGS </a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <x-nav-link :active="request()->routeIs('profile')" href="/profile"><i
                class="material-icons">person_outline</i><span data-i18n="eCommerce">Profile</span>
        </x-nav-link>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i
                    class="material-icons">face</i><span class="menu-title" data-i18n="User">User</span><span
                    class="badge badge pill purple float-right mr-10">3</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <x-nav-link :active="request()->routeIs('manageUser')" href="/manageUser"><i
                            class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List
                            User</span>
                    </x-nav-link>
                    <li>
                        <a href="page-users-list.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="List">List</span></a>
                    </li>
                    {{-- <li>
                        <a href="page-users-view.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="View">View</span></a>
                    </li>
                    <li>
                        <a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Edit">Edit</span></a>
                    </li> --}}
                </ul>
            </div>
        </li>


        <li class="navigation-header">
            <a class="navigation-header-text">Configuration Menu </a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <x-nav-link :active="request()->routeIs('configuration.menu')" href="/configuration/menu"><i
                class="material-icons">person_outline</i><span data-i18n="eCommerce">Menu</span>
        </x-nav-link>
    </ul>

    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
        href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>