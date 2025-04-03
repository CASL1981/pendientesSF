<ul class="navbar-nav iq-main-menu"  id="sidebar">
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('dashboard'))}}" aria-current="page" href="{{route('dashboard')}}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Dashboard</span>
        </a>
    </li>
    <li><hr class="hr-horizontal"></li>
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Gestiones</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        @can('cycle read')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                <i class="icon">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C6.48 22 2 17.53 2 12C2 6.48 6.48 2 12 2C17.53 2 22 6.48 22 12C22 17.53 17.53 22 12 22ZM15.19 15.71C15.31 15.78 15.44 15.82 15.58 15.82C15.83 15.82 16.08 15.69 16.22 15.45C16.43 15.1 16.32 14.64 15.96 14.42L12.4 12.3V7.68C12.4 7.26 12.06 6.93 11.65 6.93C11.24 6.93 10.9 7.26 10.9 7.68V12.73C10.9 12.99 11.04 13.23 11.27 13.37L15.19 15.71Z" fill="currentColor" />
                    </svg>
                </i>
                <span class="item-name">Auditoria</span>
                <i class="right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </i>
            </a>
            <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar">
                <li class="nav-item ">
                    <a class="nav-link {{activeRoute(route('sgc.cycles'))}}" href="{{route('sgc.cycles')}}">
                      <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                      <i class="sidenav-mini-icon"> C </i>
                      <span class="item-name">Ciclos de Auditoria</span>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a class="nav-link {{activeRoute(route('sgc.auditor'))}}" href="{{route('sgc.auditor')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> A </i>
                        <span class="item-name">Auditores</span>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a class="nav-link {{activeRoute(route('sgc.audited'))}}" href="{{route('sgc.audited')}}">
                        <i class="icon svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> D </i>
                        <span class="item-name">Auditados</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('checklist read')
        <li class="nav-item static-item">
            <a class="nav-link {{activeRoute(route('sgc.checklists'))}}" href="{{ route('sgc.checklists') }}" >
                <i class="icon">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor" />
                    </svg>
                </i>
                <span class="item-name">Listas de Cehqueo</span>
            </a>
        </li>
        @endcan
    </li>
    <li><hr class="hr-horizontal"></li>
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Utilidades</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        @can('cycle read')
        <a class="nav-link {{activeRoute(route('sgc.report.informe.auditoria'))}}" href="{{ route('sgc.report.informe.auditoria') }}" >
            <i class="icon">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C6.48 22 2 17.53 2 12C2 6.48 6.48 2 12 2C17.53 2 22 6.48 22 12C22 17.53 17.53 22 12 22ZM15.19 15.71C15.31 15.78 15.44 15.82 15.58 15.82C15.83 15.82 16.08 15.69 16.22 15.45C16.43 15.1 16.32 14.64 15.96 14.42L12.4 12.3V7.68C12.4 7.26 12.06 6.93 11.65 6.93C11.24 6.93 10.9 7.26 10.9 7.68V12.73C10.9 12.99 11.04 13.23 11.27 13.37L15.19 15.71Z" fill="currentColor" />
                </svg>
            </i>
            <span class="item-name">Reporte de Ciclos</span>
        </a>
        @endcan
    </li>
    <li><hr class="hr-horizontal"></li>
    @include('partials.dashboard.menu-modulos')
</ul>