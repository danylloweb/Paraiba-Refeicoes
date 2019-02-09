<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * get_video_id()
 * 
 * @param mixed $url
 * @return string
 */
function get_video_id($url)
{
    if (!empty($url)) {
        parse_str(parse_url($url, PHP_URL_QUERY), $result);
        return $result['v'];
    } else {
        return FALSE;
    }
}
//function reference
// parse_url() :
//parse_str() 
?>
