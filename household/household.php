<?php
session_start();

include('includes/topbar.php'); ?>

<!-- insert modal -->
<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewusermodalLabel" aria-hidden="true">
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
                <label class="form-label">Household Number</label>
                <input type="number" class="form-control" name="houseNum" placeholder="enter household number">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Zone</label>
                <select class="form-select" name="zone" placeholder="enter zone">
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
                <label class="form-label">Total Members</label>
                <input type="number" class="form-control" name="totalMem" placeholder="enter total members">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Head of the Family</label>
                <input type="text" class="form-control" name="famHead" placeholder="enter head of the family">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Household Income</label>
                <input type="number" class="form-control" name="income" placeholder="enter household income">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Sanitary Toilet</label>
                <select class="form-select" name="sanToilet" placeholder="enter sanitary toilet">
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
                <label class="form-label">Water Usage</label>
                <select class="form-select" name="water" placeholder="enter water usage">
                  <option value="Faucet">Faucet</option>
                  <option value="Deep Well">Deep Well</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">House Ownership Status</label>
                <select class="form-select" name="ownerStatus" placeholder="enter house ownership status">
                  <option value="Owned">Owned</option>
                  <option value="Rent">Rent</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Land Ownership Status</label>
                <select class="form-select" name="landStatus" placeholder="enter land ownership status">
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
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- insert modal -->

<!-- view modal -->
<div class="modal fade" id="viewusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

      <div class="card">
        <div class="card-header">
          <h4 class="text-center"></h4>
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#insertdata">
            Add Household
          </button>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-success">
            <thead>
              <tr>
                <th scope="col">ID#</th>
                <th scope="col">Household Number</th>
                <th scope="col">Zone</th>
                <th scope="col">Total Members</th>
                <th scope="col">Head of the Family</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
                      <a href="" class="btn btn-info btn-sm view_data">View Data</a>
                    </td>
                    <td>
                      <a href="" class="btn btn-success btn-sm">Edit Data</a>
                    </td>
                    <td>
                      <a href="" class="btn btn-danger btn-sm">Delete Data</a>
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

<?php include('includes/footer.php'); ?>

<script>
  $(document).ready(function () {
    $('.view_data').click(function (e) {
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
        success: function (response){
          /*console.log(response);*/

          $('.view_user_data').html(response);
          $('#viewusermodal').modal('show');
        }
      })

    });
  });
</script>