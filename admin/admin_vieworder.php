<?php

    include '../connection.php';
    session_start();
    
    $q="select tblorder.*,tblorderitem.oid,tblorderitem.aid,tblorderitem.price from tblorder inner join tblorderitem on tblorder.id=tblorderitem.oid";
   
//       echo $q;
    $s= mysqli_query($con, $q);
    
    ?>
    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
<!--                                                <th scope="col">Customer Name </th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">City</th>
                                                <th scope="col">Pincode</th>
                                                <th scope="col">Email-Id</th>
                                                <th scope="col">Action</th>-->

                                            </tr>
                                        </thead>
                                       <?php
    while($R= mysqli_fetch_assoc($s))
    {
           echo "<td> ".$R['cid']."</td>";
           echo "<td> ".$R['odate']."</td>";
           echo "<td>".$R['time']."</td>";
           echo "<td>".$R['amount']."</td>";
           echo "<td>".$R['payment']."</td>";
           echo "<td>".$R['aid']."</td>";
           echo "<td>".$R['price']."</td></tr>";
    }

?>