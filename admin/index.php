<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2> Dashbord</h2>
        <div class="block">
            Welcome admin panel
            <br>
            <?php 
            $num = 'Hello100';
            $num = intval( $num );
            echo '<pre>';
            print_r( $num );
            echo '</pre>';
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>