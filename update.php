<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MTPL</title>
    <link rel="stylesheet" href="ptcss.css">
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="head">
        <center><h1>MTPL</h1></center>
    </div>>
    <div class="nav">
        <ul>
        <li><input type="button" value="Register" id="btn1" class="active"></li>
        <li><input type="button" value="Show Registration" id="btn2" ></li>
        </ul>
    </div>
    <section>
        <div id="content1">
        <div id="details" >
          <div id="Modif" >
            <center><h3>Details</h3></center>
            <div id="detl">
             <form id="form" name="myform" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <br><br>

                <?php 
            
            include "connection.php";
             $STB_No= $_GET['STB_No'];
            
             $showquery = "select * from registration where STB_No=$STB_No";
             $showdata = mysqli_query($conn,$showquery);
             $arrdata = mysqli_fetch_assoc($showdata);

            if(isset($_POST['submits'])){

            $STB_No = $_GET['STB_No'];
            $STB_no=$_POST['STB_No'];
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
                 echo "<script>window.open('index.php','_self')</script>";
                }
                else
                {
                    echo "<script>alert('failed to upload')</script>";
                    echo "<script>window.open('update.php','_self')</script>";
                }
            }
            else{

                echo "<script>alert('file should be png, jpg, jepg format')</script>";
            }
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
    <script src="java.js"></script>
</body>
</html>