<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';


#Gerenciador
$route['gerenciador'] = 'gerenciador/index/index';
# login gerenciador
$route['gerenciador/login'] = 'gerenciador/login/index';
# pedidos
$route['gerenciador/pedidos'] = "gerenciador/pedidos/index";
$route['gerenciador/pedidos/(:num)'] = "gerenciador/pedidos/index/$1";
$route['gerenciador/pedidos/visualizar/(:num)'] = "gerenciador/pedidos/visualizar/$1";
$route['gerenciador/pedidos/enviar/(:num)'] = "gerenciador/pedidos/enviar/$1";
# usuarios 
$route['gerenciador/usuarios/(:num)'] = "gerenciador/usuarios/index/$1";
$route['gerenciador/usuarios/novo'] = "gerenciador/usuarios/add_usuario";
$route['gerenciador/usuarios/editar/(:num)'] = "gerenciador/usuarios/editar_usuario/$1";
$route['gerenciador/usuarios/excluir/(:num)'] = "gerenciador/usuarios/excluir_usuario/$1";
#configuracoes
$route['gerenciador/configuracoes'] = "gerenciador/configuracoes/index";
#Corporativas
$route['gerenciador/corporativas'] = "gerenciador/corporativas/index";
$route['gerenciador/corporativas/(:num)'] = "gerenciador/corporativas/index/$1";
$route['gerenciador/corporativas/novo'] = "gerenciador/corporativas/add_corporativa";
$route['gerenciador/corporativas/editar/(:num)'] = "gerenciador/corporativas/editar_corporativa/$1";
$route['gerenciador/corporativas/excluir/(:num)'] = "gerenciador/corporativas/excluir_corporativa/$1";
#Corporativas Categorias
$route['gerenciador/corporativas_categorias'] = "gerenciador/corporativas_categorias/index";
$route['gerenciador/corporativas_categorias/(:num)'] = "gerenciador/corporativas_categorias/index/$1";
$route['gerenciador/corporativas_categorias/novo'] = "gerenciador/corporativas_categorias/add_corporativa_categoria";
$route['gerenciador/corporativas_categorias/editar/(:num)'] = "gerenciador/corporativas_categorias/editar_corporativa_categoria/$1";
$route['gerenciador/corporativas_categorias/excluir/(:num)'] = "gerenciador/corporativas_categorias/excluir_corporativa_categoria/$1";
#Clientes
$route['gerenciador/clientes'] = "gerenciador/clientes/index";
$route['gerenciador/clientes/busca'] = "gerenciador/clientes/busca_cliente";
$route['gerenciador/clientes/(:num)'] = "gerenciador/clientes/index/$1";
$route['gerenciador/clientes/novo'] = "gerenciador/clientes/add_cliente";
$route['gerenciador/clientes/editar/(:num)'] = "gerenciador/clientes/editar_cliente/$1";
$route['gerenciador/clientes/excluir/(:num)'] = "gerenciador/clientes/excluir_cliente/$1";
#Feijões
$route['gerenciador/feijoes'] = "gerenciador/feijoes/index";
$route['gerenciador/feijoes/busca'] = "gerenciador/feijoes/busca_feijao";
$route['gerenciador/feijoes/(:num)'] = "gerenciador/feijoes/index/$1";
$route['gerenciador/feijoes/novo'] = "gerenciador/feijoes/add_feijao";
$route['gerenciador/feijoes/editar/(:num)'] = "gerenciador/feijoes/editar_feijao/$1";
$route['gerenciador/feijoes/excluir/(:num)'] = "gerenciador/feijoes/excluir_feijao/$1";
#Arroz
$route['gerenciador/arrozes'] = "gerenciador/arrozes/index";
$route['gerenciador/arrozes/busca'] = "gerenciador/arrozes/busca_arroz";
$route['gerenciador/arrozes/(:num)'] = "gerenciador/arrozes/index/$1";
$route['gerenciador/arrozes/novo'] = "gerenciador/arrozes/add_arroz";
$route['gerenciador/arrozes/editar/(:num)'] = "gerenciador/arrozes/editar_arroz/$1";
$route['gerenciador/arrozes/excluir/(:num)'] = "gerenciador/arrozes/excluir_arroz/$1";
#Macarroes
$route['gerenciador/macarroes'] = "gerenciador/macarroes/index";
$route['gerenciador/macarroes/busca'] = "gerenciador/macarroes/busca_macarrao";
$route['gerenciador/macarroes/(:num)'] = "gerenciador/macarroes/index/$1";
$route['gerenciador/macarroes/novo'] = "gerenciador/macarroes/add_macarrao";
$route['gerenciador/macarroes/editar/(:num)'] = "gerenciador/macarroes/editar_macarrao/$1";
$route['gerenciador/macarroes/excluir/(:num)'] = "gerenciador/macarroes/excluir_macarrao/$1";
#Saladas
$route['gerenciador/saladas'] = "gerenciador/saladas/index";
$route['gerenciador/saladas/busca'] = "gerenciador/saladas/busca_salada";
$route['gerenciador/saladas/(:num)'] = "gerenciador/saladas/index/$1";
$route['gerenciador/saladas/novo'] = "gerenciador/saladas/add_salada";
$route['gerenciador/saladas/editar/(:num)'] = "gerenciador/saladas/editar_salada/$1";
$route['gerenciador/saladas/excluir/(:num)'] = "gerenciador/saladas/excluir_salada/$1";
#Acompanhamentos
$route['gerenciador/acompanhamentos'] = "gerenciador/acompanhamentos/index";
$route['gerenciador/acompanhamentos/busca'] = "gerenciador/acompanhamentos/busca_acompanhamento";
$route['gerenciador/acompanhamentos/(:num)'] = "gerenciador/acompanhamentos/index/$1";
$route['gerenciador/acompanhamentos/novo'] = "gerenciador/acompanhamentos/add_acompanhamento";
$route['gerenciador/acompanhamentos/editar/(:num)'] = "gerenciador/acompanhamentos/editar_acompanhamento/$1";
$route['gerenciador/acompanhamentos/excluir/(:num)'] = "gerenciador/acompanhamentos/excluir_acompanhamento/$1";
#Carnes
$route['gerenciador/carnes'] = "gerenciador/carnes/index";
$route['gerenciador/carnes/busca'] = "gerenciador/carnes/busca_carne";
$route['gerenciador/carnes/(:num)'] = "gerenciador/carnes/index/$1";
$route['gerenciador/carnes/novo'] = "gerenciador/carnes/add_carne";
$route['gerenciador/carnes/editar/(:num)'] = "gerenciador/carnes/editar_carne/$1";
$route['gerenciador/carnes/excluir/(:num)'] = "gerenciador/carnes/excluir_carne/$1";
#Bebidas
$route['gerenciador/bebidas'] = "gerenciador/bebidas/index";
$route['gerenciador/bebidas/busca'] = "gerenciador/bebidas/busca_bebida";
$route['gerenciador/bebidas/(:num)'] = "gerenciador/bebidas/index/$1";
$route['gerenciador/bebidas/novo'] = "gerenciador/bebidas/add_bebida";
$route['gerenciador/bebidas/editar/(:num)'] = "gerenciador/bebidas/editar_bebida/$1";
$route['gerenciador/bebidas/excluir/(:num)'] = "gerenciador/bebidas/excluir_bebida/$1";
#Sobremesas
$route['gerenciador/sobremesas'] = "gerenciador/sobremesas/index";
$route['gerenciador/sobremesas/busca'] = "gerenciador/sobremesas/busca_sobremesa";
$route['gerenciador/sobremesas/(:num)'] = "gerenciador/sobremesas/index/$1";
$route['gerenciador/sobremesas/novo'] = "gerenciador/sobremesas/add_sobremesa";
$route['gerenciador/sobremesas/editar/(:num)'] = "gerenciador/sobremesas/editar_sobremesa/$1";
$route['gerenciador/sobremesas/excluir/(:num)'] = "gerenciador/sobremesas/excluir_sobremesa/$1";
#Marmitas
$route['gerenciador/marmitas'] = "gerenciador/marmitas/index";
$route['gerenciador/marmitas/(:num)'] = "gerenciador/marmitas/index/$1";
$route['gerenciador/marmitas/novo'] = "gerenciador/marmitas/add_marmita";
$route['gerenciador/marmitas/editar/(:num)'] = "gerenciador/marmitas/editar_marmita/$1";
$route['gerenciador/marmitas/excluir/(:num)'] = "gerenciador/marmitas/excluir_marmita/$1";
#Banners
$route['gerenciador/banners'] = "gerenciador/banners/index";
$route['gerenciador/banners/(:num)'] = "gerenciador/banners/index/$1";
$route['gerenciador/banners/novo'] = "gerenciador/banners/add_banner";
$route['gerenciador/banners/editar/(:num)'] = "gerenciador/banners/editar_banner/$1";
$route['gerenciador/banners/excluir/(:num)'] = "gerenciador/banners/excluir_banner/$1";
#Empresa - Clientes
$route['gerenciador/empresa_clientes'] = "gerenciador/empresa_clientes/index";
$route['gerenciador/empresa_clientes/(:num)'] = "gerenciador/empresa_clientes/index/$1";
$route['gerenciador/empresa_clientes/novo'] = "gerenciador/empresa_clientes/add_empresa_cliente";
$route['gerenciador/empresa_clientes/editar/(:num)'] = "gerenciador/empresa_clientes/editar_empresa_cliente/$1";
$route['gerenciador/empresa_clientes/excluir/(:num)'] = "gerenciador/empresa_clientes/excluir_empresa_cliente/$1";
# À la carte
$route['gerenciador/alacartes'] = "gerenciador/alacartes/index";
$route['gerenciador/alacartes/(:num)'] = "gerenciador/alacartes/index/$1";
$route['gerenciador/alacartes/novo'] = "gerenciador/alacartes/add_alacarte";
$route['gerenciador/alacartes/editar/(:num)'] = "gerenciador/alacartes/editar_alacarte/$1";
$route['gerenciador/alacartes/excluir/(:num)'] = "gerenciador/alacartes/excluir_alacarte/$1";
# À la carte - Categorias
$route['gerenciador/alacartes_categorias'] = "gerenciador/alacartes_categorias/index";
$route['gerenciador/alacartes_categorias/(:num)'] = "gerenciador/alacartes_categorias/index/$1";
$route['gerenciador/alacartes_categorias/novo'] = "gerenciador/alacartes_categorias/add_alacarte_categoria";
$route['gerenciador/alacartes_categorias/editar/(:num)'] = "gerenciador/alacartes_categorias/editar_alacarte_categoria/$1";
$route['gerenciador/alacartes_categorias/excluir/(:num)'] = "gerenciador/alacartes_categorias/excluir_alacarte_categoria/$1";
#Emails
$route['gerenciador/emails'] = "gerenciador/emails/index";
$route['gerenciador/emails/(:num)'] = "gerenciador/emails/index/$1";
$route['gerenciador/emails/novo'] = "gerenciador/emails/add_email";
$route['gerenciador/emails/editar/(:num)'] = "gerenciador/emails/editar_email/$1";
$route['gerenciador/emails/excluir/(:num)'] = "gerenciador/emails/excluir_email/$1";
#newsletter
$route['gerenciador/newsletters'] = "gerenciador/newsletters/index";
$route['gerenciador/newsletters/(:num)'] = "gerenciador/newsletters/index/$1";
$route['gerenciador/newsletters/novo'] = "gerenciador/newsletters/add_newsletter";
$route['gerenciador/newsletters/editar/(:num)'] = "gerenciador/newsletters/editar_newsletter/$1";
$route['gerenciador/newsletters/excluir/(:num)'] = "gerenciador/newsletters/excluir_newsletter/$1";
$route['gerenciador/newsletters/enviar'] = "gerenciador/newsletters/enviar_news";

