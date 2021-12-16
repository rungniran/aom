<?php require_once "header.php";?>

<?php
//insert data member
if($_REQUEST['data']=='register'){

//check data ซ้ำ
$sql = $conn->query ("select * from member")or die (mysqli_error());
$show = $sql->fetch_assoc();

if($_REQUEST['user']==$show['Mem_User']){

Alert_Return('Username ซ้ำกับในระบบ');

}
else if($_REQUEST['email']==$show['Mem_Email']){

Alert_Return('Email ซ้ำกับในระบบ');

}
else {
$sql = $conn->query("insert member set Mem_User = '$_REQUEST[user]',Mem_Pass = '$_REQUEST[pass]',Mem_Name = '$_REQUEST[name]',Mem_Email = '$_REQUEST[email]',
Mem_Tel = '$_REQUEST[tel]',Mem_Address = '$_REQUEST[address]',Mem_Date = now(),Mem_Permission = 1,Mem_Status = 2");

Chk_Insert($sql,'สมัครสมาชิกเรียบร้อย','login.php');
}

}
?>

		<!--//sreen-gallery-cursual---->
	<div style="display: grid;  grid-template-columns: 1fr 1fr ">
   

	
	<div style="display: flex; justify-content: center; align-items: center;"> 
    <img src="https://cdn.pixabay.com/photo/2021/11/08/19/24/whale-6779942_960_720.png" width="80%">
</div>

	<div style="padding: 30px 100px;" >
    
		<form id="myform1" method="post" action="?data=register" style="padding: 20px 50px; background: #ffffff; border-radius: 10px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
<div style="font-size: 30px; color: #ffa861;">สมัครสมาชิก</div><br>
      <div class="form-group">
            <div class="lable">Username:</div>
            <input name="user" type="text"  required value="<?php echo $show['Mem_User'];?>">
          </div>

      <div class="form-group">
            <div class="lable">Password: <span class="text-danger small lable">(ไม่น้อยกว่า 6 หลัก)</span></div>
            <input name="pass" type="password"  minlength="6" required value="<?php echo $show['Mem_Pass'];?>">
          </div>

          <div class="form-group">
            <div  class="lable">ชื่อ-นามสกุล:</div>
            <input name="name" type="text"  required value="<?php echo $show['Mem_Name'];?>">
          </div>

      <div class="form-group">
            <div class="lable">Email:</div>
            <input name="email" type="email"  required value="<?php echo $show['Mem_Email'];?>">
          </div>

          <div class="form-group">
            <div class="lable">Tel:</div>
            <input name="tel" type="text" maxlength="10" required value="<?php echo $show['Mem_Tel'];?>"  onKeyPress="CheckNum()">
          </div>

          <div class="form-group">
            <div class="lable">ที่อยู่:</div>
            <textarea name="address"  rows="5" required></textarea>
          </div>

      <div class="clear"></div><br>

      <!-- <span class="text-danger">*กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง!</span><br> -->


        <button type="submit" class="btn btn-primary btn-grad">สมัครสมาชิก</button>
        <button type="button" class="btn btn-danger btn-grad" data-dismiss="modal">ยกเลิก</button>


        </form>

		</div>

		<div class="clearfix"> </div>

	</div>

	<div class="clearfix"> </div>
	</div>
	<!---->

<?php require_once "footer.php";?>

</body>
</html>