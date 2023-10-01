<?php include 'layout.php' ?>

<!-- insert modal -->
<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertdataLabel">Enter Resident Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Last Name:</label>
                <input name="lname" class="form-control input-sm" type="text" placeholder="Enter Last Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">First Name:</label>
                <input name="fname" class="form-control input-sm" type="text" placeholder="Enter First Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Middle Name:</label>
                <input name="mname" class="form-control input-sm" type="text" placeholder="Enter Middle Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Contact Number:</label>
                <input name="contactNum" class="form-control input-sm input-size" type="number" placeholder="Enter Contact Number" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Gender:</label>
                <select name="gender" class="form-control input-sm">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Civil Status:</label>
                <select name="civStatus" type="text" class="form-control input-sm input-size">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Birthday:</label>
                <input name="bday" class="form-control input-sm input-size" type="date" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Household Number:</label>
                <input name="houseNum" class="form-control input-sm input-size" type="number" min="1" placeholder="Enter Household Number" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Differently-abled Person:</label>
                <select name="abledPerson" class="form-control input-sm input-size">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Zone:</label>
                <select name="zone" class="form-control input-sm input-size">
                  <option selected="" disabled="">-Select Zone-</option>
                  <option value="Zone 1">Zone 1</option>
                  <option value="Zone 2">Zone 2</option>
                  <option value="Zone 3">Zone 3</option>
                  <option value="Zone 4">Zone 4</option>
                  <option value="Zone 5">Zone 5</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Total Household Member:</label>
                <input name="totalHouseMem" class="form-control input-sm" type="number" min="1" placeholder="Enter Total Household Member" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Relationship to Head:</label>
                <input name="relateToHead" class="form-control input-sm" type="text" placeholder="Enter Relationship to Head" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Employment Status:</label>
                <select name="employStatus" class="form-control input-sm">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="Employed">Employed</option>
                  <option value="Unemployed">Unemployed</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Religion:</label>
                <input name="religion" class="form-control input-sm" type="text" placeholder="Enter Religion" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Income:</label>
                <input name="income" class="form-control input-sm" type="number" placeholder="Enter Income" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Educational Attainment:</label>
                <select name="education" class="form-control input-sm input-size">
                  <option selected="" disabled="">-----Select-----</option>
                  <option value="none">None</option>
                  <option value="Elementary Level">Elementary Level</option>
                  <option value="Elementary Graduate">Elementary Graduate</option>
                  <option value="High School_Level">High School Level</option>
                  <option value="High School Graduate">High School Graduate</option>
                  <option value="Senior High Level">Senior High Level</option>
                  <option value="Senior High Graduate">Senior High Graduate</option>
                  <option value="College Level">College Level</option>
                  <option value="College Graduate">College Graduate</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Remarks:</label>
                <input name="remarks" class="form-control input-sm input-size" type="text" placeholder="Enter Remarks" />
              </div>
              <div class="form-group">
                <label class="control-label">Nationality:</label>
                <input name="nationality" class="form-control input-sm input-size" type="text" placeholder="Enter Nationality" />
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editdataLabel">Edit Resident Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

        <input type="hidden" class="form-control" id="user_id" name="id">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Last Name:</label>
                <input name="lname" class="form-control input-sm" id="lname" type="text" placeholder="Last Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">First Name:</label>
                <input name="fname" class="form-control input-sm" type="text" id="fname" placeholder="First Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Middle Name:</label>
                <input name="mname" class="form-control input-sm" type="text" id="mname" placeholder="Middle Name" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Contact Number:</label>
                <input name="contactNum" class="form-control input-sm" id="contactNum" type="text" placeholder="Contact Number" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Gender:</label>
                <select name="gender" id="gender" class="form-control input-sm">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Civil Status:</label>
                <select name="civStatus" id="civStatus" class="form-control input-sm input-size">
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Birthday:</label>
                <input name="bday" class="form-control input-sm input-size" id="bday" type="date" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Household Number:</label>
                <input name="houseNum" class="form-control input-sm" type="text" id="houseNum" placeholder="Household Number" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Differently-abled Person:</label>
                <select name="abledPerson" id="abledPerson" class="form-control input-sm input-size">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Zone:</label>
                <select name="zone" id="zone" class="form-control input-sm input-size">
                  <option value="Zone 1">Zone 1</option>
                  <option value="Zone 2">Zone 2</option>
                  <option value="Zone 3">Zone 3</option>
                  <option value="Zone 4">Zone 4</option>
                  <option value="Zone 5">Zone 5</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Total Household Member:</label>
                <input name="totalHouseMem" class="form-control input-sm" type="text" id="totalHouseMem" min="1" placeholder="Total Household Member" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Relationship to Head:</label>
                <input name="relateToHead" class="form-control input-sm" id="relateToHead" type="text" placeholder="Relationship to Head" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Employment Status:</label>
                <select name="employStatus" id="employStatus" class="form-control input-sm">
                  <option value="Employed">Employed</option>
                  <option value="Unemployed">Unemployed</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Religion:</label>
                <input name="religion" class="form-control input-sm" id="religion" type="text" placeholder="Religion" />
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Income:</label>
                <input name="income" class="form-control input-sm" id="income" type="number" placeholder="Income" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="control-label">Educational Attainment:</label>
                <select name="education" id="education" class="form-control input-sm input-size">
                  <option value="none">None</option>
                  <option value="Elementary Level">Elementary Level</option>
                  <option value="Elementary Graduate">Elementary Graduate</option>
                  <option value="High School_Level">High School Level</option>
                  <option value="High School Graduate">High School Graduate</option>
                  <option value="Senior High Level">Senior High Level</option>
                  <option value="Senior High Graduate">Senior High Graduate</option>
                  <option value="College Level">College Level</option>
                  <option value="College Graduate">College Graduate</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="control-label">Remarks:</label>
                <input name="remarks" class="form-control input-sm input-size" id="remarks" type="text" placeholder="Remarks" />
              </div>
              <div class="form-group">
                <label class="control-label">Nationality:</label>
                <input name="nationality" class="form-control input-sm input-size" id="nationality" type="text" placeholder="Nationality" />
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
      <div class="container my-20">
        <div class="d-flex justify-content-center mb-3">
          <div class="col-md-10">

            <div class="card">
              <div class="card-header">
                <h4 class="text-center"></h4>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#insertdata">
                  Add Resident
                </button>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-success" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">ID#</th>
                      <th style="width: 140px !important;">Household Number</th>
                      <th scope="col">Last Name</th>
                      <th style="width: 130px !important;">First Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Zone</th>
                      <th style="width: 150px !important;">Action</th>                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $connection = mysqli_connect("localhost", "root", "", "mis");

                    $fetch_query = "SELECT * FROM residents";
                    $fetch_query_run = mysqli_query($connection, $fetch_query);

                    if (mysqli_num_rows($fetch_query_run) > 0) {
                      while ($row = mysqli_fetch_array($fetch_query_run)) {
                        /*echo $row['id']; */

                    ?>
                        <tr>
                          <td class="user_id"><?php echo $row['id']; ?></td>
                          <td><?php echo $row['houseNum']; ?></td>
                          <td><?php echo $row['lname']; ?></td>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $row['zone']; ?></td>
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
      /*console.log(user_id);*/

      $.ajax({
        method: "POST",
        url: "code.php",
        data: {
          'click_edit_btn': true,
          'user_id': user_id,

        },
        success: function(response) {
          /*console.log(response);*/

          $.each(response, function(Key, value) {

            /*console.log(value['houseNum'])*/

            $('#user_id').val(value['id']);
            $('#lname').val(value['lname']);
            $('#fname').val(value['fname']);
            $('#mname').val(value['mname']);
            $('#contactNum').val(value['contactNum']);
            $('#gender').val(value['gender']);
            $('#bday').val(value['bday']);
            $('#civStatus').val(value['civStatus']);
            $('#houseNum').val(value['houseNum']);
            $('#abledPerson').val(value['abledPerson']);
            $('#zone').val(value['zone']);
            $('#totalHouseMem').val(value['totalHouseMem']);
            $('#relateToHead').val(value['relateToHead']);
            $('#employStatus').val(value['employStatus']);
            $('#religion').val(value['religion']);
            $('#income').val(value['income']);
            $('#education').val(value['education']);
            $('#remarks').val(value['remarks']);
            $('#nationality').val(value['nationality']);
          });

          $('#editdata').modal('show');
        }
      });

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