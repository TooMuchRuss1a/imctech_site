<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    include (__ROOT__. '/lib/db.php');

    $groups = array();
    $result = mysqli_query($db, "SELECT `agroup` FROM `tbl_springpschool2022`");
        while( $row = mysqli_fetch_assoc($result) ){
            if (isset($groups[$row['agroup']])) {
                $groups[$row['agroup']]++;
            }
            else {
                array_push($groups, [$row['agroup']]);
                $groups[$row['agroup']] = 1;
            }
        }
        while ($groups) {
            echo $groups;
        }

?>