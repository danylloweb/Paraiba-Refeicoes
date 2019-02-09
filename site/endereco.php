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
           <div class="txt1 pedido-dia int"><span>Pedido para hoje: </span>Segunda-feira | 02/12/2013</div>
           <nav class="nav-etapas">
               <ul>
                   <li><span class="sprit ic-car"></span>Meu carrinho</li><span class="sprit set-sep"></span>
                   <li><span class="sprit ic-id "></span>Identificação</li><span class="sprit set-sep"></span>
                   <li><span class="sprit ic-end atv"></span>Endereço</li><span class="sprit set-sep"></span>
                   <li><span class="sprit ic-pag "></span>Pagamento</li>
               </ul>
           </nav>
            
            <div id="box-confirma-dados">
                <form action="">
                    <h1 class="t-acesso">Confira seus dados:</h1>
                    <div class="input-box type2">
                        <label class="txt-form " for="nome">Nome Completo:</label>
                        <input class="inputs" type="text" placeholder="" name="nome" value="Iougo Huan Ferreira Alves" required="required" ></input>
                    </div>
                    <div class="input-box type2">
                        <label class="txt-form" for="email">Email:</label>
                        <input class="inputs " type="text" value="iougohuan@gmail.com" placeholder="" name="email" required="required"></input>
                    </div>
                    <div class="input-box type2">
                        <label class="txt-form " for="endereco">Endereço:</label>
                        <input class="inputs " type="text" value="Rua Washgton Alves Gomes ,150" placeholder="" name="endereco" required="required"></input>
                    </div>
                    <div class="input-box type3">
                        <label class="txt-form type3" for="endereco">Telefone:</label>
                        <input class="inputs type3" type="text" value="83 33337775" placeholder="" name="telefone" required="required"></input>
                    </div>
                    <div class="input-box type3">
                        <label class="txt-form" for="endereco">Celular:</label>
                        <input class="inputs" type="text" value="83 87241879" placeholder="" name="celular" required="required"></input>
                    </div>
                    <div class="senhas">
                        <label class="txt-form" for="senha">Senha:</label>
                        <input class="inputs" type="text"  value="123456" placeholder="" name="senha" required="required"></input>
                        <label class="txt-form" for="confirma-senha">Confirmar Senha:</label>
                        <input class="inputs" type="text" placeholder="" value="123456" name="confirma-senha" required="required"></input>
                    </div>
                    <label class="txt-form" id="referencia" for="confirma-senha">Referencia de entrega</label>
                    <textarea name="" id="" class="inputs referencia">Casas da Caixa</textarea>
                    <input type="submit" value="Próxima etapa" class="btn-1 right cadastre-bt" id="bt-ok-login">
                </form>

            </div>
       </div><!-- box-pedidos -->
   </div>
    <?php include ('footer.php') ?>
</body>
</html>