<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div style="width:400px; height:600px; display: inline-block; float: left; border: 2px solid gray;">
            Product Details<br/>
            <form method="post" enctype="multipart/form-data" action="add.php">
                ID : <?php
                $file = 'products.txt';
                $openFile = file($file);
                if (filesize($file) == 0) {
                    echo $id = 1;
                } else {                    
                    $lastLine = $openFile[count($openFile)-1];
                    $expProd = explode(':', $lastLine);
                    echo $id = $expProd[0] + 1;
                }
                ?><br/>
                Name : <input type="text" name="prodName"><br/>
                Description : <input type="text" name="prodDesc"><br/>
                Price : <input type="text" name="prodPrice"><br/>
                Quantity : <input type="text" name="prodQty"><br/>
                Image : <input type="file" name="prodImg">
                <input type="submit" name="addProduct" value="ADD PRODUCT">
            </form>
        </div>
        
        <div style="width:655px; height:600px; display: inline-block; float: left; overflow:scroll; border: 2px solid gray;">
            <?php
            $ctr = 0;
            $x = 10;
            $y = 10;
            foreach ($openFile as $line) {
                $ctr++;
                $prodInfo = explode(':', $line);
                echo '<div style="width:200px; height:240px; display:inline-block; position:relative; top:'.$y.'px; left:'.$x.'px;"><img src="'.$prodInfo[5].'" style="width:200px; height:200px;">'.$prodInfo[1].'<br/>'.$prodInfo[3].'</div>';
                $x += 10;
                if ($ctr == 3) {
                    $y += 10;
                    $x = 10;
                    $ctr = 0;
                }
            }
            ?>
        </div>
    </body>
</html>