<table class="table table-responsive text-center" id="myTable">
          <thead class="thead" style="background-color: #203c6b">
            <tr>
              <th scope="col" style="color: white">id de post</th>
              <th scope="col" style="color: white">post</th>
              <th scope="col" style="color: white">date</th>
              
              <th scope="col" style="width: 219px;color: white">action</th>
            </tr>
          </thead>
         
          <tbody>
           <?php while($row = mysqli_fetch_array($result)): 

           echo '<tr>
              <th scope="row">'.$row['idPostF'].'</th>
              <td>'.$row['post'].'</td>
              <td>'.$row['date'].'</td>
               <td>
               
                  
                  <a href="delete.php?id='.$row['idPostF'].'"  class="btn btn-danger">DELETE</a>
               
              </td>
            </tr>';

endwhile; 
?>
          </tbody>
       
        </table>
