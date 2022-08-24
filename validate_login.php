<?php 
    session_start();
    $authenticated_user = false;
    $user_id = null;
    $user_profiles_id = null;
    $profiles = array( 1 => 'Administrativo' , 2 => 'Usuário');


    $users_app = array(
        array('id'=>'1' ,'email'=> 'adm@teste.com.br' ,'senha' => '456', 'profiles_id' => 1),
        array('id'=>'1' ,'email'=> 'adm2@teste.com.br' ,'senha' => '456', 'profiles_id' => 1),
        array('id'=>'2','email'=> 'maria@teste.com.br' ,'senha' => '000', 'profiles_id' => 2),
        array('id'=>'3','email'=> 'jose@teste.com.br' ,'senha' => '000', 'profiles_id' => 2),
    );
    foreach($users_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $authenticated_user = true;
            $user_id = $user['id'];
            $user_profiles_id = $user['profiles_id'];
        }
    }
    if($authenticated_user){
        $_SESSION['authenticated'] = 'yes';
        $_SESSION['id'] = $user_id;
        $_SESSION['profiles_id'] = $user_profiles_id;
        header('Location:home.php');
    }else{
        $_SESSION['authenticated'] = 'no';
        header('Location:index.php?login=erro');
    }
?>