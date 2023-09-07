<?php 
	include "resources/initiate.php";
	$title = "national-nep-Liquor - Whiskey";
	$style = "styles/browse.css";
	include "components/header.php";
	$action = "browse.php?view=bar";
?>
<!-- 
<div class="banner">
	<img src="images/typebanners/<?php 
	if(isset($_GET['drink'])){
		echo $_GET['drink'];
	}else{
		echo "all";
	} ?>.jpg" alt="Bar" class="banner-image">
</div>
<div id="filter-box"> -->

<?php include "components/filter.php"; ?>

<?php


	$thumbs = 8;
	$limit = " LIMIT $thumbs";
	if(!isset($_GET['page'])){$_GET['page'] = 1;}
	$offset = ($_GET['page'] - 1)*$thumbs;
	$limit .= " OFFSET ".$offset;

	
	//QUERIES DB WITH FILTERS
	$query = construct_query();
	$total=mysqli_query($db, $query);
	$numberofrows = mysqli_num_rows($total);//TOTAL MATCHES
	
	//RETURNS ONLY PRODUCTS IN VIEW
	$pagequery = $query.$limit;
	$page=mysqli_query($db, $pagequery);
	
	$_SESSION['filters'] = null;
	$_SESSION['filters'] = get_filters();
?>
<!-- 
	<div id="view-buttons"><?php echo
			'<a href="browse.php?'.$_SESSION['filters'].'&view=grid"><img src="images/gridview.png" alt="grid view"></a>
			 <a href="browse.php?'.$_SESSION['filters'].'&view=bar"><img src="images/barview.png" alt="bar view"></a>';
	?></div> -->
</div>

<?php
	
	echo "<div class=\"info-panel\"><i>$numberofrows products</i></div>";
	
	if (isset($_GET['view']) && $_GET['view']=="bar") {
		while ($row=mysqli_fetch_assoc($page)) { 
			echo product_bar($row);
		}
	} else {
		while ($row=mysqli_fetch_assoc($page)) {
			echo product_thumb($row);
		}
	}
	
?>

<div id="page-select">
	<?php
		$pagecount = ceil($numberofrows/$thumbs);
		//ONLY SHOWS PAGE-SELECT IF MORE THAN 1 PAGE
		if ($pagecount>1){
			for($i=1;$i<=$pagecount;$i++){
				echo '<a class="page-buttons" ';
				if ($i == $_GET['page']){echo 'id="selected"';}
				echo ' href="browse.php?page='.$i.'&'.$_SESSION['filters'].'">'.$i.'</a>';
			}
		}
	?>
</div>


<?php include "components/footer.php"; ?>