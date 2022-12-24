<?php include '../classes/Category.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php';
require '../classes/AdminLogin.php';

$cat = new Category(); 
if( isset( $_GET['delete'] ) ){
    $id = $_GET['delete'];
    $deleted = $cat->delete( $id );
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php 
                if( isset( $deleted ) ){
                    echo $deleted;
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                        $categories = $cat->select(); ?>

                        <?php 
                        if( $categories ):
                            $i = 0;
                        while( $result = $categories->fetch_assoc() ):
                            $i++;
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="catEdit.php?id=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete');" href="?delete=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
                        <?php 
                        endwhile;
                    endif;
                        ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

