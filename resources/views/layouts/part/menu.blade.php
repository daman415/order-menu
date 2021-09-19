<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                  <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5">{{auth()->user()->name}}</span>
              </a>
              <hr>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page" href="/home">
                    <span class="fa fa-home"></span>
                    Dashboard
                </a>
            </li>
            @if (Auth::user()->role == 'manager')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}" href="/user">
                    <span class="fa fa-user"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('menu*')) ? 'active' : '' }}" href="/menu">
                    <span class="fa fa-cutlery"></span>
                    Menu
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'pelayan')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('order*')) ? 'active' : '' }}" href="/order"">
                    <span class="fa fa-shopping-cart"></span>
                    Orders
                </a>
            </li>
            @endif
            @if ((Auth::user()->role == 'pelayan') || (Auth::user()->role == 'kasir'))
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('pesanan*')) ? 'active' : '' }}" href="/pesanan">
                    <span class="fa fa-list"></span>
                    Data Pesanan
                </a>
            </li>
            @endif
            @if ((Auth::user()->role == 'pelayan') || (Auth::user()->role == 'manager'))
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('rekap*')) ? 'active' : '' }}" href="/rekap">
                    <span class="fa fa-archive"></span>
                    Rekap Orderan
                </a>
            </li>
            @endif
        </ul>
        
    </div>
</nav>