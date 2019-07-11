<?php
$file = 'products.txt';
$prodName = $_POST['prodName'];
$prodDesc = $_POST['prodDesc'];
$prodPrice = $_POST['prodPrice'];
$prodQty = $_POST['prodQty'];
$id = 0;

if ($_POST['addProduct']) {
    $name = $_FILES['prodImg']['name'];
    $tmp_name = $_FILES['prodImg']['tmp_name'];
    if ($name) {
        $location = 'upload/'.$name;
        move_uploaded_file($tmp_name, $location);
        if ($handle = fopen($file, 'a+')) {
            if (filesize($file) == 0) {
                $id = 1;
            } else {
                $line = file($file);
                $lastLine = $line[count($line)-1];
                $expProd = explode(':', $lastLine);
                $id = $expProd[0] + 1;
            }
            $content = $id.':'.$prodName.':'.$prodDesc.':'.$prodPrice.':'.$prodQty.':'.$location;
            fwrite($handle, $content."\r\n");
            echo 'Added <a href="index.php">Balik</a>';
        }
    }
    fclose($handle);
}
?>
