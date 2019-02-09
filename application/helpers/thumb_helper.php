<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function image_thumb($image_path, $width, $height, $crop = FALSE, $ratio = TRUE)
{
    $CI =& get_instance();
    $ext = explode(".", $image_path);
    $nfile = explode("/", $ext[0]);
    $narquivo = end($nfile);

    $image_thumb = 'public/uploads/tmp/' .$narquivo.'_'.$width . '_' . $height . '.'.$ext[1];

    if( ! file_exists($image_thumb))
    {
        $CI->load->library('image_lib');

        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_path;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = $ratio;
        //$config['master_dim']       = 'height';
        $config['height']           = $height;
        $config['width']            = $width;
        if($crop){
        	$config['x_axis']       = 50;
        	$config['y_axis']       = 50;
        }
        $CI->image_lib->initialize($config);
        if ($crop)
        	$CI->image_lib->crop();
        else 
        	$CI->image_lib->resize();
        
        $CI->image_lib->clear();
    }

    //return '<img src="'.base_url().$image_thumb.'" width="'.$width.'" height="'.$height.'"/>';
    return base_url($image_thumb);
}
/*
function image_thumb($image_path, $height, $width,$crop = FALSE,$ratio = TRUE) {

	$CI =& get_instance();
	$ext = strchr($image_path, '.');
	$file_name = substr(basename($image_path), 0, -strlen($ext));

	$image_thumb = dirname($image_path) . '/'.$file_name.'_' . $height . '_' . $width . $ext;

	if( ! file_exists($image_thumb)) {

		$CI->load->library('image_lib');

		$config['image_library']    = 'gd2';
		$config['source_image']        = $image_path;
		$config['new_image']        = $image_thumb;
		$config['maintain_ratio']    = $ratio;
		$config['height']            = $height;
		$config['width']            = $width;
		$CI->image_lib->initialize($config);
		if($crop)
			$CI->image_lib->crop();
		else
			$CI->image_lib->resize();
		$CI->image_lib->clear();
	}

	return img($image_thumb);
}
*/



function parceiro_show($arquivo){
	
	$CI =& get_instance();
	$ext = explode(".", $arquivo);
    
    if (file_exists($arquivo)){
    	
    	if ($ext[1] == 'swf'){
    		$banner = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="145" height="105">
       					 <param name="movie" value="'.base_url().$arquivo.'" />
        				<!--[if !IE]>-->
        				<object type="application/x-shockwave-flash" data="'.base_url().$arquivo.'" width="145" height="105">
        				<!--<![endif]-->
          				<p>Flash não instalado</p>
        				<!--[if !IE]>-->
        				</object>
        				<!--<![endif]-->
      					</object>';
    	}else{
    		
    		$banner = '<img src="' . base_url(). $arquivo . '" width="145" />';
    	}
    	
    	return $banner;
    }
    
}

