
<?php include("header.php");?>

			<section id="survey" class="main style1 dark fullscreen">
				<div class="content container small">
<form action='rates.php' method='post'><center><input list="Test" style='width:40%' name='search'><br><br><input type='submit' value='Search'></center></form>
<?php
							include "connection.php";
						    $sql="SELECT *
							FROM `catalog_category` where parent_id is null";
							$categories = $con->query($sql);
                            echo "<datalist id='Test'>";
                            while($row = $categories->fetch_assoc()){
           $sub_categories_two = $con->query("Select * from `catalog_category` where name='".$row['name']." : Lab Work'");
  
                           while($sub_cat_two = $sub_categories_two->fetch_assoc()){
                              $sub_categories_three = $con->query("Select * from `catalog_category` where parent_id ='".$sub_cat_two['id']."'");
                           while($sub_cat_three = $sub_categories_three->fetch_assoc()){
                              $sub_categories_four = $con->query("Select distinct name from `catalog_product` where category_id ='".$sub_cat_three['id']."'");

                           while($sub_cat_four = $sub_categories_four->fetch_assoc()){
                           echo "<option value='".$sub_cat_four['name']."'>";
}
}   
}                         
}

                           echo "</datalist>";

?>
                    <ul id='list'>

<?php
								$sql="SELECT *
							FROM `catalog_category` where parent_id is NULL";
							$categories = $con->query($sql);
                            $count =0;
                            while($row = $categories->fetch_assoc()){
                            echo "<li value='".$row['name']."' ><a href='#'>".$row['name']."</a></li>";
                            echo "<input type='hidden' value='".$row['name']."' id='".$count."'>";
                            $sub_categories = $con->query("Select * from `catalog_category` where name = '".$row['name']." : Lab Work'");
                          
                            while($sub_cat = $sub_categories->fetch_assoc()){
                                       
                            $sub_categories_two = $con->query("Select * from `catalog_category` where parent_id ='".$sub_cat['id']."'");
                            echo "<ul id='".str_replace(" ","_",$row['name'])."'>";
                            while($sub_cat_two = $sub_categories_two->fetch_assoc()){
                            
                            echo "<li><a href='rates.php?id=".$sub_cat_two['id']."' style='color:green;font-weight:bold'>".$sub_cat_two['name']."</a></li>";                       
}                           
echo "</ul>";
}
$count++;
}
?>
</ul>
		
				</div>
			</section>



<?php include("footer.php");?>

