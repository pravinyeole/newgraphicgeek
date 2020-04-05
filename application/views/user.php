    <div class="container">
        <h2>Users</h2>
        <table class="table table-hover table-bordered table-striped">
          <tr>
              <th>
                  Name
              </th>
              <th>
                  User Name
              </th>
              <th>
                  Last Login
              </th>
              <th>
                  Status
              </th>
              <th colspan="2">
                  Action
              </th>
          </tr>
                <?php
                    foreach($groups as $row)
                    { 
                    if($row->role != 1){
                        echo '<tr>';
                        echo '<td>'.$row->first_name.'</td>';
                        echo '<td>'.$row->email.'</td>';
                        echo '<td>'.$row->last_login.'</td>';
                        echo '<td>'.$row->status.'</td>';
                        // echo '<td><a href="'.site_url('main/changelevel').'"><button type="button" class="btn btn-primary">Role</button></a></td>';
                        echo '<td><a href="'.site_url('main/deleteuser/'.$row->id).'"><i class="fa fa-trash"></a></td>';
                        echo '</tr>';
                      }
                    }
                ?>
        </table>
    </div>