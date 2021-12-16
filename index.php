<?php require_once "header.php";

$ip = $_SERVER['REMOTE_ADDR'];
$conn->query("insert count_page set Cou_Date = now(),Cou_IP = '$ip'");
?>

		<!--//sreen-gallery-cursual---->
	<div style="padding: 20px 100px">
	<h2 style="color: gray; text-align: center; padding-bottom: 50px; padding-top: 20px;">สินค้ามาใหม่</h2>
   <div style="display: grid;  grid-template-columns: 1fr 1fr 1fr 1fr; grid-column-gap: 40px;  grid-row-gap: 40px;">
	 <?php $sql = $conn->query("select * from product order by Pro_ID desc limit 0,6");
            while ($show = $sql->fetch_assoc()){
              ?>

	  <div style="background: #fff;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; border-radius: 10px; overflow: hidden;">
   
      <a href="view_product.php?id=<?php echo $show['Pro_ID'];?>" height="100%" width="100%">
        <img width="100%" src="images/product/<?php echo $show['Pro_Img'];?>" alt="">
      </a>
      <div style="padding:20px 20px;">
      <div style="font-size: 16px; font-weight: 600; color:  gray;"><?php echo ($show['Pro_Name']);?></div>
      <div style="padding:15px 0px; font-size: 16px; color:rgb(255, 133, 19);">
        <?php echo number_format($show['Pro_Price']-$show['Pro_Discount'],0);?> บาท
      </div>
      <!-- <?php if($show['Pro_Discount']!=""){?>
        <h4  class="text-success">
        <b><S><?php echo number_format($show['Pro_Price'],0);?></S></b>
        </h4>
        <label  class="add-to"><?php echo number_format($show['Pro_Price']-$show['Pro_Discount'],0);?> บาท</label>
        <label  class="text-info">
        ส่วนลด: <?php echo $show['Pro_Discount'];?>
        </label>
        <?php } else {?>
        <label  class="add-to">
        <?php echo number_format($show['Pro_Price'],0);?> บาท
        </label>
        <?php } ?>
        <br> -->
        <button class="btn-cart" type="button" onclick="window.location='?data=cart&pro_id=<?php echo $show['Pro_ID'];?>'">Add to cart </button>
      </div>
      <!-- <div class="caption">
        <h3><a href="view_product.php?id=<?php echo $show['Pro_ID'];?>"><?php echo iconv_substr($show['Pro_Name'],0,10,'UTF-8').'...';?></a></h3>
        <?php if($show['Pro_Discount']!=""){?>
                <h4  class="text-success">
                <b><S><?php echo number_format($show['Pro_Price'],0);?></S></b>
                </h4>
                <label  class="add-to"><?php echo number_format($show['Pro_Price']-$show['Pro_Discount'],0);?> บาท</label>
                <label  class="text-info">
                ส่วนลด: <?php echo $show['Pro_Discount'];?>
                </label>
                <?php } else {?>
                <label  class="add-to">
                <?php echo number_format($show['Pro_Price'],0);?> บาท
                </label>
                จำนวนสั่งซื้อ: <?php echo $show['Pro_Buy'];?>
                <?php } ?>
        <p><button type="button" onclick="window.location='?data=cart&pro_id=<?php echo $show['Pro_ID'];?>'" class="btn btn-danger">Add to cart</button></p>
      </div> -->

  </div>
	
	<?php } Chk_Row($sql);?>
                </div>

	
	
	</div>
	<!---->


	<br>

<?php require_once "footer.php";?>

</body>
</html>