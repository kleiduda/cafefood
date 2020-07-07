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
                            <li><a href="#"><i class="fa fa-user"></i>Meu Perfil</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i>Sair</a></li>
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
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?= url("/app/pedidos") ;?>">
                            <i class="fa fa-edit"></i>
                            <span>Pedidos</span>
                            <span class="label label-danger label-circle pull-right">13</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= url("app/produtos") ;?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Produtos</span>
                        </a>
                    </li>
                    <li class="nav-header hidden-sm hidden-xs">
                        Clientes
                    </li>
                    <li>
                        <a href="<?= url("app/usuarios") ;?>">
                            <i class="fa fa-user"></i>
                            <span>Clientes</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </section>
    <div id="nav-col-submenu"></div>
</div>
