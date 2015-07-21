<?php
/**
 * @ignore
 */

global $config;
$config['php']['basedir'] =$_SERVER["DOCUMENT_ROOT"]."/achieved";
$config['php']['static_data_dir'] =$config['php']['basedir']."/data";

$config['smarty']['template_dir'] ='./templates/main/template/';
$config['smarty']['compile_dir'] ='./templates/main/templates_c/';
$config['smarty']['config_dir'] ='./templates/main/configs/';
$config['smarty']['cache_dir'] ='./templates/main/cache/';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


$config['debug'] = false;
$config['mysql']['user'] ='root';
$config['mysql']['password'] ='pippo';
$config['mysql']['host'] ='localhost';
$config['mysql']['database'] ='softair';

//configurazione server smtp per invio email
$config['smtp']['host']= 'ssl://smtp.gmail.com';
$config['smtp']['port']='465';
$config['smtp']['smtpauth']=true;
$config['smtp'] ['username']='webmasterachieved@gmail.com';
$config['smtp']['password']='password';
$config['email_webmaster']='webmasterachieved@gmail.com';
$config['url_achieved']='http://localhost/achieved';

