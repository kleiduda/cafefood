<?php $v->layout("_theme"); ?>

<div class="row" id="user-profile">
    <div class="col-lg-3 col-md-4 col-sm-4">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2>SKU:<?= $product->sku ;?></h2>
            </header>
            <div class="main-box-body clearfix">
                <div class="profile-status">
                    <i class="fa fa-circle"></i> Estoque disponível
                </div>
                <img src="<?= image($product->image, 400); ?>" alt="" class=" img-responsive center-block"/>
                <div class="profile-label">
                    <span class="label label-danger"><?= $product->id_category ;?></span>
                </div>
                <div class="profile-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <span>Avaliação</span>
                </div>
                <div class="profile-since">
                    Cadastrado em: data/data
                </div>
                <div class="profile-details">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-truck"></i>Vendas: <span>456</span></li>
                        <li><i class="fa-li fa fa-comment"></i>Comentários: <span>828</span></li>
                        <li><i class="fa-li fa fa-tasks"></i>Em estoque: <span>1024</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-8">
        <div class="main-box clearfix">
            <div class="tabs-wrapper profile-tabs ">
                <ul class="nav nav-tabs">
                    <li><a class="tablinks" onclick="openTab(event, 'tab-product')">Edição do produto</a></li>
                    <li><a class="tablinks" onclick="openTab(event, 'tab-ingredients')">Acrescentar Ingredientes</a></li>
                </ul>
                <div class="">
                    <div id="tab-product" class="tab-content">
                        <div id="produto">
                            <div class="col-lg-12">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2>sku: <?= $product->sku ;?></h2>
                                    </header>
                                    <div class="main-box-body clearfix">
                                        <form role="form" action="<?= url("/app/product-edit") ;?>">
                                            <input type="hidden" name="update" value="true"/>
                                            <div class="form-group">
                                                <label>Código EAN</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                       placeholder="Código EAN do produto" value="<?= $product->ean ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Descrição Produto</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                       placeholder="Descriçao do Produto" value="<?= $product->description ;?>" >
                                            </div>

                                            <div class="form-group form-group-select2">
                                                <label>Categoria do Produto</label>
                                                <select style="width:300px" id="sel2">
                                                    <option value="Bebidas">Bebidas</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label class="sr-only" for="preco">Preço</label>
                                                <input type="text" class="form-control" id="preco" placeholder="Preço"
                                                       value="<?= $product->regular_price ;?>">
                                                <label class="sr-only" for="preco">Preço de Venda</label>
                                                <input type="text" class="form-control" id="preco"
                                                       placeholder="Preço de Venda" value="<?= $product->sale_price ;?>">
                                            </div>
                                            <div class="form-group form-group-select2">
                                                <label>Ambiente de Produção</label>
                                                <select style="width:300px" id="sel2">
                                                    <option value="Cozinha">Cozinha</option>
                                                </select>
                                            </div>
                                            <div class="form-group btn_inline">
                                            <button type="submit" class="btn btn-primary btn-xs col-lg-7">
                                                <span class="fa fa-check"></span> Salvar Edição
                                            </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-ingredients" class="tab-content">
                        <div class="table-responsive">
                            <form>
                                <div class="form-group">
                                    <h3>Escolha os ingredientes do produtos</h3>
                                    <label>Ingredientes</label>
                                    <div class="checkbox-nice">
                                        <input type="checkbox" id="checkbox-1" checked="checked"/>
                                        <label for="checkbox-1">
                                            Gelo
                                        </label>
                                    </div>
                                    <div class="checkbox-nice">
                                        <input type="checkbox" id="checkbox-2"/>
                                        <label for="checkbox-2">
                                            Limão
                                        </label>
                                    </div>
                                    <div class="checkbox-nice">
                                        <input type="checkbox" id="checkbox-3"/>
                                        <label for="checkbox-3">
                                            Peperoni
                                        </label>
                                    </div>
                                    <div class="checkbox-nice">
                                        <input type="checkbox" id="checkbox-4"/>
                                        <label for="checkbox-4">
                                            Mussarela
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-xs col-lg-12">
                                        <span class="fa fa-check"></span> Salvar
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




