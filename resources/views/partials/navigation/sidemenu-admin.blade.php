<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU PRINCIPAL</li>
            <li>
                <a href="{{ route('admin_homepage') }}">
                    <i class="fa fa-dashboard"></i> <span>Accueil</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>La communauté</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Les partenaires</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Les membres</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($activeSection == 'school') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>L'école</span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($action == 'tutorials') ? 'active' : '' }}"><a href="{{ route('admin_tutorial_list') }}"><i class="fa fa-circle-o"></i> Les tutoriels</a></li>
                    <li class="{{ ($action == 'events') ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> Les événéments</a></li>
                    <li class="{{ ($action == 'cosplay-box') ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> Les boîtes de cosplay</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>