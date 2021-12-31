<?php
error_reporting(0);
function curl(
$url,$httpheader=0,$post=0,$request=0,$proxy=0){ 
// url, httpheaders, postdata, request, proxy
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
      if($httpheader){
      curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
      }
      if($post){
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      }
      if($request){
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
      }
      if($proxy){
      curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);}
    curl_setopt($ch, CURLOPT_HEADER, true);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
      if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
    $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    curl_close($ch);
return array($header, $body);}
}
function head(){
$ua=array();
$ua[]="Host: www.speedssh.com";
$ua[]="X-Requested-With: XMLHttpRequest";
$ua[]="Referer: https://www.speedssh.com/";
return $ua;
}
function sg(){
$url="https://www.speedssh.com/ssh-ssl-singapore";
return curl($url,head());
}
function sg2(){
$url="https://www.speedssh.com/create-ssl-account-server/247/server-singapore-ssl/tls-2";
return curl($url,head());
}
function verif(){
global $sid,$name,$pass;
$url="https://www.speedssh.com/create-account-ssl.php";
$data="serverid=".$sid."&username=".$name."&password=".$pass;
return curl($url,head(),$data);
}

$hijau = "\33[32;1m";
$biru = "\33[0;36m";
$biru1 = "\e[1;34m";
$merah = "\33[31;1m";
$putih = "\e[1;37m";
$dark="\033[1;30m";
$kuning = "\33[1;33m";
$cyan = "\e[1;36m";
$ungu = "\e[1;35m";
$abu = "\e[1;30m";
$end = "\033[0m";
$babu = "\033[100m";
$bmerah = "\033[101m";
$bputih = "\033[107m";
system("clear");

echo"\n {$putih}██{$merah}╗ {$putih} ██{$merah}╗{$putih}███████{$merah}╗ {$putih}██████{$merah}╗ \n";
echo" {$putih}██{$merah}║ {$putih}██{$merah}╔╝{$putih}██{$merah}╔════╝{$putih}██{$merah}╔════╝ \n";
echo" {$putih}█████{$merah}╔╝{$putih} █████{$merah}╗  {$putih}██{$merah}║ \n";
echo" {$putih}██{$merah}╔═{$putih}██{$merah}╗ {$putih}██{$merah}╔══╝  {$putih}██{$merah}║     \n";
echo" {$putih}██{$merah}║  {$putih}██{$merah}╗{$putih}██{$merah}║     ╚{$putih}██████{$merah}╗ [{$putih}By{$merah}] [{$putih}Shinigami{$merah}]\n";
echo" {$merah}╚═╝  ╚═╝╚═╝      ╚═════╝ [{$putih}Sc{$merah}] [{$putih}speedssh{$merah}]\n\n";

$sg=sg()[1];
$sg2=sg2()[1];
$hos=explode('<br>',explode('											Host Ip: ',$sg2)[1])[0];
$aktiv=explode('<br>',explode('											Active   : ',$sg2)[1])[0];
$sisa=explode(" ;",explode("valuemax =' 100 ' style = ' width : ",$sg2)[1])[0];
echo$hijau." » {$putih}Info Server\n";
echo$hijau." ❑ {$putih}Host : {$hijau}$hos\n";
echo$hijau." ❑ {$putih}Aktiv: {$hijau}$aktiv\n";
echo$hiaju." ❑ {$putih}Availabel: {$hijau}$sisa\n\n";

$name=readline("{$putih} Input Username: {$hijau}");
$pass=readline("{$putih} Input Password: {$hijau}");
$sid="247";
$versg2=verif()[1];
$msg=explode(',',explode('<b class="alert alert-default">',$versg2)[1])[0];
if($msg=="Oops"){
echo" {$merah}[ OOPS ]\n";
echo" {$putih}Kamu sudah membuat 3 akun, kembali lagi besok\n";
exit;
}else{
echo$hijau." [ SUCCES ]\n";
echo$hijau." Akun Tersimpan di file sg2.txt\n";
sleep(2);
file_put_contents("sg2.txt",$versg2);
}