<?php
if($loggedInUser){
echo'<script>location.href="'.ROOT_URL.'public?page=homePage"</script>';
   exit;
}

if(isset($_POST['login'])){
    ///logica

    $user=[
        'id'=>1,
        'email'=>'utente@mail.it',
        'is_admin'=> true
    ];

   $_SESSION['user']=$user;



}
?>

<form  method="POST">

<button type="submit" name="login">Login</button>

</form>