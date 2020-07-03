<?php $v->layout("_theme"); ?>

<div class="app_launch_header">
    <form class="app_launch_form_filter app_form" action="" method="post">
        <select name="status">
            <option value="">Todas</option>
            <option value="paid">Receitas recebidas</option>
            <option value="unpaid">Receitas não recebidas</option>
        </select>

        <select name="category">
            <option value="">Todas</option>
            <option value="1">Salário</option>
            <option value="2">Investimentos</option>
            <option value="3">Empréstimos</option>
            <option value="4">Outras receitas</option>
        </select>

        <input list="datelist" type="text" class="radius mask-month" name="date" placeholder="<?= date("m/Y"); ?>">
        <datalist id="datelist">
            <?php for ($range = -2; $range <= 3; $range++): $date = date("m/Y", strtotime("{$range}month")); ?>
                <option value="<?= $date; ?>"/>
            <?php endfor; ?>
        </datalist>
        <button class="filter radius transition icon-filter icon-notext"></button>
    </form>

    <div class="app_launch_btn income radius transition icon-plus-circle" data-modalopen=".app_modal_income">Ver Pedido
    </div>
</div>

<section class="app_launch_box">
    <div class="app_launch_item header">
        <p class="desc">Foto</p>
        <p class="date">Descrição</p>
        <p class="category">R$ Valor</p>
        <p class="enrollment">Categoria</p>
        <p class="price">Quero</p>
    </div>
    <?php for ($day = 1; $day <= date('t'); $day++): ?>
        <article class="app_launch_item">
            <p class="desc app_invoice_link transition">
                <a title="imagem" href="#"><img src="<?= theme("/assets/images/p1.jpg") ;?>" width="50"></a></a>
            </p>
            <p class="date">Descrição do Produto</p>
            <p class="price">
                <span>R$</span>
                <span>1.200,00</span>
            </p>
            <p class="category">Almoço</p>
            <p class="price">

                <span title="Receber" class="check income icon-thumbs-o-down transition"
                      data-toggleclass="active icon-thumbs-o-down icon-thumbs-o-up" data-modalopen=".app_modal_income"></span>
                <!--03 de 12-->
                <!--<span class="icon-exchange">Fixa</span>-->
            </p>

        </article>
    <?php endfor; ?>
    <div class="app_launch_item footer">
        <p class="desc"></p>
        <p></p>
        <p></p>
        <p class="icon-calendar-check-o">R$ 36,000.00</p>
        <p class="icon-thumbs-o-up">R$ 28,000.00</p>
    </div>
</section>
