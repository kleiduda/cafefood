<?php $v->layout("_theme"); ?>
<div class="table-responsive">
    <table class="table user-list table-hover">
        <thead>
        <tr>
            <th><span>Descrição</span></th>
            <th><span>Preço</span></th>
            <th class="text-center"><span>Ambiente</span></th>
            <th><span>Categoria</span></th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product as $item): ?>
        <?php $v->insert("product-list", ["product"=>$item]); ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
