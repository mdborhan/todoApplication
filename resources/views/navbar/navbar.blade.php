<nav class="navbar navbar-toggleable-md">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
            <span>
                <i class="fa fa-code-fork"></i>
            </span>
    </button>

    <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
            <span>
               <i class="fa fa-align-justify"></i>
            </span>
    </button>

    <a class="navbar-brand logo" href="#">
        {{--        <img src="assets/img/logo.png" alt="Modish">--}}
        <p class="text-white">Admin</p>
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                <span>
                    <i class="fa fa-align-justify"></i>
                </span>
        </button>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
{{--                <a href="{{ route('/') }}" target="_blank" class="nav-link btn btn-success ">Visit Site</a>--}}
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-has-after" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <img src="assets/img/default-user.jpg" alt="" class="user-img"> Admin
                </a>
{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </div>--}}
            </li>
        </ul>
    </div>
</nav>
