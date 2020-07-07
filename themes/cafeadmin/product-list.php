<tr>
    <td>
        <img src="<?= image("{$product->image}", 100); ?>" alt=""/>
        <a href="<?= url("/app/produtos/edit/{$product->id}") ;?>" class="user-link" style="color: #0b0b0b"><?= $product->description; ?></a>
        <span class="user-subhead">o que pode acompanhar</span>
    </td>
    <td>
        <?= $product->sale_price; ?>
    </td>
    <td class="text-center">
        <span class="label label-default"><?= $product->environment; ?></span>
    </td>
    <td>
        <a href="#"><?= $product->category; ?></a>

    </td>
    <td style="width: 20%;">

        <a href="<?= url("/app/produtos/edit/{$product->id}"); ?>" class="table-link">
<span class="fa-stack">
<i class="fa fa-pencil fa-stack-2x"></i></br>
    <i>editar</i>
</span>

        </a>
    </td>
</tr>
