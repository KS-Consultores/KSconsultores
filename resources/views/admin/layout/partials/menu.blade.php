<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <br>
            <li class="start {{ isset($menu) && $menu == 'users' ? 'active open' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Usuarios</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ isset($submenu) && $submenu == 'users' ? 'active' : '' }}">
                        <a href="/admin/users"><i class="fa fa-user"></i> Usuarios</a>
                    </li>
                   <!-- <li class="{{ isset($submenu) && $submenu == 'roles' ? 'active' : '' }}">
                        <a href="/admin/roles"><i class="fa fa-lock"></i> Roles</a>
                    </li>-->
                </ul>
            </li>
            <li class="{{ isset($menu) && $menu == 'posts' ? 'active' : '' }}">
                <a href="/admin/posts">
                    <i class="fa fa-file-image-o"></i>
                    <span class="title">Publicaciones</span>
                </a>
            </li>
            <li class="{{ isset($menu) && $menu == 'categories' ? 'active' : '' }}">
                <a href="/admin/categories">
                    <i class="fa fa-list"></i>
                    <span class="title">Categorías</span>
                </a>
            </li>
            <!--
            <li class="start {{ isset($menu) && $menu == 'catalogs' ? 'active open' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-folder-open-o"></i>
                    <span class="title">Catálogos</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ isset($submenu) && $submenu == 'levels' ? 'active' : '' }}">
                        <a href="/admin/levels"><i class="fa fa-bar-chart-o"></i> Niveles</a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'archdioceses' ? 'active' : '' }}">
                        <a href="/admin/archdioceses"><i class="fa fa-globe"></i> Arquidiocesis</a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'deanships' ? 'active' : '' }}">
                        <a href="/admin/deanships"><i class="fa fa-institution"></i> Decanatos</a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'parishs' ? 'active' : '' }}">
                        <a href="/admin/parishs"><i class="fa fa-building"></i> Parroquias</a>
                    </li>
                </ul>
            </li>
            <li class="{{ isset($menu) && $menu == 'churchs' ? 'active open' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-institution"></i>
                    <span class="title">Iglesias</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ isset($submenu) && $submenu == 'new-church' ? 'active' : '' }}">
                        <a href="/admin/new-church"><i class="fa fa-home"></i> Nueva Iglesia</a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'churchs' ? 'active' : '' }}">
                        <a href="/admin/churchs"><i class="fa fa-group"></i> Todas las Iglesias</a>
                    </li>
                </ul>
            </li>
            <li class="{{ isset($menu) && $menu == 'complements' ? 'active open' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-inbox"></i>
                    <span class="title">Complementos</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ isset($submenu) && $submenu == 'missal' ? 'active' : '' }}">
                        <a href="/admin/missal"><i class="fa fa-file-o"></i>  Misal</a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'liturgy' ? 'active' : '' }}">
                        <a href="/admin/liturgy"><i class="fa fa-file-text-o"></i>  Liturgia de las Horas</a>
                    </li>
                </ul>
            </li>
            -->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->