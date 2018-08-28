<?php

//******************************集成函数********************************
/**
 * 加密字符串
 * @param string $data 字符串
 * @param string $key 加密key
 * @param string $iv 加密向量
 * @return string
 */
function encrypt($data, $key, $iv)
{
    $encrypted = @mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
    return base64_encode($encrypted);
}
 
/**
 * 解密字符串
 * @param string $data 字符串
 * @param string $key 加密key
 * @param string $iv 加密向量
 * @return object
 */
function decrypt($data, $key, $iv)
{
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
    $json_str = rtrim($decrypted, "\0");
    return json_decode($json_str);

}

$iv = "LINLONG_520";// 向量
$decrypt_key = "LINLONG_520";// 密钥

$data="<h1>我爱我家</h1>";

$encrypt_data=encrypt($data,$decrypt_key,$iv);

$arr=array('status'=>1,'data'=>$encrypt_data);


exit(json_encode($arr));
