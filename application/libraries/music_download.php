<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * =====================================================================================
 *
 *        Filename:  poem_common.php
 *
 *     Description:  类库
 *
 *         Created:  2016-05-09 15:46:32
 *
 *          Author:  huazhiqiang
 *
 * =====================================================================================
 */

class Music_download {
	
	/**
 * @param string $img_url 下载文件地址
 * @param string $save_path 下载文件保存目录
 * @param string $filename 下载文件保存名称
 * @return bool
 */
function downloadFile($file){ 
    $file_name = $file; 
    $mime = 'application/force-download'; 
    header('Pragma: public');     // <a href="http://www.jbxue.com/zt/require/" target="_blank" class="infotextkey">require</a>d 
    header('Expires: 0');        // no cache 
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
    header('Cache-Control: private',false); 
    header('Content-Type: '.$mime); 
    header('Content-Disposition: attachment; filename="'.basename($file_name).'"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Connection: close'); 
    readfile($file_name);        // push it out 
    exit(); 
}

}