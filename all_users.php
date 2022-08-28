<?php  
include('inc/header.php');  
include 'core/db.php';   //database
?> 
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //call data and show it 
    $sql = "SELECT * from `users` "; //select query
    $result = mysqli_query($conn,$sql); 
    ?>
    <!--loop on row in db/if you found row in db-->
 <?php $i=1; while($row =  mysqli_fetch_assoc($result)):?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $row['name']?></td>
      <td><?= $row['email']?></td>
      <td><?= $row['mobile']?></td>
    </tr>
<?php endwhile?>
  </tbody>
</table>

<?php  include('inc/footer.php');  ?> 



 

