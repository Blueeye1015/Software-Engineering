<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2015/10/5
 * Time: 15:05
 */
header("content-type:text/html;charset=gdk");
$con = mysql_connect("localhost","root","");
mysql_query("set names utf8");
mysql_select_db("test", $con);
$name = $_POST['user_name'];
$password = $_POST['user_pswd'];
$sql = "select * from USER where name = '{$name}'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num)
{
    $row=mysql_fetch_array($result);
    if($password == $row['password'])
    {
        setcookie("USER",$name,time()+3600*24);
        echo "��¼�ɹ�������Ϊ����ת����¼ǰҳ��";
        header("location:homepage.php");
    }
    else
    {
        setcookie("USER",'',time()-1);
        echo"���벻��ȷ";
        echo"<a href=login.html>���ص�¼ҳ�� </a>";
    }
}
else
{
    echo"�û�������";
    echo"</br>";
    echo"<a href=login.html>���ص�¼ҳ��</a>";

}