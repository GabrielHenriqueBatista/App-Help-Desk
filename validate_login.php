<?php 
    session_start();
    $authenticated_user = false;
    $users_app = array(
        array('email'=> 'adm@teste.com.br' ,'senha' => '456'),
        array('email'=> 'user@teste.com.br' ,'senha' => '123'),
    );
    foreach($users_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $authenticated_user = true;
        }
    }
    if($authenticated_user){
        $_SESSION['authenticated'] = 'yes';
        echo "Usuário autenticado";
        header('Location:home.php');
    }else{
        $_SESSION['authenticated'] = 'no';
        header('Location:index.php?login=erro');
    }
?>