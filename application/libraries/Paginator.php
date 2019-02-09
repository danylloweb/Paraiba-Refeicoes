<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *  @author Erick Amaral
 *
 */
class Paginator {

	private $ci;
	private $order;
	private $sort;
	private $show;
	private $page;
	private $total;
	private $pages;
	private $limit;
	private $embed;
	private $status;

	/**
	 * Construct
	 **/
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	/**
	 * Bootstrap the pagination
	 *
	 * @param string model - Name of model
	 * @param string order - Field to order table
	 * @param string sort - Sort to order table
	 * @param string show - Quantity register shows to page
	 * @param string page - Page to view
	 * 
	 * @return array - Data
	 */
	public function initialize($configs)
	{
		$this->embed  = isset($configs['embed']) ? $configs['embed'] : null;

		$this->order  = $this->_valid_order($configs['order']);
		$this->sort   = $this->_valid_sort($configs['sort']);
		$this->show   = $this->_valid_show($configs['show']);
		$this->total  = $this->_valid_total($configs['total']);
		$this->page   = $this->_valid_page($configs['page']);
		$this->pages  = $this->_valid_pages();
		$this->limit  = $this->_valid_limit();

		$this->status = true;
	}

	/**
	 * Show de reset button
	 *
	 * @param text - Texto content on button
	 * @param attr - Attributes to add on button
	 **/
	public function reset($text = 'Reset', $attr = array())
	{
		return anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method, $text, $attr);
	}

	/**
	 * Show the link for sort table
	 *
	 * @param string order - Field to sort
	 * @param string text - Content of link
	 */
	public function sort($order = null, $text = null)
	{
		if($this->total == 0){
			return $text;
		}

		return anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $order . '/' . ($this->order == $order && $this->sort == 'asc' ? 'desc' : 'asc') . '/' . $this->show . '/' . $this->page, $text, ($this->order == $order ? 'class="' . $this->sort . '"' : null));
	}

	/**
	 * Show the field of filter table
	 *
	 * @param string order - Field to sort
	 * @param string text - Content of link
	 */
	public function filter($search_field = 'search', $name = null, $options = null, $class = null, $id = null)
	{
		$ci =& get_instance();

		$input = $ci->input->post($search_field);
		
		$filter = form_open($ci->router->directory . $ci->router->class .'/'. $ci->router->method);


		if($options){
			$filter .= form_dropdown("{$search_field}[$name]", $options, isset($input[$name]) ? $input[$name] : null, 'onchange="this.parentNode.submit();" class="' . $class. ' " id="' . $id . '"');
		}else{
			$data['name'] = "{$search_field}[$name]";
			$data['value'] = isset($input[$name]) ? $input[$name] : null;
			$data['class'] = is_null($class) ? '' : $class;
			$data['id'] = is_null($id) ? '' : $id;
			$data['placeholder'] = '...';

			$filter .= form_input($data);
		}

		$filter .= form_close();

		return $filter;
	}

	/**
	 * Show the first page link
	 *
	 * @param string text - Content o link
	 */
	public function first($text = null, $class = array('link' => 'current'))
	{
		$link = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			if($this->page > 1){
				$link .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
				$link .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . 1, $text, 'title="Primeira página" ' . $class_link);
				$link .= $this->embed ? '</' . $this->embed . '>' : '';

				return $link;
			}
		}

		return null;
	}

	/**
	 * Show the last page link
	 *
	 * @param string text - Content o link
	 */
	public function last($text = null, $class = array('link' => 'current'))
	{
		$link = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			if($this->page < $this->pages){
				$link .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
				$link .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . $this->pages, $text, 'title="Última página" ' . $class_link);
				$link .= $this->embed ? '</' . $this->embed . '>' : '';

				return $link;
			}
		}

		return null;
	}

	/**
	 * Show the preview page link
	 *
	 * @param string text - Content o link
	 */
	public function preview($text = null, $class = array('link' => 'current'))
	{
		$link = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			if($this->page > 1){
				$link .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
				$link .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . ($this->page - 1), $text, 'title="Página anterior" ' . $class_link);
				$link .= $this->embed ? '</' . $this->embed . '>' : '';

				return $link;
			}
		}

		return null;
	}

	/**
	 * Show the next page link
	 *
	 * @param string text - Content o link
	 */
	public function next($text = null, $class = array('link' => 'current'))
	{
		$link = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			if($this->page < $this->pages){
				$link .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
				$link .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . ($this->page + 1), $text, 'title="Próxima página" ' . $class_link);
				$link .= $this->embed ? '</' . $this->embed . '>' : '';
				
				return $link;
			}
		}

		return null;
	}

	/**
	 * Show the links before current page
	 *
	 * @param int quantity - Quantity of links retorned
	 */
	public function before($quantity = 3, $class = array('link' => 'current'))
	{
		$links = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			for($i = $this->page - $quantity; $i < $this->page; $i++){
				if($i > 0){
					$links .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
					$links .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . $i, $i, 'title="Página: '.$i.'" ' . $class_link);	
					$links .= $this->embed ? '</' . $this->embed . '>' : '';
				}
			}
		}

		return $links;
	}

	/**
	 * Show the links after current page
	 *
	 * @param int quantity - Quantity of links retorned
	 */
	public function after($quantity = 3, $class = array('link' => 'current'))
	{
		$links = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			for($i = $this->page + 1; $i <= $this->page + $quantity; $i++){
				if($i <= $this->pages){
					$links .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
					$links .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . $i, $i, 'title="Página: '.$i.'" ' . $class_link);	
					$links .= $this->embed ? '</' . $this->embed . '>' : '';
				}
			}
		}

		return $links;
	}

	/**
	 * Show the number of current page
	 *
	 */
	public function current($class = array('link' => 'current'))
	{
		$link = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			$link .= $this->embed ? '<' . $this->embed . ' ' . ($class_embed) . '>' : '';
			$link .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . $this->page, $this->page, 'title="Página atual" ' . $class_link);
			$link .= $this->embed ? '</' . $this->embed . '>' : '';

			return $link;
		}

		return null;
	}

	/**
	 * Show the links of all pages
	 *
	 */
	public function numbers($class = array('link' => 'current'))
	{
		$links = '';

		$class_embed = isset($class['embed']) ? 'class="' . $class['embed'] . '"' : '';
		$class_link   = isset($class['link']) ? 'class="' . $class['link'] . '"' : '';

		if($this->pages > 1){
			for($i = 1; $i <= $this->total; $i++){
				$links .= $this->embed ? '<' . $this->embed . ' ' . $class_embed . '>' : '';
				$links .= anchor($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show . '/' . $i, $i, 'title="Página: '.$i.'" ' . ($i == $this->page ? $class_link : ''));
				$links .= $this->embed ? '</' . $this->embed . '>' : '';
			}
		}

		return $links;
	}

	/**
	 * Show the select for go to the determinate page
	 *
	 */
	public function go($name = 'go')
	{
		$options = array();

		if($this->pages > 1){
			for($i = 1; $i <= $this->pages; $i++){
				$options[$i] = $i;
			}

			return form_dropdown('page', $options, $this->page, 'onchange="location.href=\'' . site_url($this->ci->router->directory . $this->ci->router->class .'/'. $this->ci->router->method . '/' . $this->order . '/' . $this->sort . '/' . $this->show) . '/\' + this.value;"');
		}

		return null;
	}

	/****************************************************************************************
	 *
	 * GETTERS E SETTERS
	 *
	 ****************************************************************************************/

	/**
	 * Getter order
	 *
	 */
	public function get_order()
	{
		return $this->order;
	}

	/**
	 * Getter sort
	 *
	 */
	public function get_sort()
	{
		return $this->sort;
	}

	/**
	 * Getter show
	 *
	 */
	public function get_show()
	{
		return $this->show;
	}

	/**
	 * Getter page
	 *
	 */
	public function get_page()
	{
		return $this->page;
	}

	/**
	 * Getter total
	 *
	 */
	public function get_total()
	{
		return $this->total;
	}

	/**
	 * Getter pages
	 *
	 */
	public function get_pages()
	{
		return $this->pages;
	}

	/**
	 * Getter fields
	 *
	 */
	public function get_fields()
	{
		return $this->fields;
	}

	/**
	 * Getter limit
	 *
	 */
	public function get_limit()
	{
		return $this->limit;
	}

	/**
	 * Getter status
	 *
	 */
	public function get_status()
	{
		return $this->status ? true : false;
	}

	/****************************************************************************************
	 *
	 * VALIDATION METHODS
	 *
	 ****************************************************************************************/

	/**
	 * Valid the order value
	 *
	 * @param string value
	 */
	private function _valid_order($value)
	{
		return $value;
	}

	/**
	 * Valid the sort value
	 *
	 * @param string value
	 */
	private function _valid_sort($value)
	{
		if($value == 'asc' || $value == 'desc'){
			return $value;
		}

		return 'asc';
	}
	
	/**
	 * Valid the show value
	 *
	 * @param string value
	 */
	private function _valid_show($value)
	{
		return (int) $value;
	}

	/**
	 * Valid the total value
	 */
	private function _valid_total($value)
	{
		return (int)$value;
	}

	/**
	 * Valid the page value
	 *
	 * @param string value
	 */
	private function _valid_page($value)
	{
		if($value > 0 && $value <= ceil($this->total / $this->show)){
			return $value;
		}

		return 1;
	}

	/**
	 * Valid the total pages
	 */
	private function _valid_pages()
	{
		return ceil($this->total / $this->show);
	}

	/**
	 * Valid the limit value
	 *
	 * @param string value
	 */
	private function _valid_limit()
	{
		return ($this->show * $this->page) - $this->show;
	}

}