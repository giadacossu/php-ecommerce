<?php

$errorMss='';

if($loggedInUser){
echo'<script>location.href="'.ROOT_URL.'public?page=homePage"</script>';
   exit;
}

if(isset($_POST['login'])){
    ///logica
    $email=htmlspecialchars(trim($_POST['email']));
    $pssw=htmlspecialchars(trim($_POST['pssw']));


  $userMang=new UserManager();
  $result=$userMang->login($email,$pssw);
if($result){
    echo'<script>location.href="'.ROOT_URL.'public?page=homePage"</script>';

}else{
 $errorMss='login fallito';
}


}
?>

<form  method="POST">
<div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control">

    </div>
    <div class="form-group">
        <label for="pssw">Password</label>
        <input id="pssw" name="pssw" type="password" class="form-control">

    </div>
    
    <div class="text-danger"> 
        <?php if($errorMss){
          echo $errorMss;
          } ?>

    </div>
<button class="btn btn-primary " type="submit" name="login">Login</button>

</form>