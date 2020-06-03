<?php
    

    session_start();
    
  
    include 'conexao.php';
    
   
    function login($email, $senha) {
        global $con;
        
        $email = mysqli_real_escape_string($con, $email);
        $senha = mysqli_real_escape_string($con, $senha);
        
        return mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
    }
    
    if (isset($_SESSION['email']) && ! empty($_SESSION['email'])) {
        return header("Location: index.php");
    }
    
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $login = login($_POST['email'], $_POST['senha']);
        if ($login->num_rows == 1) {
            $_SESSION['email'] = $_POST['email'];
            header("Location: index.php");
        }
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>FarmSol</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
    </head>
    
    <body>
        <br><br><br><br>    
        <div class="container" style="max-width: 400px">
            
            <?php if (isset($_POST['email'])) : ?>
            <div class="alert alert-danger">Usuário e senha inválido!</div>
            <?php endif; ?> 
            
            <form action="login.php" method="post">
           <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="login.php">
      <img src="assets/brands/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Farmácia Solidária
  </a>
</nav>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
     <div class="entrar">
         
    <button type="submit" class="btn btn-primary">Entrar</button>
     </div>
</form>
            
        </div>
       
    </body>
</html>

