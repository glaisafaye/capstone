<?php include '../includes/layout.php'; ?>

<!-- insert data -->
<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="insertdataLabel">Enter Barangay Official Information</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="control-label">Position:</label>
            <select name="position" class="form-select">
              <option selected="" disabled="">-----Select-----</option>
              <option value="Punong Barangay">Punong Barangay</option>
              <option value="Barangay Kagawad">Barangay Kagawad</option>
              <option value="SK Chairperson">SK Chairperson</option>
              <option value="Barangay IPMR">Barangay IPMR</option>
              <option value="Barangay Secretary">Barangay Secretary</option>
              <option value="Barangay Treasurer">Barangay Treasurer</option>
              <option value="Barangay Records-Keeper">Barangay Records-Keeper</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="control-label">Full Name:</label>
            <input name="name" class="form-control input-sm input-size" type="text" placeholder="Enter Full Name" />
          </div>
          <div class="form-group mb-3">
            <label class="control-label">Contact Number:</label>
            <input name="contactNum" class="form-control input-sm input-size" type="number" placeholder="Enter Contact Number" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="save_data" class="btn btn-primary">Save Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- insert data -->

<!-- view modal -->
<div class="modal fade" id="viewusermodal" tabindex="-1" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewusermodalLabel">View Barangay Official Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="view_user_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- view modal -->

<!-- edit modal -->
<div class="modal fade" id="editdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="editdataLabel">Edit Barangay Official Information</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" clas="form-control" id='user_id' name="id">
          </div>
          <div class="form-group mb-3">
            <label class="control-label">Position:</label>
            <select name="position" class="form-select" id="position">
              <option selected="" disabled="">-----Select-----</option>
              <option value="Punong Barangay">Punong Barangay</option>
              <option value="Barangay Kagawad">Barangay Kagawad</option>
              <option value="SK Chairperson">SK Chairperson</option>
              <option value="Barangay IPMR">Barangay IPMR</option>
              <option value="Barangay Secretary">Barangay Secretary</option>
              <option value="Barangay Treasurer">Barangay Treasurer</option>
              <option value="Barangay Records-Keeper">Barangay Records-Keeper</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="control-label">Full Name:</label>
            <input name="name" class="form-control input-sm input-size" id="name" type="text" placeholder="Enter Full Name:" />
          </div>
          <div class="form-group mb-3">
            <label class="control-label">Contact Number:</label>
            <input name="contactNum" class="form-control input-sm input-size" id="contactNum" type="text" placeholder="Enter Contact Number" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- edit modal -->

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">

      <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        unset($_SESSION['status']);
      }
      ?>
      <div class="container my-5">
        <div class="text-center mb-5">
          <div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center"></h4>
                <button type="button" style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#insertdata">
                  Add Barangay Official
                </button>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-success" style="margin-bottom: 20px; margin-top: 20px;" id="myTable">
                  <thead>
                    <tr>
                      <th style="width: 50px !important;">ID#</th>
                      <th style="width: 130px !important;">Position</th>
                      <th style="width: 150px !important;">Name</th>
                      <th style="width: 100px !important;">Contact Number</th>
                      <th style="width: 50px !important;">Status</th>
                      <th style="width: 80px !important;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $connection = mysqli_connect("localhost", "root", "", "mis");

                    $fetch_query = "SELECT * FROM officials";
                    $fetch_query_run = mysqli_query($connection, $fetch_query);

                    if (mysqli_num_rows($fetch_query_run) > 0) {
                      while ($row = mysqli_fetch_array($fetch_query_run)) {
                        /*echo $row['id']; */

                    ?>
                        <tr>
                          <td class="user_id"><?php echo $row['id']; ?></td>
                          <td><?php echo $row['position']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['contactNum']; ?></td>
                          <td>
                            <?php
                              if ($row['status'] == 1) {
                                  echo '<p><a href="active.php?id=' . $row['id'] . '&status=0" class="btn btn-success btn-sm active-status">Active</a></p>';
                              } else {
                                  echo '<p><a href="active.php?id=' . $row['id'] . '&status=1" class="btn btn-danger btn-sm inactive-status">Inactive</a></p>';
                              }
                              ?>
                          </td>
                          <td>
                              <a href="#" class="btn btn-info btn-sm view_data">View</a>
                              <a href="#" class="btn btn-success btn-sm edit_data">Edit</a>
                          </td>
                        </tr>

                      <?php
                      }
                    } else {
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
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
  /*view data*/
  $(document).ready(function() {
    $('.view_data').click(function(e) {
      e.preventDefault();

      var user_id = $(this).closest('tr').find('.user_id').text();

      /*console.log(user_id);*/

      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'click_view_btn': true,
          'user_id': user_id,

        },
        success: function(response) {
          /*console.log(response);*/

          $('.view_user_data').html(response);
          $('#viewusermodal').modal('show');
        }
      })

    });
  });
  /*view data*/

  /* edit data */
  $(document).ready(function() {

    $('.edit_data').click(function(e) {
      e.preventDefault();

      var user_id = $(this).closest('tr').find('.user_id').text();
      console.log(user_id);

      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'click_edit_btn': true,
          'user_id': user_id,
        },
        success: function(response) {
          /* console.log(response); */
          $('#editdata').modal('show');

          $.each(response, function(Key, value) {

            $('#user_id').val(value['id']);
            $('#position').val(value['position']);
            $('#name').val(value['name']);
            $('#contactNum').val(value['contactNum']);
          });
        }
      });
    });
  });
  /* edit data */

  /* search data */
  $(document).ready(function() {
    $("#searchBox").on("keyup", function() {
      var query = $(this).val().toLowerCase();

      $("table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
      });
    });
  });
  /* search data */

  /*pagination*/
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
  /*pagination*/
</script>