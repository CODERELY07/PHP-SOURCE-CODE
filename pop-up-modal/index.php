<?php 
  require_once 'includes/header.php';
  require_once 'connection.php';
?>
<!-- Vertically centered modal -->
<!-- Insert Modal -->
<div class="modal fade" id="add-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add-userLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-userLabel">Add User</h5>
      </div>
      <form action="code.php" method="post">
        <div class="modal-body">
            <div class="form-group mt-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter name">
            </div>
            <div class="form-group mt-3">
                <label for="">Phone</label>
                <input type="number" name="number" class="form-control" placeholder="enter number">
            </div>
            <div class="form-group mt-3">
                <label for="">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="enter email">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="save_data" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Insert Modal -->
status
<!-- View Modal -->
<div class="modal fade" id="viewusermdoal" tabindex="-1" aria-labelledby="viewusermdoalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewusermdoalLabel">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ajax output -->
        <div class="view_user_data">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- View Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="edit-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit-userLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-userLabel">Edit User</h5>
      </div>
      <form action="code.php" method="post">
        <div class="modal-body">
            <div class="form-group mt-3">
                <input type="hidden" id="user_id" name="id" class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label for="">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="enter name">
            </div>
            <div class="form-group mt-3">
                <label for="">Phone</label>
                <input type="number" name="number" id="phone" class="form-control" placeholder="enter number">
            </div>
            <div class="form-group mt-3">
                <label for="">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="enter email">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="update_data" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->

<!-- DELETE CONFIIRM Modal -->
<div class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="deleteuserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteuserLabel"> Delete User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">

        <div class="modal-body">
          <!-- ajax output -->
          <input type="hidden" name="user_id" id="confirm_id">
          <h4>
            Are you sure to delete data?
          </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" name="delete_data" class="btn btn-danger">Yes</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- DELETE CONFIIRM Modal -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
          <?php
            if(isset($_SESSION['status']) && $_SESSION != ''){
              ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong><?php  echo $_SESSION['status'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
              unset($_SESSION['status']);
            }
          ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Pop Up Modal</h4>
                    <!-- Button trigger modal -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end my-1" data-bs-toggle="modal" data-bs-target="#add-user">
                    Add User
                    </button>
                </div>
                <div class="card-body">
                    <!-- Fetch Data -->
                    <table class="table caption-top table-striped table-border">
                      <caption>List of users</caption>
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">NAME</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">PHONE</th>
                          <th scope="col">VIEW</th>
                          <th scope="col">EDIT</th>
                          <th scope="col">DELETE</th>
                          <th scope="col">CONFIRM DELETE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $query = "SELECT * FROM users";
                            $fetch_query = mysqli_query($conn,$query);

                            if(mysqli_num_rows($fetch_query) > 0){
                                while($row = mysqli_fetch_array($fetch_query)){
                        ?>
                            <tr>
                              <td scope="row" class="user_id"><?php echo $row['id']?></td>
                              <td  scope="row"><?php echo $row['name']?></td>
                              <td  scope="row"><?php echo $row['email']?></td>
                              <td  scope="row"><?php echo $row['phone']?></td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm view-data">View Data</a>
                              </td>
                              <td>
                                <a href="#" class="btn btn-success btn-sm edit-data">Edit Data</a>
                              </td>
                              <td>
                                <a href="#" class="btn btn-danger btn-sm delete-btn">Delete Data</a>
                              </td>
                              <td>
                                <a href="#" class="btn btn-danger btn-sm confirm-delete-btn">Confirm Delete Data</a>
                              </td>
                            </tr>
                        <?php
                                }
                            }else{
                        ?>
                            <tr colspan="4">No Record Found</tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'?>
<script>
  // View Data
   $(document).ready(function(){
    
    $('.view-data').click(function (e){
      e.preventDefault();
      // console.log('hello');

      //get the id
      var user_id = $(this).closest('tr').find('.user_id').text();

      // console.log(user_id);
      //ajax
      $.ajax({
        method: "Post",
        url: "code.php",
        data: {
          'click_view_button':true,
          'user_id':user_id,
        },
        success: function (response){
          // console.log(response);
          //modal show is built in function
          $('.view_user_data').html(response);
          $('#viewusermdoal').modal('show');
        }
      })
    });

   })

   //edit data
   $(document).ready(function(){
    
    $('.edit-data').click(function (e){
      e.preventDefault();
      // console.log('hello');

      //get the id
      var user_id = $(this).closest('tr').find('.user_id').text();
       console.log(user_id);
      $.ajax({
        method: "Post",
        url: "code.php",
        data: {
          'click_edit_button':true,
          'user_id':user_id,
        },
        success: function (response){
          // console.log(response);
          $.each(response, function (key, value){
         
             $('#name').val(value['name']);
             $('#user_id').val(value['id']);
             $('#phone').val(value['phone']);
             $('#email').val(value['email']);
          });

          //modal show is built in function
          $('#edit-user').modal('show');
          
        }
      })
    });
   });

   //delete data
   $(document).ready(function(){
    
    $('.delete-btn').click(function (e){
      e.preventDefault();
      console.log('hello');

      //get the id
      var user_id = $(this).closest('tr').find('.user_id').text();
       console.log(user_id);


      $.ajax({
        method: "Post",
        url: "code.php",
        data: {
          'click_delete_button':true,
          'user_id':user_id,
        },
        success: function (response){
          // console.log(response);

         
            //  $('#name').val(value['name']);
            //  $('#user_id').val(value['id']);
            //  $('#phone').val(value['phone']);
            //  $('#email').val(value['email']);
            console.log(response);
            window.location.reload();

          // modal show is built in function
          // $('#edit-user').modal('show');
          
        }
      })
    });

     //confirm delete
    
      $('.confirm-delete-btn').click(function (e){
        e.preventDefault();
       
        var user_id = $(this).closest('tr').find('.user_id').text();
        //console.log(user_id);
        $('#confirm_id').val(user_id);
        $('#deleteuser').modal('show');

          $.ajax({
          method: "Post",
          url: "code.php",
          data: {
            'delete_data':true,
            'user_id':user_id,
          },
          success: function (response){
            // console.log(response);


              console.log(response);
              // window.location.reload();
          }
        })
      });
   });
</script>