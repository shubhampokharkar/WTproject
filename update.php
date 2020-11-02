<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MTPL</title>
    <link rel="stylesheet" href="cproj.css">
    <link rel="stylesheet" href="modifycss.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="head">
        <div style="float:left ;color:yellow ; font-weight: bold;">M</div>
        <div style="float:left ;color:blue ; font-weight: bold;">T</div>
        <div style="float:left ;color:red ; font-weight: bold;">P</div>
        <div style="float:left ;color:pink ; font-weight: bold;">L</div>
        <div class="user" style="float: right; font-size: 30px; color:white; margin-right: 30px;"><i class="fas fa-user-circle"></i></div>
    </div>>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-bars" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>MTPL</header>
        <ul>
            <li><a href="project.html"><i class="fas fa-search"></i>Search</a></li>
            <li><a href="activation.html"><i class="fas fa-calendar-week"></i>Activation</a></li>
            <li>
               <a href="#" class="Obtn"><i class="fas fa-cart-arrow-down"></i>Order
               <span id="span" class="fas fa-caret-down first"></span>
               </a>
               <ul class="Odbtn">
                   <li><a href="order.html">Change Order</a></li>
               </ul>
            </li>
            <li><a href="#" class="active"><i class="fas fa-edit"></i>Modify</a></li>
            <li><a href="#"><i class="fas fa-redo"></i>Renew</a></li>
            <li><a href="#"><i class="fas fa-pause"></i>Suspend</a></li>
            <li><a href="#"><i class="fas fa-male"></i>E-Support</a></li>
            <li><a href="#"><i class="fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>
    <section>
	    <br><br><br><br>
        <div id="content1">
        <div id="details" >
          <div id="Modif" >
            <center><h3>Details</h3></center>
            <div id="detl">
             <form id="form" name="myform" action="" method="POST" enctype="multipart/form-data">
                <br><br>

             <?php 
            
            include "connection.php";
             $STB_No= $_GET['STB_No'];
             $showquery = "select * from registration where STB_No=$STB_No";
             $showdata = mysqli_query($conn,$showquery);
             $arrdata = mysqli_fetch_assoc($showdata);
			 $result=mysqli_num_rows($showdata);
			 if($result>0)
			 {
				if(isset($_POST['submits'])){

				$STB_No=$_GET['STB_No'];
				$Name=$_POST['Name'];
				$Mobile_no=$_POST['Mobile_no'];
				$Email=$_POST['Email'];
				$Address=$_POST['Address'];
				$Pincode=$_POST['Pincode'];
				$Adhar_no=$_POST['Adhar_no'];
				$files=$_FILES['file'];

				$filename=$files['name'];
				$fileerror=$files['error'];
				$filetmp= $files['tmp_name'];

				$fileext= explode('.',$filename);

				$filecheck= strtolower(end($fileext));

				$fileexstored = array('png','jpg','jpeg');

				if(in_array($filecheck,$fileexstored)){

					$destinationfile = 'upload/'.$filename;
					move_uploaded_file($filetmp,$destinationfile);


					$sql = "UPDATE registration SET Name='$Name',Mobile_no='$Mobile_no',Email='$Email',
					Address='$Address',Pincode='$Pincode',Adhar_no='$Adhar_no',Address_Proof='$destinationfile' WHERE STB_No=$STB_No";
					$query=mysqli_query($conn,$sql);

					if($query)
					{
						echo "<script>alert('Data updated Successfully')</script>";
						echo "<script>window.open('Modify.php','_self')</script>";
					}
					else
					{
						echo "<script>alert('failed to upload')</script>";
						echo "<script>window.open('update.php','_self')</script>";
					}
				}
				else{

					echo "<script>alert('file should be png, jpg, jepg format')</script>";
					echo "<script>window.open('update.php','_self')</script>";
				}
              }
			}
			else{
				echo "<script>alert('Enter a Valid STB number')</script>";
				echo "<script>window.open('Modify.php','_self')</script>";
			}
            
            ?>

               <label for="Name">Name &nbsp &nbsp : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="text" name="Name"  value="<?php echo $arrdata['Name'];?>"><br><br><br><br>

               <label for="Mobile_no">Mobile NO.    : </label>&nbsp 
               <input type="text" name="Mobile_no" value="<?php echo $arrdata['Mobile_no'];?>" ><br><br><br><br>

               <label for="Email">Email : </label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
               <input type="Email" name="Email" value="<?php echo $arrdata['Email'];?>"><br><br><br><br>

               <label for="Address">Address : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="textarea" name="Address" value="<?php echo $arrdata['Address'];?>"><br><br><br><br>

               <label for="Pincode">Pincode : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="text" name="Pincode" value="<?php echo $arrdata['Pincode'];?>"><br><br><br><br>

               <label for="Adhar_no">Aadhar No. : </label>&nbsp &nbsp 
               <input type="text" name="Adhar_no" value="<?php echo $arrdata['Adhar_no'];?>"><br><br><br><br>

               <label for="file">Upload Address Proof : </label>&nbsp &nbsp &nbsp 
               <input type="file" name="file" value="<?php echo $arrdata['Address_Proof'];?>"><br><br><br><br>
               
                <input type="submit" name="submits" value="update" id="change">
                   <br><br><br>
            </form>
            </div>
          </div>
        </div>
        </div>
    </section>
    <script src="Jscript.js"></script>
</body>
</html>