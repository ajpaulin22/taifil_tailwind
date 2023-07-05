
<div id="header" class="header navbar-default">

    <div class="navbar-header">
        <a href="/admin" class="navbar-brand"><img src="{{url("images/tf logo.png")}}" alt="" class="mr-2"> Tai-Fil Manpower Services Corp. </a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>

        </button>
    </div>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline">{{ Auth::user()->firstname }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                    {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>

</div>