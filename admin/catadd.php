﻿<?php require '../classes/AdminLogin.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php';

$cat = new Category();

if( isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $insert_cat = $cat->insert( $name );
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php 
            if( isset( $insert_cat ) ) {
                echo $insert_cat;
            }
            ?>
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input name="name" value="" type="text" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>