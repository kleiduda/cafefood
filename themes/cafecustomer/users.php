<?php $v->layout("_theme"); ?>
<div class="col-lg-12">

    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list table-hover">
                            <thead>
                            <tr>
                                <th><span>Foto</span></th>
                                <th><span>Nome</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $item): ?>
                                    <?php $v->insert("users_list", ["user"=>$item]); ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $paginator; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
