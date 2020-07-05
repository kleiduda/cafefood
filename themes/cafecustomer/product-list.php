<tr>
    <td>
        <img src="<?= image(user()->photo, 100) ;?>" alt=""/>
        <a href="#" class="user-link"><?= $product->description ;?></a>
        <span class="user-subhead">o que pode acompanhar</span>
    </td>
    <td>
        <?= $product->sale_price ;?>
    </td>
    <td class="text-center">
        <span class="label label-default"><?= $product->id_environment ;?></span>
    </td>
    <td>
        <a href="#">10</a>

    </td>
    <td style="width: 20%;">
        <a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
        </a>
        <a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
        </a>
        <a href="#" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
        </a>
    </td>
</tr>