#Pratos
$route['gerenciador/pratos'] = "gerenciador/pratos/index";
$route['gerenciador/pratos/(:num)'] = "gerenciador/pratos/index/$1";
$route['gerenciador/pratos/novo'] = "gerenciador/pratos/add_prato";
$route['gerenciador/pratos/editar/(:num)'] = "gerenciador/pratos/editar_prato/$1";
$route['gerenciador/pratos/excluir/(:num)'] = "gerenciador/pratos/excluir_prato/$1";

#Pratos - categoria 
$route['gerenciador/pratos_categorias'] = "gerenciador/pratos_categorias/index";
$route['gerenciador/pratos_categorias/(:num)'] = "gerenciador/pratos_categorias/index/$1";
$route['gerenciador/pratos_categorias/novo'] = "gerenciador/pratos_categorias/add_prato_categoria";
$route['gerenciador/pratos_categorias/editar/(:num)'] = "gerenciador/pratos_categorias/editar_prato_categoria/$1";
$route['gerenciador/pratos_categorias/excluir/(:num)'] = "gerenciador/pratos_categorias/excluir_prato_categoria/$1";

# pedidos pratos
$route['gerenciador/pedidos_pratos'] = "gerenciador/pedidos_pratos/index";
$route['gerenciador/pedidos_pratos/(:num)'] = "gerenciador/pedidos_pratos/index/$1";
$route['gerenciador/pedidos_pratos/visualizar/(:num)'] = "gerenciador/pedidos_pratos/visualizar/$1";
$route['gerenciador/pedidos_pratos/enviar/(:num)'] = "gerenciador/pedidos_pratos/enviar/$1";
# Estaticos
$route['gerenciador/estaticos/'] = "gerenciador/estaticos/index";
$route['gerenciador/estaticos/(:num)'] = "gerenciador/estaticos/index/$1";
$route['gerenciador/estaticos/novo'] = "gerenciador/estaticos/add_estatico/$1";
$route['gerenciador/estaticos/editar/(:num)'] = "gerenciador/estaticos/editar_estatico/$1";
$route['gerenciador/estaticos/excluir/(:num)'] = "gerenciador/estaticos/excluir_estatico/$1/$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
