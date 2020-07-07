<tr>
<td>
    <a href="#" class="user-link">
        <img src="<?= $user->photo ;?>" alt=""/>
    </a>
</td>
<td>
    <?= $user->first_name ;?>
</td>
<td class="text-center">
    <span class="label label-default"><?= $user->status ;?></span>
</td>
<td>
    <?= $user->email ;?>
</td>
<td style="width: 20%;">

    <a href="#" class="table-link">
        <span class="fa-stack">
            <i class="fa fa-square fa-stack-2x"></i>
            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
        </span>
    </a>


</td>
</tr>
