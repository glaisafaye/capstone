<?php include '../includes/layout.php'; ?>

<!-- insert modal -->
<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertdataLabel">Enter Household Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Household Number:</label>
                <input type="text" class="form-control" name="houseNum" placeholder="Enter Household Number">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Zone:</label>
                <select class="form-select" name="zone">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Zone 1">Zone 1</option>
                  <option value="Zone 2">Zone 2</option>
                  <option value="Zone 3">Zone 3</option>
                  <option value="Zone 4">Zone 4</option>
                  <option value="Zone 5">Zone 5</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Total Members:</label>
                <input type="number" class="form-control" name="totalMem" placeholder="Enter Total Members">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Head of the Family:</label>
                <input type="text" class="form-control" name="famHead" placeholder="Enter Head of the Family">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Household Income:</label>
                <input type="number" class="form-control" name="income" placeholder="Enter Household Income">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Sanitary Toilet:</label>
                <select class="form-select" name="sanToilet">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Water-sealed">Water-sealed</option>
                  <option value="Antipolo">Antipolo</option>
                  <option value="None">None</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Water Usage:</label>
                <select class="form-select" name="water">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Faucet">Faucet</option>
                  <option value="Deep Well">Deep Well</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">House Ownership Status:</label>
                <select class="form-select" name="ownerStatus">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Owned">Owned</option>
                  <option value="Rent">Rent</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Land Ownership Status:</label>
                <select class="form-select" name="landStatus">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Owned">Owned</option>
                  <option value="Landless">Landless</option>
                  <option value="Tenant">Tenant</option>
                  <option value="Care Taker">Care Taker</option>
                </select>
              </div>
            </div>
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
<!-- insert modal -->

<!-- view modal -->
<div class="modal fade" id="viewusermodal" tabindex="-1" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewusermodalLabel">View User Data</h1>
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
        <h1 class="modal-title fs-5" id="editdataLabel">Edit Household Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

          <input type="hidden" class="form-control" id="user_id" name="id">

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Household Number</label>
                <input type="text" class="form-control" name="houseNum" id="houseNum" placeholder="Enter household number">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Zone</label>
                <select class="form-select" name="zone" id="zone" placeholder="Enter zone">
                  <option value="Zone 1">Zone 1</option>
                  <option value="Zone 2">Zone 2</option>
                  <option value="Zone 3">Zone 3</option>
                  <option value="Zone 4">Zone 4</option>
                  <option value="Zone 5">Zone 5</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Total Members</label>
                <input type="number" class="form-control" name="totalMem" id="totalMem" placeholder="Enter total members">
              </div>
            </div>        
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Head of the Family</label>
                <input type="text" class="form-control" name="famHead" id="famHead" placeholder="Enter head of the family">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Household Income</label>
                <input type="text" class="form-control" name="income" id="income" placeholder="Enter household income">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Sanitary Toilet</label>
                <select class="form-select" name="sanToilet" id="sanToilet" placeholder="Enter sanitary toilet">
                  <option value="Water-sealed">Water-sealed</option>
                  <option value="Antipolo">Antipolo</option>
                  <option value="None">None</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Water Usage</label>
                <select class="form-select" name="water" id="water" placeholder="Enter water usage">
                  <option value="Faucet">Faucet</option>
                  <option value="Deep Well">Deep Well</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">House Ownership Status</label>
                <select class="form-select" name="ownerStatus" id="ownerStatus" placeholder="Enter house ownership status">
                  <option value="Owned">Owned</option>
                  <option value="Rent">Rent</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Land Ownership Status</label>
                <select class="form-select" name="landStatus" id="landStatus" placeholder="Enter land ownership status">
                  <option value="Owned">Owned</option>
                  <option value="Landless">Landless</option>
                  <option value="Tenant">Tenant</option>
                  <option value="Care Taker">Care Taker</option>
                </select>
              </div>
            </div>
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
                  Add Household
                </button>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-success" style="margin-bottom: 20px; margin-top: 20px;" id="myTable">
                  <thead>
                    <tr>
                      <th style="width: 50px !important;">ID#</th>
                      <th style="width: 120px !important;">Household Number</th>
                      <th style="width: 50px !important;">Zone</th>
                      <th style="width: 100px !important;">Total Members</th>
                      <th style="width: 130px !important;">Head of the Family</th>
                      <th style="width: 110px !important;">Action</th>                    
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $connection = mysqli_connect("localhost", "root", "", "mis");

                      $fetch_query = "SELECT * FROM household";
                      $fetch_query_run = mysqli_query($connection, $fetch_query);

                      if (mysqli_num_rows($fetch_query_run) > 0) {
                        while ($row = mysqli_fetch_array($fetch_query_run)) {
                          /*echo $row['id']; */
                    ?>
                        <tr>
                          <td class="user_id"><?php echo $row['id']; ?></td>
                          <td><?php echo $row['houseNum']; ?></td>
                          <td><?php echo $row['zone']; ?></td>
                          <td><?php echo $row['totalMem']; ?></td>
                          <td><?php echo $row['famHead']; ?></td>
                          <td>
                            <a href="#" class="btn btn-info btn-sm view_data">View</a>
                            <a href="#" class="btn btn-success btn-sm edit_data">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm delete_btn">Delete</a>
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

  /*edit data*/
  $(document).ready(function() {
    $('.edit_data').click(function(e) {
      e.preventDefault();

      var user_id = $(this).closest('tr').find('.user_id').text();

      /* console.log(user_id); */

      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'click_edit_btn': true,
          'user_id': user_id,

        },
        success: function(response) {
          /* console.log(response); */

        $.each(response, function (Key, value) { 
         /* console.log(value['houseNum']); */

         $('#user_id').val(value['id']);
         $('#houseNum').val(value['houseNum']);
         $('#zone').val(value['zone']);
         $('#totalMem').val(value['totalMem']);
         $('#famHead').val(value['famHead']);
         $('#income').val(value['income']);
         $('#sanToilet').val(value['sanToilet']);
         $('#water').val(value['water']);
         $('#ownerStatus').val(value['ownerStatus']);
         $('#landStatus').val(value['landStatus']);
   
        });
          $('#editdata').modal('show');
        }
      })

    });
  });
  /*edit data*/

  /* delete data */
  $(document).ready(function() {
    $('.delete_btn').click(function(e) {
      e.preventDefault();
      /*console.log('hello');*/

      var user_id = $(this).closest('tr').find('.user_id').text();
      /*console.log('user_id');*/

      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          click_delete_btn: true,
          'id': user_id,
        },

        success: function(response) {
          console.log(response);
          window.location.reload();
        }
      });
      /* delete data */

    });
  });
  /* delete data */

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