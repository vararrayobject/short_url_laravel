{{-- 
/**
 * ==================================================================================================
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17
 * @modify date 2021-06-17
 * @desc [description]
 * ==================================================================================================
 */
--}}

<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{route('urls.index')}}" title="Laravel-ACL">
                <span class="brand-name text-truncate">My App</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="">
                    <a class="sidenav-item-link" href="{{route('urls.index')}}">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span class="nav-text">URLs</span>
                    </a>
                </li>
                <li class="">
                    <form action="{{route('logout')}}" id="logout-sidebar" method="post">
                        @csrf
                    </form>
                    <a class="sidenav-item-link" href="javascript:$('#logout-sidebar').submit();" method="post">
                        <i class="mdi mdi-logout"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</aside>