    <div class="container">
      <div class="row">
        <div class="col-sm-10">
        <h2><?php echo $title ?></h2>
        </div>
        <div class="col-sm-2">
          <a href="<?php echo site_url('products/productadd'); ?>" class="btn btn-primary"> Add New </a>
        </div>
      </div>
        <table class="table table-hover table-bordered table-striped">
          <tr>
              <th>
                  Poster Image
              </th>
			  <th>
                  Type
              </th>
              <th>
                  Poster Name
              </th>
              <th>
                  Category
              </th>
              <th>
                  Size
              </th>
              <th>
                  Quantity
              </th>
              <th>
                  Description
              </th>
              <th colspan="2">
                  Action
              </th>
          </tr>
                <?php
                    if(is_array($products)){
                      foreach($products as $row){
                      if($row->p_category == 1){ $category = "Best Seller";}else{$category = "New Arrival";} 
						  if($row->p_type == 1){ $type = "Poster";}else{$type = "Painting";} 
                        echo '<tr>';
                        echo '<td><img src="'.base_url().'public/poster_images/'.$row->p_image.'" width="50px" height="50px" style="border-radius:100px"></td>';
						   echo '<td>'.$type.'</td>';
                        echo '<td>'.$row->p_name.'</td>';
                        echo '<td>'.$category.'</td>';
                        echo '<td>'.$row->size.'</td>';
                        echo '<td>'.$row->stock_count.'</td>';
                        echo '<td>'.$row->discription.'</td>';
                        echo '<td><a href="'.site_url('products/productadd/'.$row->p_id).'" style="font-size: x-large;padding: 0px 7px 0px 7px;"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                  <a href="'.site_url('products/productdelete/'.$row->p_id).'" onclick="return confirm("Are You sure to delete this ?");" style="font-size: x-large;color:red;" name="deleteproduct"><i class="fa fa-trash" aria-hidden="true"></i> </a></td>';
                        echo '</tr>';
                    }
                  }else{
                    echo '<tr><td colspan="7"><center> No Records </center></td></tr> ';
                  }
                ?>
        </table>
    </div>
<script type="text/javascript">
  function deleteProduct(rowid){
    
  }
</script>   