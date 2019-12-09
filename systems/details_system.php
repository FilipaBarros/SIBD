<?php include('../partials/header.php'); ?> 
<?php
    $system_id = $_GET['id']; 
    function get_users_admin_perm($system_id){
        global $dataB;
        $statement = $dataB->prepare("SELECT * FROM Users JOIN UserPermissions on Users.userid = UserPermissions.userid WHERE sysid=? and permtypeid=3");
        $statement->execute(array($system_id));
        $users_admin =$statement->fetchAll();
        return $users_admin; 
    }

    function get_devices($system_id){
        global $dataB;
        $statement = $dataB->prepare("SELECT * FROM Devices WHERE sysid=? ");
        $statement->execute(array($system_id));
        $devices = $statement->fetchAll();
        return $devices;
    }

?>


<h2>System Info</h2>

<?php
    //Devices associated to the system 
    $res = get_devices($system_id);
    echo "<br>";
    echo "<table>";
    echo " <tr> ";
    echo "<th>  #           </th>";
    echo "<th>  DevName     </th>";
    echo "<th>  Manufacturer</th>";
    echo "<th>  Description </th>";
    echo "<th>  SWVersion   </th>";
    echo "<th>  SWArtefact  </th>";
    echo "<th>  IP          </th>";
    echo "<th>  Status      </th>";
    echo "<th>  Local ID    </th>";
    echo "<th>  System ID   </th>";
    echo " </tr> ";
    foreach ($res as $row) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) { // we're expecting 10 attributes
            echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
        }
        echo "</tr>";
    }
    echo "</table>";

    //Users with admin permissisons to the system 
    $res2 = get_users_admin_perm($system_id);
    //print_r($res2);
    echo "<br>";
    echo "<table>";
    echo " <tr> ";
    echo "<th> #           </th>";
    echo "<th> Username    </th>";
    echo "<th> Contact     </th>";
    echo " </tr> ";
    foreach($res2 as $row){
        echo "<tr>";
        //print_r($row);
        echo "<td> " . $row['userid'] . " </td>";
        echo "<td> " . $row['username'] . " </td>";
        echo "<td> " . $row['contact'] . " </td>";
        //echo "<tr>";
        //for ($j = 0; $j < 7; $j++) { // we're expecting 7 attributes
        //    echo "<td> " . $row[$j] . " </td>";
        //}
    }
    echo "</tr>";
    echo "</table>";
?>


<?php include('../partials/footer.php'); ?> 