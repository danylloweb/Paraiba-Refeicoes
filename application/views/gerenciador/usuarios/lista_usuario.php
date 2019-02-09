<div class="dialog">
    <?php if ($erro != ''): ?>    
        <div class="error">
            <p>
                <span class="ui-icon ui-icon-alert"></span>
                <strong>Alerta:</strong>
                <?php echo $erro ?>
            </p>
        </div>
    <?php endif; ?>
    <?php if ($msg != ''): ?>    
        <div class="success">
            <p>
                <span class="ui-icon ui-icon-circle-check"></span>
                <strong>Sucesso:</strong>
                <?php echo $msg ?>
            </p>
        </div>
    <?php endif; ?>

</div>
<header id="head">
    <h1>Usuários</h1>

</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Perfil</th>
        <th>Ações</th>
    </tr>
    <tbody>
        <?php
        if (count($usuarios) > 0):
            foreach ($usuarios as $usuario):
                ?>
                <tr>
                    <td class="checkbox"></td>
                    <td><?php echo $usuario->usu_nome ?></td>
                    <td><?php echo $usuario->usu_email ?></td>
                    <td><?php echo ucwords($usuario->usu_perfil) ?></td>
                    <td>
                        <a href="<?= site_url('gerenciador/usuarios/editar/' . $usuario->usu_id) ?>" class="ico-edit" title="Editar">Editar</a>
                        <a href="<?= site_url('gerenciador/usuarios/excluir/' . $usuario->usu_id) ?>" class="ico-delete funcao-apagar" title="Apagar">Apagar</a>
                    </td>
                </tr>
                <?php
            endforeach;
        endif;
        ?> 
    </tbody>
</table>

<footer id="foot">
    <nav class="paginacao">
        <?php echo $this->pagination->create_links() ?>
    </nav>
    <!--    <nav class="batch">-->
    <!--        <a href="#" class="ico-bin" title="Apagar Selecionados">Apagar Selecionados</a>-->
    <!--    </nav>-->
</footer>