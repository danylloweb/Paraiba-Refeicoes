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
#Clientes
$route['gerenciador/clientes'] = "gerenciador/clientes/index";
$route['gerenciador/clientes/(:num)'] = "gerenciador/clientes/index/$1";
$route['gerenciador/clientes/novo'] = "gerenciador/clientes/add_cliente";
$route['gerenciador/clientes/editar/(:num)'] = "gerenciador/clientes/editar_cliente/$1";
$route['gerenciador/clientes/excluir/(:num)'] = "gerenciador/clientes/excluir_cliente/$1";
#Feijões
$route['gerenciador/feijoes'] = "gerenciador/feijoes/index";
$route['gerenciador/feijoes/(:num)'] = "gerenciador/feijoes/index/$1";
$route['gerenciador/feijoes/novo'] = "gerenciador/feijoes/add_feijao";
$route['gerenciador/feijoes/editar/(:num)'] = "gerenciador/feijoes/editar_feijao/$1";
$route['gerenciador/feijoes/excluir/(:num)'] = "gerenciador/feijoes/excluir_feijao/$1";
#Arroz
$route['gerenciador/arrozes'] = "gerenciador/arrozes/index";
$route['gerenciador/arrozes/(:num)'] = "gerenciador/arrozes/index/$1";
$route['gerenciador/arrozes/novo'] = "gerenciador/arrozes/add_arroz";
$route['gerenciador/arrozes/editar/(:num)'] = "gerenciador/arrozes/editar_arroz/$1";
$route['gerenciador/arrozes/excluir/(:num)'] = "gerenciador/arrozes/excluir_arroz/$1";
#Macarroes
$route['gerenciador/macarroes'] = "gerenciador/macarroes/index";
$route['gerenciador/macarroes/(:num)'] = "gerenciador/macarroes/index/$1";
$route['gerenciador/macarroes/novo'] = "gerenciador/macarroes/add_macarrao";
$route['gerenciador/macarroes/editar/(:num)'] = "gerenciador/macarroes/editar_macarrao/$1";
$route['gerenciador/macarroes/excluir/(:num)'] = "gerenciador/macarroes/excluir_macarrao/$1";
#Saladas
$route['gerenciador/saladas'] = "gerenciador/saladas/index";
$route['gerenciador/saladas/(:num)'] = "gerenciador/saladas/index/$1";
$route['gerenciador/saladas/novo'] = "gerenciador/saladas/add_salada";
$route['gerenciador/saladas/editar/(:num)'] = "gerenciador/saladas/editar_salada/$1";
$route['gerenciador/saladas/excluir/(:num)'] = "gerenciador/saladas/excluir_salada/$1";
#Acompanhamentos
$route['gerenciador/acompanhamentos'] = "gerenciador/acompanhamentos/index";
$route['gerenciador/acompanhamentos/(:num)'] = "gerenciador/acompanhamentos/index/$1";
$route['gerenciador/acompanhamentos/novo'] = "gerenciador/acompanhamentos/add_acompanhamento";
$route['gerenciador/acompanhamentos/editar/(:num)'] = "gerenciador/acompanhamentos/editar_acompanhamento/$1";
$route['gerenciador/acompanhamentos/excluir/(:num)'] = "gerenciador/acompanhamentos/excluir_acompanhamento/$1";
#Carnes
$route['gerenciador/carnes'] = "gerenciador/carnes/index";
$route['gerenciador/carnes/(:num)'] = "gerenciador/carnes/index/$1";
$route['gerenciador/carnes/novo'] = "gerenciador/carnes/add_carne";
$route['gerenciador/carnes/editar/(:num)'] = "gerenciador/carnes/editar_carne/$1";
$route['gerenciador/carnes/excluir/(:num)'] = "gerenciador/carnes/excluir_carne/$1";
#Bebidas
$route['gerenciador/bebidas'] = "gerenciador/bebidas/index";
$route['gerenciador/bebidas/(:num)'] = "gerenciador/bebidas/index/$1";
$route['gerenciador/bebidas/novo'] = "gerenciador/bebidas/add_bebida";
$route['gerenciador/bebidas/editar/(:num)'] = "gerenciador/bebidas/editar_bebida/$1";
$route['gerenciador/bebidas/excluir/(:num)'] = "gerenciador/bebidas/excluir_bebida/$1";
#Marmitas
$route['gerenciador/marmitas'] = "gerenciador/marmitas/index";
$route['gerenciador/marmitas/(:num)'] = "gerenciador/marmitas/index/$1";
$route['gerenciador/marmitas/novo'] = "gerenciador/marmitas/add_marmita";
$route['gerenciador/marmitas/editar/(:num)'] = "gerenciador/marmitas/editar_marmita/$1";
$route['gerenciador/marmitas/excluir/(:num)'] = "gerenciador/marmitas/excluir_marmita/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */