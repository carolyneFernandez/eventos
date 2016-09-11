<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0 maximum-scale=1.0,minimum-scale=1.0">
    <title>EVENTOS CIB </title>

      <link type="text/css" rel="stylesheet" href="index.css">
<link type="text/css" href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.6.min.js"></script>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript">

$(document).ready(function() {

    $("#enviar-btn").click(function() {

        var name = $("input#name").val();
        var comment = $("textarea#comment").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        var dataString = 'name=' + name + '&comment=' + comment;

        $.ajax({
            type: "POST",
            url: "addcomment.php",
            data: dataString,
            success: function() {
                $('#newmessage').append('<div><div><img width="48" height="48" src="images/user.png" /></div><div><strong>'+name+'</strong> dice:<br/><small>'+date_show+'</small></div><div>'+comment+'</div></div>');
            }
        });
        return false;
    });
});
</script>
<style>

      h5{
    font-weight: bold;
}</style>
</head>
    <body style=" background-image:url('./images/fondo.jpg')">
       <?php
        include("./plantilla/header.html");
        ?> 
<?php
require('comentarios.php');

$name = utf8_decode($_POST['name']);
$comment = utf8_decode($_POST['comment']);

$insert = mysql_query("INSERT INTO comments (name, text, date_added) VALUES ('$name', '$comment', now())", $conexion);
?>
        <div id="newmessage"></div>
<form method="post" action="">
    Nombre:<br/>
    <input type="text" id="name" name="name" size="40" /><br/><br/>
    Comentario:<br/>
    <textarea name="comment" id="comment" rows="6" cols="65"></textarea>
    <br/><br/>
    <div style="margin-left: 480px;"><input name="submit" type="submit" value="enviar" id="enviar-btn" /></div>
</form>


    </body>
</html>