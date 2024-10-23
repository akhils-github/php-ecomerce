<?php
    if(isset($_GET['delete_menu'])){
        $delete_id = $_GET['delete_menu'];
        $delete_query = "DELETE FROM `menus` WHERE id = $delete_id";
        $delete_result = mysqli_query($con,$delete_query);
        if($delete_result){
            echo "<script>window.alert('Menu deleted successfully');</script>";
            echo "<script>window.open('index.php?view_menus','_self');</script>";
        }
    }
?>