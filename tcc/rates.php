<?php include("header.php");?>

			<section id="survey" class="main style1 dark fullscreen">
				<div class="content container small">
                    <ul id='list'>
<?php
							include "connection.php";
                            if(isset($_POST['search'])){
								$sql="SELECT 
							distinct name,price_per_unit from `catalog_product` where name='".$_POST['search']."'";                
                            }
                            else
                            {
								$sql="SELECT *
							FROM `catalog_product` where category_id='".$_GET['id']."'";
                            }
							$categories = $con->query($sql);
                            $count =0;
                            echo "<center><table style='border:1px solid black;width:50%;'><tr><th style='border:1px solid black;padding:8px;'>Name</th><th style='border:1px solid black;padding:5px;'>Price</th></tr>";
                            while($row = $categories->fetch_assoc()){
                            echo "<tr><td style='border:1px solid black;padding:5px;'>".$row['name']."</td><td style='border:1px solid black;padding:8px;'>".$row['price_per_unit']."</td></tr>";
}
echo "</table></center>";
?>
</ul>
		
				</div>
			</section>


<?php include("footer.php");?>
