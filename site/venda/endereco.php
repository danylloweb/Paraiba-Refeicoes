<!doctype html>
<html lang="pt-br"
    xmlns:fb="http://developers.facebook.com/schema/"
    xmlns:og="http://opengraphprotocol.org/schema/">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title> Paraíba Refeições </title>

        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content="www.lumenagencia.com.br"/>
        <meta name="robots" content="index, follow"/>
        <meta name="viewport" content="width=1024"/>
            
        <meta property="og:title" content="Paraíba Refeições">
        <meta property="og:description" content="">
        <meta property="og:url" content="http://bnbrbrasil.com">
        <meta property="og:image" content="http://bnbrbrasil.com">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="Paraíba Refeições">
        <meta property="og:type" content="website">

        <script type="text/javascript" src="media/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="media/js/jquery.cycle.all.min.js"></script>
        <script type="text/javascript" src="media/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="media/js/jquery.colorbox.js"></script>
        <script type="text/javascript" src="media/js/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript" src="media/js/jquery-ui.js"></script>
        <script type="text/javascript" src="media/js/functions.js"></script>
        <script type="text/javascript" src="media/js/jquery.tinyscrollbar.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script src="http://malsup.github.io/jquery.cycle2.js"></script>
        <script type="text/javascript" src="media/js/script.js"></script>
            
        <link rel="canonical" href="http://http://bnbrbrasil.com">
        <link rel="shortcut icon" href="favicon.png">
        <link rel="apple-touch-icon" href="media/img/logo-touch.png">
        <link rel="stylesheet" href="media/css/style.css" type="text/css" />
        <link rel="stylesheet" href="media/css/reset-min.css" type="text/css" />
        <link rel="stylesheet" href="media/css/animate.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="media/css/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" href="media/css/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="media/css/colorbox.css" type="text/css" />

<body>
   <?php include ('header.php') ?>
   <div class="center">
    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ 9,99 - Entregamos apenas no Bessa.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span>Quinta-Feira | 30/01/2014</div>
        <nav class="nav-etapas">
            <ul>
                <li><span class="sprit ic-car"></span>Meu carrinho</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-id "></span>Identificação</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-end atv"></span>Endereço</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-pag "></span>Pagamento</li>
            </ul>
        </nav>

        <div id="box-confirma-dados">
            <form action="http://paraibarefeicoes.com.br/confirmacao_endereco/atualizar" method="post" accept-charset="utf-8">                <h1 class="t-acesso">Confira seus dados:</h1>
                <div class="input-box type2">
                    <label class="txt-form " for="nome">Nome Completo:</label>
                    <input class="inputs" type="text" placeholder="" name="cli_nome" value="Iougo Huan" required="required" ></input>
                </div>
                <div class="input-box type2">
                    <label class="txt-form" for="email">Email:</label>
                    <input class="inputs " type="text" value="iougohuan@gmail.com" placeholder="" name="cli_email" required="required"></input>
                </div>
                <div class="input-box type2">
                    <label class="txt-form " for="endereco">Endereço:</label>
                    <input class="inputs " type="text" value="Rua Washigton Alves Gomes" placeholder="" name="cli_endereco" required="required"></input>
                </div>
                <div class="input-box type3">
                    <label class="txt-form type3" for="endereco">Telefone:</label>
                    <input class="inputs type3 phone" type="text" value="(83) 3333-7775" placeholder="" name="cli_telefone" required="required"></input>
                </div>
                <div class="input-box type3">
                    <label class="txt-form" for="endereco">Celular:</label>
                    <input class="inputs phone" type="text" value="(83) 8724-1879" placeholder="" name="cli_celular" required="required"></input>
                </div>
              
                <label class="txt-form" id="referencia" for="confirma-senha">Referencia de entrega</label>
                <textarea name="cli_referencia" id="" class="inputs referencia">dsdsdsdsdsds</textarea>                
                <a href="http://paraibarefeicoes.com.br/pagamento" class="btn-1 right cadastre-bt" style="margin-top: 10px;" title="">Próxima etapa</a>                
                <input type="submit" value="Atualizar" class="btn-1 right cadastre-bt" id="bt-ok-login">
            </form>
        </div>
    </div><!-- box-pedidos -->
</div>
    <?php include ('footer.php') ?>
</body>
</html>