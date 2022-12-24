<?php require '../classes/AdminLogin.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php';

$cat = new Category();

if( ! isset( $_GET['id']) || NULL == $_GET['id'] ){
    echo '<script> window.location = "catlist.php" ';
}else{
    $id = $_GET['id'];
}

if( isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $insert_cat = $cat->update( $name, $id );
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Category</h2>
        <div class="block copyblock">
            <?php 
            if( isset( $insert_cat ) ) {
                echo $insert_cat;
            }

            $category = $cat->get_cat_by_id( $id ); 

            if( $category ):
                while( $result = $category->fetch_assoc() ): ?>
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input name="name" value="<?php echo $result['name']; ?>" type="text" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>