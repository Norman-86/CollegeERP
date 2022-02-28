<?php
echo $time_difference_to_midnight = round(((strtotime(date("Y-m-d 23:59:59")) - strtotime(date("Y-m-d H:i:s")))/60));
?>
