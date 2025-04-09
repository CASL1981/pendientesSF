<ul class="navbar-nav iq-main-menu"  id="sidebar">
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('pharmacy'))}}" aria-current="page" href="{{route('pharmacy')}}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Dashboard</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                    <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                    <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Menu Style</span>
            <i class="right-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </i>
        </a>
        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar">
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.horizontal'))}}" href="{{route('menu-style.horizontal')}}">
                  <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                  <i class="sidenav-mini-icon"> H </i>
                  <span class="item-name"> Horizontal </span>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.dualhorizontal'))}}" href="{{route('menu-style.dualhorizontal')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> D </i>
                    <span class="item-name">Dual Horizontal</span>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.dualcompact'))}}" href="{{route('menu-style.dualcompact')}}">
                    <i class="icon svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> D </i>
                    <span class="item-name">Dual Compact</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.boxed'))}}" href="{{route('menu-style.boxed')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> B </i>
                    <span class="item-name">Boxed Horizontal</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.boxedfancy'))}}" href="{{route('menu-style.boxedfancy')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> B </i>
                    <span class="item-name">Boxed Fancy</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('uisheet')}}" target="_blank">
            <i class="icon">
                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                    <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                </svg>
            </i>
            <span>Design System<span class="badge rounded-pill bg-success">UI</span></span>
        </a>
    </li> --}}
    <li><hr class="hr-horizontal"></li>
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Gestiones</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    @can('pending read')
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('pharmacy.pending'))}}" href="{{ route('pharmacy.pending') }}" >
            <i class="icon">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856ZM20.4933 4.89833C21.3244 4.89833 22 5.56203 22 6.37856C22 7.19618 21.3244 7.85989 20.4933 7.85989H13.9178C13.0856 7.85989 12.4101 7.19618 12.4101 6.37856C12.4101 5.56203 13.0856 4.89833 13.9178 4.89833H20.4933ZM3.50777 15.958H10.0833C10.9155 15.958 11.5911 16.6217 11.5911 17.4393C11.5911 18.2558 10.9155 18.9206 10.0833 18.9206H3.50777C2.67555 18.9206 2 18.2558 2 17.4393C2 16.6217 2.67555 15.958 3.50777 15.958ZM18.5611 20.7778C20.4611 20.7778 22 19.2648 22 17.3992C22 15.5325 20.4611 14.0196 18.5611 14.0196C16.6623 14.0196 15.1223 15.5325 15.1223 17.3992C15.1223 19.2648 16.6623 20.7778 18.5611 20.7778Z" fill="currentColor" />
                </svg>
            </i>
            <span class="item-name">Pendientes</span>
        </a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('pharmacy.apply.stock.pending'))}}" href="{{ route('pharmacy.apply.stock.pending') }}" >
            <i class="icon">
                <svg viewBox="0 0 1024 1024" class="icon" class="icon-24" width="24" height="24"> version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M182.99 146.2h585.14v402.29h73.14V73.06H109.84v877.71H512v-73.14H182.99z" fill="#6c757d"></path><path d="M256.13 219.34h438.86v73.14H256.13zM256.13 365.63h365.71v73.14H256.13zM256.13 511.91h219.43v73.14H256.13zM731.55 585.06c-100.99 0-182.86 81.87-182.86 182.86s81.87 182.86 182.86 182.86c100.99 0 182.86-81.87 182.86-182.86s-81.86-182.86-182.86-182.86z m0 292.57c-60.5 0-109.71-49.22-109.71-109.71 0-60.5 49.22-109.71 109.71-109.71 60.5 0 109.71 49.22 109.71 109.71 0.01 60.49-49.21 109.71-109.71 109.71z" fill="#6c757d"></path><path d="M758.99 692.08h-54.86v87.27l69.39 68.76 38.61-38.96-53.14-52.66z" fill="#6c757d"></path></g></svg>
            </i>
            <span class="item-name">Asignación Stock</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link " data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Users</span>
            <i class="right-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </i>
        </a>
        <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar">
            <li class="nav-item">
                <a class="nav-link {{activeRoute(route('profile.show'))}}" href="{{route('profile.show')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> P </i>
                    <span class="item-name">Perfil Usuario</span>
                </a>
            </li>
            @can('user read')
                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('users.index'))}}" href="{{route('users.index')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> U </i>
                        <span class="item-name">User List</span>
                    </a>
                </li>
            @endcan
            @can('role read')
                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('dashboard.roles'))}}" href="{{route('dashboard.roles')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> R </i>
                        <span class="item-name">Roles y Permisos</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li> --}}
    <li><hr class="hr-horizontal"></li>
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Utilidades</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('pharmacy.stock'))}}" href="{{ route('pharmacy.stock') }}" >
            <i class="icon">
                <svg fill="#000000" class="icon-24" width="24" height="24" viewBox="0 0 64 64" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="ICON"> <path d="M59,43l-54,0l0,-8c0,-0.552 -0.448,-1 -1,-1c-0.552,0 -1,0.448 -1,1l0,13c-0,0.796 0.316,1.559 0.879,2.121c0.562,0.563 1.325,0.879 2.121,0.879l4,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1l-4,0c-0.265,-0 -0.52,-0.105 -0.707,-0.293c-0.188,-0.187 -0.293,-0.442 -0.293,-0.707l0,-3l54,0l0,3c0,0.265 -0.105,0.52 -0.293,0.707c-0.187,0.188 -0.442,0.293 -0.707,0.293l-21.642,-0l-8.715,-0l-13.643,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1l12.606,0c-0.16,2.682 -0.855,6.147 -3.417,8l-1.689,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1l21,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1l-1.689,0c-2.562,-1.854 -3.257,-5.318 -3.417,-8l20.606,0c0.796,-0 1.559,-0.316 2.121,-0.879c0.563,-0.562 0.879,-1.325 0.879,-2.121c0,-6.028 0,-23.972 0,-30c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879l-10,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1l10,0c0.265,0 0.52,0.105 0.707,0.293c0.188,0.187 0.293,0.442 0.293,0.707l0,25Zm-23.606,8l-6.788,0c-0.155,2.531 -0.785,5.68 -2.585,8l11.958,0c-1.8,-2.32 -2.43,-5.47 -2.585,-8Zm-7.394,-22l-0,10c0,0.552 0.448,1 1,1l6,0c0.552,0 1,-0.448 1,-1l-0,-10c-0,-0 2,-0 2,-0c0.382,0 0.73,-0.217 0.898,-0.56c0.168,-0.343 0.126,-0.751 -0.108,-1.053l-6,-7.737c-0.189,-0.244 -0.481,-0.387 -0.79,-0.387c-0.309,0 -0.601,0.143 -0.79,0.387l-6,7.737c-0.234,0.302 -0.276,0.71 -0.108,1.053c0.168,0.343 0.516,0.56 0.898,0.56l2,-0Zm-21,7l-0,2c0,0.552 0.448,1 1,1c0.552,-0 1,-0.448 1,-1l-0,-2c0,-0.552 -0.448,-1 -1,-1c-0.552,-0 -1,0.448 -1,1Zm23,-8c0,-0.552 -0.448,-1 -1,-1l-0.959,-0c-0,-0 3.959,-5.105 3.959,-5.105c0,-0 3.959,5.105 3.959,5.105c0,-0 -0.959,-0 -0.959,-0c-0.552,0 -1,0.448 -1,1l-0,10c-0,0 -4,0 -4,0c-0,0 -0,-10 -0,-10Zm6.364,-25l-14.364,-0c-1.657,0 -3,1.343 -3,3l0,25c0,1.657 1.343,3 3,3l4,-0c0.552,-0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-4,0c-0.552,-0 -1,-0.448 -1,-1c0,-0 0,-25 0,-25c0,-0.552 0.448,-1 1,-1l13,0l0,7c0,0.552 0.448,1 1,1l7,-0l0,18c0,0.552 -0.448,1 -1,1c-0,-0 -4,0 -4,0c-0.552,-0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1l4,-0c1.657,-0 3,-1.343 3,-3c0,-5.423 0,-20 0,-20c0,-0.28 -0.118,-0.548 -0.324,-0.737l-7.637,-7c-0.184,-0.169 -0.425,-0.263 -0.675,-0.263Zm-27.364,30l-0,-13c0,-0.552 -0.448,-1 -1,-1c-0.552,-0 -1,0.448 -1,1l-0,13c0,0.552 0.448,1 1,1c0.552,-0 1,-0.448 1,-1Zm7,-18l-10,0c-0.796,0 -1.559,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121c0,2.509 0,8.581 0,13.5c0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1l0,-13.5c-0,-0.265 0.105,-0.52 0.293,-0.707c0.187,-0.188 0.442,-0.293 0.707,-0.293c0,0 10,0 10,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1Zm10.947,3.132l10.106,-0c0.552,-0 1,-0.449 1,-1c-0,-0.552 -0.448,-1 -1,-1l-10.106,-0c-0.552,-0 -1,0.448 -1,1c0,0.551 0.448,1 1,1Zm10.053,-7.132l5.52,-0l-5.52,-5.06l-0,5.06Z"></path> </g> </g></svg>
            </i>
            <span class="item-name">Cargar Existencias</span>
        </a>
    </li>
    @can('exhausted read')
        <li class="nav-item">
            <a class="nav-link {{activeRoute(route('pharmacy.exhausted'))}}" href="{{ route('pharmacy.exhausted') }}" >
                <i class="icon">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-24" width="24" height="24" viewBox="0 0 24 24"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="medical-receipt-3" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="10.66" height="5" rx="2.5" transform="translate(10.968 18.501) rotate(-45)"></rect> <path id="primary" d="M7,8h6M7,12h4m5.73.73a2.52,2.52,0,0,1,3.54,0h0a2.52,2.52,0,0,1,0,3.54l-4,4a2.52,2.52,0,0,1-3.54,0h0a2.52,2.52,0,0,1,0-3.54ZM18.2,18.2l-3.4-3.4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M8,21H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16a1,1,0,0,1,1,1V8" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                </i>
                <span class="item-name">Agotados</span>
            </a>
        </li>
    @endcan
    <li><hr class="hr-horizontal"></li>
    @include('partials.dashboard.menu-modulos')
</ul>
