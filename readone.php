<?php

include "connection.php";

if(isset($_POST['submit'])){
    $STB_No=$_POST['STB_No'];

    $sql="select * from registration where STB_No=$STB_No";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($query);

    if($query){
        if($result > 0){
        echo "<br><br><br><br>";
        
        echo "<table style='margin-left:10%; width:80%; margin-right:10%;'>";
        while($row = mysqli_fetch_assoc($query)) {
                echo "<tr style='border:1px solid black; text-align:left;'>";
                echo "<th>STB No.</th>";
                echo "<td>". $row['STB_No'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Name</th>";
                echo "<td>". $row['Name'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Mobile no.</th>";
                echo "<td>". $row['Mobile_no'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Email</th>";
                echo "<td>". $row['Email'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Address</th>";
                echo "<td>". $row['Address'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Pincode</th>";
                echo "<td>". $row['Pincode'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Adhar no</th>";
                echo "<td>". $row['Adhar_no'] . "</td>";
                echo "</tr>";
                echo "<tr style='text-align:left;'>";
                echo "<th>Address Proof</th>";
                ?>
                <td><img src="<?php echo $row['Address_Proof']; ?>" height="100px" width="100px"></td>
                <?php
                echo "</tr>";
            }
        echo "</table>";
        
        }
        else
        {
            echo "No record found";
        }
    }
    else
    {
        echo "No result found";
    }
}

?>