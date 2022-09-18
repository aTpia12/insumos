        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('libs/media/dym.jpeg')}}" alt="" width="70%">
                </div>
                <div class="sidebar-brand-text mx-3">Insumos <sup>D&M</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('users.index')}}">
                            <i class="fa-solid fa-users"></i> Usuarios</a>
                        <a class="collapse-item" href="cards.html">
                            <i class="fa-solid fa-address-card"></i> Roles</a>
                        <a class="collapse-item" href="cards.html">
                            <i class="fa-solid fa-hand"></i> Permisos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-boxes-packing"></i>
                    <span>Insumos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('stores.index')}}">
                            <i class="fa-solid fa-shop"></i> Almacenes</a>
                        <a class="collapse-item" href="utilities-border.html">
                            <i class="fa-solid fa-sitemap"></i> Categorias</a>
                        <a class="collapse-item" href="{{route('products.index')}}">
                            <i class="fa-solid fa-boxes-stacked"></i> Productos</a>
                        <a class="collapse-item" href="utilities-other.html">
                            <i class="fa-solid fa-cubes-stacked"></i> Inventario</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              
            </div>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->