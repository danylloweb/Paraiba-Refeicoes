<div class="dialog">
    
    <?php if (isset($erros)):?>    
    <div class="error">
        <p>
            <span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong>
            <?php echo $erros?>
        </p>
    </div>
    <?php endif;?>
    <?php if (isset($msg)):?>    
    <div class="success">
        <p>
            <span class="ui-icon ui-icon-circle-check"></span>
            <strong>Sucesso:</strong>
            <?php echo $msg?>
        </p>
    </div>
    <?php endif;?>
    
</div>
<header id="head">
    <h1>Configurações</h1>
</header>

<?php echo form_open()?>
    <fieldset class="grid_4 alpha">
        <ul class="form-list">
            <li>
                <label for="titulo">Título Site <em>*</em></label>
                <input type="text" name="conf_name" id="titulo" value="<?php echo $this->configs->get_titulo()?>" required="required" />
            </li>
            <li>
                <label for="titulo">Telefone 1  </label>
                <input type="text" name="conf_phone_one" id="titulo" value="<?php echo $this->configs->get_tel1()?>" />
            </li>
            <li>
                <label for="titulo">Telefone 2  </label>
                <input type="text" name="conf_phone_two" id="titulo" value="<?php echo $this->configs->get_tel2()?>"  />
            </li>            
            <li>
                <label for="titulo">Preço da quentinha</label>
                <input type="text" name="conf_preco_marmita" id="titulo" value="<?php echo $this->configs->get_preco_marmita()?>"  />
            </li>            
            
        </ul>
    </fieldset>
    
    <fieldset class="grid_4 alpha">
        <ul class="form-list">
             <li>
                <label for="titulo">Email Contato </label>
                <input type="text" name="conf_email" id="titulo" value="<?php echo $this->configs->get_email()?>"  />
            </li>
             <li>
            <label for="conteudo">Endereço </label>
            <textarea name="conf_adress" id="conteudo" ><?php echo $this->configs->get_endereco()?></textarea>
        </li>
        </ul>
    </fieldset>
    
    <br class="clear" />
     <h1>Configurações SEO</h1>
     <br class="clear" />
    <fieldset class="grid_4 alpha">
        
        <ul class="form-list">
             
            <li>
                <label for="titulo">Palavras-chave </label>
                <input type="text" name="conf_seo_keywords" idconf_="titulo" value="<?php echo $this->configs->get_plvchave()?>" required="required" />
            </li>
        </ul>
    </fieldset>
    <fieldset class="grid_4 alpha">
        
        <ul class="form-list">
            
            <li>
                <label for="titulo">Descrição Site</label>
                <textarea name="conf_seo_description" rows="" cols=""><?php echo $this->configs->get_descricao()?></textarea>
            </li>
        </ul>
    </fieldset>
    
    <br class="clear" />
     <h1>Configurações Envio de Emails</h1>
     <br class="clear" />
    <fieldset class="grid_4 alpha">
        
         <br></br>
        <ul class="form-list">
             
            <li>
                <label for="titulo">SMTP Host</label>
                <input type="text" name="conf_smtp_host" id="titulo" value="<?php echo $this->configs->get_smtphost()?>" required="required" />
            </li>
            <li>
                <label for="titulo">SMTP Porta</label>
                <input type="text" name="conf_smtp_port" id="titulo" value="<?php echo $this->configs->get_smtpport()?>" required="required" />
            </li>
        </ul>
    </fieldset>
    <fieldset class="grid_4 alpha">
         <br></br>
        <ul class="form-list">
             <li>
                <label for="titulo">SMTP Usuário</label>
                <input type="text" name="conf_smtp_user" id="titulo" value="<?php echo $this->configs->get_smtpuser()?>" required="required" />
            </li>
            <li>
                <label for="titulo">SMTP Senha</label>
                <input type="text" name="conf_smtp_password" id="titulo" value="<?php echo $this->configs->get_smtppass()?>" required="required" />
            </li>
             
        </ul>
    </fieldset>
        
    <br class="clear" />
    
    <input type="submit" value="Enviar formulário"/>
</form>