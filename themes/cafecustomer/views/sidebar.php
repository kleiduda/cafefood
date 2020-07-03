<div id="nav-col">
    <section id="col-left" class="col-left-nano">
        <div id="col-left-inner" class="col-left-nano-content">
            <div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
                <img alt="" src="<?= image(user()->photo, 100) ;?>"/>
                <div class="user-box">
                    <div class="name">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= user()->first_name ;?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
                        </ul>
                    </div>
                    <span class="status">
<i class="fa fa-circle"></i> Online
</span>
                </div>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-header nav-header-first hidden-sm hidden-xs">
                        Interno
                    </li>
                    <li class="active">
                        <a href="<?= url("/app") ;?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Painel de Preparo</span>
                            <span class="label label-primary label-circle pull-right">23</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa fa-copy"></i>
                            <span>Produtos</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                    </li>
                    <li class="nav-header hidden-sm hidden-xs">
                        Clientes
                    </li>
                    <li>
                        <a href="<?= url("app/usuarios") ;?>">
                            <i class="fa fa-edit"></i>
                            <span>Clientes</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </section>
    <div id="nav-col-submenu"></div>
</div>
