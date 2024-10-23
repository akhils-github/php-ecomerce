<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];
        $delete_query = "DELETE FROM `user_table` WHERE id = $delete_id";
        $delete_result = mysqli_query($con,$delete_query);
        if($delete_result){
            echo "<script>window.alert('Menu deleted successfully');</script>";
            echo "<script>window.open('index.php?list_users','_self');</script>";
        }
    }
?>