<?php
session_start();
require('config.php');
$sql = "DELETE FROM products WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    echo '<script type="text/javascript">
    console.log("Record deleted successfully");
</script> ';
header('Location: ../Pages/products/products.php');

} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>