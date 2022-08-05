<?php
    session_start();
        if(isset($_SESSION['login']) != true )
        {
            echo '<script> location.href= "../index.html"; </script>';
            die();
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>


    <link rel="stylesheet" href="../css/style_menu.css">

</head>
<body>
        <div class="heder__superior">
			<div class="logo">
				<img src="../img/logo.png" alt="">
			</div>
			<div class="search">
				<input type="search" placeholder="¿Qué deseas buscar?">
			</div>
		</div>


        <div class="container_empresa">

            <div class = "background_insert_empresa">
                <form action="POST"  id= "insert_empresa">

                    <label for="id_persona"></label>
                    <select name="list_personas" id="list_personas">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>

                    </select>

                    <input type="text" name="id_persona" required>
                    
                    <label for=""></label>
                    <input type="text">

                    <label for=""></label>
                    <input type="text">



                </form>

            </div>

        </div>
</body>
</html>