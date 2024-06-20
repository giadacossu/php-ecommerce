<?php 
$page=isset($_GET["page"]) ? $_GET["page"] : 'dashboard';//

?>
<?php include '../inc/init.php' ?>


<?php include ROOT_PATH .'public/templateParts/header.php' ?>

    <main class="container">

        <div class="row"> 
            <div class="col-9">
                
            <?php include ROOT_PATH .'admin/pages/' . $page.'.php';?>

            </div>

            <?php include ROOT_PATH .'public/templateParts/sidebar.php' ?>

        </div>

       

</main>
<?php include ROOT_PATH .'public/templateParts/footer.php' ?>
