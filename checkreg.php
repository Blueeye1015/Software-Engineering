<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2015/10/5
 * Time: 15:19
 */
header('Content-type: text/html; charset=gdk');
$name=$_POST['user_name'];

$password=$_POST['user_pswd'];

$n=strlen($name);

$p=strlen($password);

if($n == 0){

    echo "�������û���";

}elseif(!($n >= 5 && $n <= 16)){

    echo "�û�������Ϊ5-16λ";

}elseif($p == 0){

    echo "����������";

}elseif(!($p >= 5 && $p <= 16)){

    echo "���볤��Ϊ5-16λ";

}
else {
    $con = mysql_connect("localhost", "root", "");

    mysql_select_db("test", $con);

    mysql_query("set names utf8");

    $sql="INSERT INTO USER (name,password) VALUES ('$name','$password')";

    mysql_query($sql,$con);

    $row=mysql_affected_rows($con);

    if($row>0)

    {

        echo "ע��ɹ�";
        echo"<a href=login.html>���ص�¼ҳ�� </a>";

    }else{

        echo "ע��ʧ��";
        echo"<a href=register.html>����ע��ҳ�� </a>";
    }
}
