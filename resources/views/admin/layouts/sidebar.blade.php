<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            CT
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                {{-- <img src="../../assets/img/faces/face-2.jpg" /> --}}
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        Chet Faker
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="sidebar-mini">Mp</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="sidebar-mini">Ep</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{request()->routeIs('home') ? 'active' : ''}}">
                <a href="{{route('home')}}">
                    <i class="ti-panel"></i>
                    <p>Dashboard
                    </p>
                </a>
            </li>
            <li class="{{request()->routeIs('roles.*') ? 'active' : ''}}">
                <a href="{{route('roles.index')}}">
                    <i class="ti-panel"></i>
                    <p>Role
                    </p>
                </a>
            </li>
            <li class="{{request()->routeIs('users.*') ? 'active' : ''}}">
                <a href="{{route('users.index')}}" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>User
                    </p>
                </a>
            </li>
            <li class="{{request()->routeIs('products.*') ? 'active' : ''}}">
                <a href="{{route('products.index')}}" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>Product</p>
                </a>

            </li>

            <li class="{{request()->routeIs('categories.*') ? 'active' : ''}}">
                <a href="{{route('categories.index')}}" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>Category
                    </p>
                </a>
            </li>
            <li class="">
                <a href="" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>Coupon

                    </p>
                </a>
            </li>
            <li class="">
                <a href="" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>Order
                    </p>
                </a>
            </li>
        </ul>
    </div>
</div>
