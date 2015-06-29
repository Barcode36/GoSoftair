<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $config;

$config['smarty']['template_dir'] =
'C:\xampp\htdocs\GoSoftair\templates\main\template';
$config['smarty']['compile_dir'] =
'C:\xampp\htdocs\GoSoftair\\templates\main\templates_c';
$config['smarty']['config_dir'] =
'C:\xampp\htdocs\GoSoftair\\templates\main\configs';
$config['smarty']['cache_dir'] =
'C:\xampp\htdocs\GoSoftair\\templates\main\cache';

$config['debug']=false;
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = 'pwmysql';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'softair';

//configurazione server smtp per invio email
$config['smtp']['host'] = 'smtp.cheapnet.it';
$config['smtp']['port'] = '25';
$config['smtp']['smtpauth'] = false;
$config['smtp']['username'] = '';
$config['smtp']['password'] = '';

$config['email_webmaster']='webmaster@bookstore.lamjex.com';
$config['url_softair']='http://localhost/GoSoftair';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>
