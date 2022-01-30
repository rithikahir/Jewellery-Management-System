<?php
include('php/items.php');
?>


<!DOCTYPE HTML>
<html>
  <head>  
  <link rel="stylesheet" type="text/css" href="cssfolder/item.css">  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        </head>

  <body>
  <div class="header">
    <img src="images/heart.jpg" width="100%" height="30%">
  </div>    
  <div class="nav">
    <center><ul><li><a href="logout.php">Logout</a></li>
    <li><a href="custadd.php"> Home </a></li>
    </ul></center>
  </div>
  <div class="imglog">
               <div class="outer">
    <div class="stock">
      <div style="width: 800px; height: 100px; background-color: snow; margin-left:20px;font-style:italic; font-family: courier;margin-top: 20px; color:#652416; font-size: 17px;">
        <table>
     <tr><td>Customer Id :</td><td><?php echo $_GET["field1"];?></td></tr>
      <?php
         $conn=mysqli_connect("localhost","root","");
         $db=mysqli_select_db($conn,"jewellery database");
          $cid=$_GET["field1"];
           $sql=mysqli_query($conn,"SELECT * FROM customer WHERE CID='$cid'");
               {
                  while($row = mysqli_fetch_array($sql))
                    {
                      echo "<tr><td>Name :</td><td>".$row['CName']."</td></tr>";
                      echo "<tr><td>Govt. ID:</td><td>".$row['CGID']."</td></tr>";
                   }
               }
         mysqli_close($conn);
      ?>
    </table>
    </div>
      <center><span>A</span>dd Items<center><br>
      <p style="color:red;font-size:12px; margin-left:none"> (*Enter the JID present on jewellery )</p>
     <div class="container">   
                    <div class="form-group">  
                         <form name="add_name" id="add_name" method="post" action="">  
                              <div class="table-responsive">  
                                  <table class="table table-bordered" id="dynamic_field">  
                                        <tr>  
                                          <td  class="formtitle">Jewellery ID :<input list="jitem" name="name[]"  class="form-control name_list"  autocomplete="off"> 
                                            <datalist id="jitem">
                                            <?php 

                                            $conn=mysqli_connect("localhost","root","");
                                             $db=mysqli_select_db($conn,"jewellery database");

                                              $sql=mysqli_query($conn,"SELECT * FROM jewel");
                                              {
                                                while($row = mysqli_fetch_array($sql))
                                                {
                                                  echo "<option value='".$row['JID']."' >'".$row['TOJ']."'</option>";
                                                }
                                              }
                                                mysqli_close($conn);
                                                                                                                                                                    
                                             ?>
                                            </datalist>
                                            </td>
                                           <td class="formtitle" >Quantity : <input type="number" min="1" max="4" name="quant[]" class="form-control name_list" autocomplete="off"/></td>  
                                          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                        </tr>  
                                  </table>  <br>
                                   <input type="submit" name="genbill" id="genbill" class="genbtn" value="Generate Bill" />
                              </div>  
                        </form>  
                  </div>  
               </div>  
    </div>
  </div>
  </div>
  </body>
</html>


 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"> <td  class="formtitle">Jewellery ID :<input list="jitem" name="name[]"  class="form-control name_list"  autocomplete="off"><datalist id="jjitem"></datalist></td><td class="formtitle" > Quantity : <input type="number" min="1" max="4" name="quant[]"  class="form-control name_list" autocomplete="off"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });    
     
 });  

 $(document).ready(function(){
    $("#jjitem").html($("#jitem").html());
});
 </script>