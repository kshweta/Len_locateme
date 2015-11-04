
<?php 
include_once('dbconfig.php');
?>

<!DOCTYPE html>

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>Map Details</title>
<!-- stylesheets -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/material.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/ripples.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/roboto.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/material-fullpalette.min.css">
  
   <style>
   table {border-collapse:collapse; table-layout:fixed; width:310px;}
   table td {border:solid 1px #000; width:100px; word-wrap:break-word;}
   table th {border:solid 1px #000; width:100px; word-wrap:break-word;}
   body
   {
    background: url(images/bg.png);
    background-size: 100% 500px;
    background-repeat: no-repeat;

   }
   </style>
 
</head>

<body>
  
    <table class="table table-striped table-hover ">
    <thead>
        <tr class="info">
            <th>Description</th>
            <th>Image</th>
            <th>FLoor Length</th>
            <th>FLoor Breadth</th>
            <th>Access Point 1</th>
            <th>Access Point 2</th>
            <th>Access Point 3</th>
            <th>Access Point 4</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
            <?php 
                $query1="SELECT * FROM `venuedata`";
                $result1=mysql_query($query1);
                 $counter = 1;
                while($row=mysql_fetch_array($result1)){
                        $mid=$row[0];
                        $mdesc=$row[1];
                        $img_url=$row[2];
                        $length=$row[3];
                        $breadth=$row[4];
                        $ap1=$row[5];
                        $ap2=$row[6];
                        $ap3=$row[7];
                        $ap4=$row[8];
                        $pixelx=$row[9];
                        $pixely=$row[10];
             ?>
       <tr class="warning">
               <td><?php echo $mdesc;?></td>
            <td>
             <a><img src="<?php echo "maps/".$img_url;?>" data-toggle="modal" data-target="<?php echo "#".$counter;?>" height="100px" width="100%"></a>
              <div id="<?php echo $counter;?>" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                       <img src="<?php echo "maps/".$img_url;?>" height="300px" width="100%">
                       <?php echo "Dimension : ("; ?>
                       <?php echo $pixelx; ?>
                       <?php echo "X" ?>
                       <?php echo $pixely; ?>
                       <?php echo ") pixels" ?>
                       <div class="form-group">
                        <label for="changeimage" class="col-lg-2 control-label">Change Image</label>
                        <div class="col-lg-10">
                          <form method="POST" action="changeimage.php" enctype="multipart/form-data">
                            <input type="file" name="changeimage" placeholder="upload" required>
                            <input type="hidden" name="foo" value="<?php echo $mid;?>">
                            <input type="number" name="pixelx" placeholder="Width(pixels)" required>
                            <input type="number" name="pixely" placeholder="Height(pixels)" required> 
                             <button class="btn btn-primary" name="change" value="change">Change</button>
                          </form>
                        </div>
                  </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
             </td>
             <td><?php echo $length;?> m </td>
             <td><?php echo $breadth;?> m </td>

             <td><?php echo "SSID : $ap1";?>
              <?php $q="SELECT * FROM `apdata` WHERE `ap_ssid` = '$ap1'";
                    $r=mysql_query($q);
                    $col=mysql_fetch_array($r);
                    echo "<br>A : $col[2] dBm";
                    echo "<br>n : $col[3]";
                    echo "<br>X : $col[4]";
                    echo "<br>Y : $col[5]";
               ?>
            </td>
             <td><?php echo "SSID : $ap2";?>
              <?php $q="SELECT * FROM `apdata` WHERE `ap_ssid` = '$ap2'";
                    $r=mysql_query($q);
                    $col=mysql_fetch_array($r);
                    echo "<br>A : $col[2] dBm";
                    echo "<br>n : $col[3]";
                    echo "<br>X : $col[4]";
                    echo "<br>Y : $col[5]";
               ?>
            </td>
             <td><?php echo "SSID : $ap3";?>
              <?php $q_a="SELECT * FROM `apdata` WHERE `ap_ssid` = '$ap3'";
                    $r_a=mysql_query($q_a);
                    $col=mysql_fetch_array($r_a);
                    echo "<br>A : $col[2] dBm";
                    echo "<br>n : $col[3]";
                    echo "<br>X : $col[4]";
                    echo "<br>Y : $col[5]";
              ?>
            </td>
             <td><?php echo "SSID : $ap4";?>
              <?php $q="SELECT * FROM `apdata` WHERE `ap_ssid` = '$ap4'";
                    $r=mysql_query($q);
                    $col=mysql_fetch_array($r);
                    echo "<br>A : $col[2] dBm";
                    echo "<br>n : $col[3]";
                    echo "<br>X : $col[4]";
                    echo "<br>Y : $col[5]";
              ?>
          </td>
          <td>
            <button class="btn btn-flat btn-danger" data-toggle="modal" data-target="<?php echo "#".$counter.'update';?>">update</button>
             <div id="<?php echo $counter.'update';?>" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                     <form class="form-horizontal" method="post" action="update_action.php" enctype="multipart/form-data">
                        <fieldset>
                        
                    <div class="form-group">
                        <label for="mdesc" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" rows="3" name="mdesc" placeholder="FLoor Description" required><?php echo $mdesc;?></textarea>
                         </div>
                    </div>
                     
                      <div class="form-group">
                        <label for="mdesc" class="col-lg-2 control-label">Length</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="length" placeholder="Floor Length in m" value="<?php echo $length;?>"required>
                         </div>
                    </div>
                    <div class="form-group">
                        <label for="mdesc" class="col-lg-2 control-label">Breadth</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="breadth" placeholder="Floor Breadth in m" value="<?php echo $breadth;?>"required>
                         </div>
                    </div>
                     <?php 
                    $querry2="SELECT * FROM `apdata` WHERE `id` = '$mid'";
                    $result2=mysql_query($querry2);
                    $j=1;
                    while($row1=mysql_fetch_array($result2)){
                     
                   ?>
                      <div class="form-group">
                        <label for="<?php echo "ap".$j?>" class="col-lg-2 control-label">SSID</label>
                       <div class="col-lg-10">
                         <input type="text" class="form-control" name="<?php echo "ap".$j."_ssid"?>" placeholder="Add SSID" value="<?php echo $row1[1]?>" readonly="readonly">
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="<?php echo "ap".$j?>"  class="col-lg-2 control-label">A(dBm)</label>
                       <div class="col-lg-10">
                         <input type="number" class="form-control" name="<?php echo "ap".$j."_a"?>" placeholder="Add RSSI at 1m" value="<?php echo $row1[2]?>" required>
                       </div>
                  </div>
                  <div class="form-group">
                        <label for="<?php echo "ap".$j?>"  class="col-lg-2 control-label">n</label>
                       <div class="col-lg-10">
                         <input type="number" step="0.01" class="form-control" name="<?php echo "ap".$j."_n"?>" placeholder="Add Signal Constant value" value="<?php echo $row1[3]?>" required>
                       </div>
                  </div>
                  <div class="form-group">
                        <label for="<?php echo "ap".$j?>"  class="col-lg-2 control-label">X</label>
                       <div class="col-lg-10">
                         <input type="number" class="form-control" name="<?php echo "ap".$j."_x"?>" placeholder="Add X co-ordinate" value="<?php echo $row1[4]?>" required>
                       </div>
                  </div>
                  <div class="form-group">
                        <label for="<?php echo "ap".$j?>" class="col-lg-2 control-label">Y</label>
                       <div class="col-lg-10">
                         <input type="number" class="form-control" name="<?php echo "ap".$j."_y"?>" placeholder="Add Y co-ordinate" value="<?php echo $row1[5]?>" required>
                       </div>
                  </div>
                
                 <?php  
                 $j++;
                }?>
                 <input type="hidden" value="<?php echo $mid;?>" name="foo">
                   <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="update">Submit</button>
                    </div>
        </fieldset>
      </form>
                    </div>
                  </div>
                </div>
              </div>
              <form method="POST" action="delete_action.php">
                <input type="hidden" value="<?php echo $mid?>" name="foo">
                <a class="btn btn-flat btn-danger" data-toggle="modal" data-target="<?php echo '#'.$counter.'delete'?>">Delete</a>
                <div class="modal" id="<?php echo $counter.'delete';?>" class="modal fade" tabindex="-1">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title">Are you sure you to delete this map?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Once deleted, all data with the map will be deleted and cannot be recovered.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-primary" name="delete" value="delete">Yes, Delete</button>
                          </div>
                      </div>
                  </div>
              </div>
              </form>
               
          </td>

       </tr>
     <?php $counter++;
      
   } ?>  

</tbody>
</table>

<div class="addfloor" style="position:absolute; left:80%;top:80%;">
  <h4>Add A New Map/Floor</h4>

<button class="btn btn-primary" data-toggle="modal" data-target="#complete-dialog4"><span class="mdi-content-send">Add</span></button>

<div id="complete-dialog4" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Map/Floor details</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="add_venue_action.php" enctype="multipart/form-data">
            <fieldset>
              <div class="form-group">
            <label for="mdesc" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" name="mdesc" placeholder="Floor Description" required></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label for="mapimage" class="col-lg-2 control-label">Map/Floor Image</label>
            <div class="col-lg-10">
                <input type="file" name="mapimage" placeholder="upload" required><br>
                 <input type="number" name="pixelx" placeholder="Width(pixels)" required>
                 <input type="number" name="pixely" placeholder="Height(pixels)" required> 
            </div>
        </div>
        <div class="form-group">
           <label for="length" class="col-lg-2 control-label">Length</label>
              <div class="col-lg-10">
                  <input type="number" class="form-control" name="length" placeholder="Floor Length in m" required>
              </div>
        </div>
        <div class="form-group">
            <label for="breadth" class="col-lg-2 control-label">Breadth</label>
              <div class="col-lg-10">
                   <input type="number" class="form-control" name="breadth" placeholder="Floor Breadth in m" required>
              </div>
        </div>
        <div class="form-group">
            <label for="ap1" class="col-lg-2 control-label">Access Point 1 Details</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="ap1_ssid" placeholder="Enter SSID" required>
              <input type="number" class="form-control" name="ap1_a" placeholder="Enter RSSI(dBm) at 1m" required>
              <input type="number" step="0.01" class="form-control" name="ap1_n" placeholder="Enter Signal Constant(n) value" required>
              <input type="number" class="form-control" name="ap1_x" placeholder="Enter X co-ordinate of AP" required>
              <input type="number" class="form-control" name="ap1_y" placeholder="Enter Y co-ordinate of AP" required>
            </div>
          </div>
          <div class="form-group">
            <label for="ap2" class="col-lg-2 control-label">Access Point 2 Details</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="ap2_ssid" placeholder="Enter SSID" required>
              <input type="number" class="form-control" name="ap2_a" placeholder="Enter RSSI(dBm) at 1m" required>
              <input type="number" step="0.01" class="form-control" name="ap2_n" placeholder="Enter Signal Constant(n) value" required>
              <input type="number" class="form-control" name="ap2_x" placeholder="Enter X co-ordinate of AP" required>
              <input type="number" class="form-control" name="ap2_y" placeholder="Enter Y co-ordinate of AP" required>
            </div>
          </div>
          <div class="form-group">
            <label for="ap3" class="col-lg-2 control-label">Access Point 3 Details</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="ap3_ssid" placeholder="Enter SSID" required>
              <input type="number" class="form-control" name="ap3_a" placeholder="Enter RSSI(dBm) at 1m" required>
              <input type="number" step="0.01" class="form-control" name="ap3_n" placeholder="Enter Signal Constant(n) value" required>
              <input type="number" class="form-control" name="ap3_x" placeholder="Enter X co-ordinate of AP" required>
              <input type="number" class="form-control" name="ap3_y" placeholder="Enter Y co-ordinate of AP" required>
            </div>
          </div>
          <div class="form-group">
            <label for="ap4" class="col-lg-2 control-label">Access Point 4 Details</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="ap4_ssid" placeholder="Enter SSID" required>
              <input type="number" class="form-control" name="ap4_a" placeholder="Enter RSSI(dBm) at 1m" required>
              <input type="number" step="0.01" class="form-control" name="ap4_n" placeholder="Enter Signal Constant(n) value" required>
              <input type="number" class="form-control" name="ap4_x" placeholder="Enter X co-ordinate of AP" required>
              <input type="number" class="form-control" name="ap4_y" placeholder="Enter Y co-ordinate of AP" required>
            </div>
          </div>
            
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
      </div>
    </fieldset>
  </form>
    </div>
  </div>
  </div>
</div></div> 


<!-- Site ends here-->
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="dist/js/ripples.min.js"></script>
  <script type="text/javascript" src="dist/js/material.min.js"></script>



  <script type="text/javascript">

  $(document).ready(function()
  {
    $.material.init();
  });

  </script>
</body>



</html>




