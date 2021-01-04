<?php
    require_once('db/conn.php'); 
    require_once('views/header.php');
    require_once('db/fetch-data.php');
    $result = fetch_data();?>

    <div class="add-activity">
      <h4>Add activity</h4>
      <form method="post" action="db/add.php">
        <div class="">
          <div class="col-md-6">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="">
              <label for="date" class="col-sm-4 col-form-label mt-2">Date</label>
              <div class="col-sm-8 mt-2">
                  <input type="date" class="form-control" id="date" name="date" placeholder="0000-00-00" required>
              </div>
            </div>

            <!-- dropdown catagories -->
            <label for="sel1" class="col-sm-4 col-form-label">Select Category (select one):</label>

            <div class="col-sm-8">
                <select class="form-control" name="cateselect">
                <?php
                $allcatnames = fetch_all_categories();
                if (!empty($allcatnames)) { ?>
                  <?php for ($i = 0; $i < count($allcatnames); $i++) : ?>
                    <option value="<?= $allcatnames[$i]['id'] ?>"><?= $allcatnames[$i]['name'] ?></li>
                    <?php endfor; ?>
                  <?php } ?>
                </select>
            </div>
          </div>

          <div class="col-md-6">
            <label for="description" class="col-sm-4 col-form-label">Description</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <label for="hours" class="col-sm-4 col-form-label">Duration: </label>
            <div class="col-sm-8">
              <input type="number" min="0" class="form-control" id="hours" name="hours" placeholder="Hours" required>
              <input type="number" max="59" min="0" class="form-control" id="minutes" name="minutes" placeholder="Minutes">
            </div>

          </div>
        </div>
        <div class="row text-center margin-xs">
          <div class="col-md-12 ">

            <input type="submit" value="Click to Add" name="submit" class="btn btn-primary">
          </div>
        </div>
    </div>
    </form>
    </div>

    <div class="activity-listing">
      <h4>Activities</h4>
      <div class="table-responsive">
        <table id="activities" class="display col-md-6 table" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Date</th>
              <th>Duration</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($result)) { ?>
              <?php for ($i = 0; $i < count($result); $i++) : ?>
                <tr id="<?php echo $result[$i]['id']; ?> ">

                  <td><?= $result[$i]['name'] ?></td>
                  <td id="<?php echo  $result[$i]['id']; ?>"><?= $result[$i]['description'] ?></td>
                  <td><?= $result[$i]['date'] ?></td>
                  <td><?= $result[$i]['duration'] ?></td>
                  <td><?php
                      $catid = $result[$i]['categoryId'];
                      $catname = fetch_category_name($catid);
                      ?><?= $catname[0]['name'] ?></td>
                  <td><button type="button" class="btn btn-xs btn-primary editBtn col-xs-10 col-md-4" name="editBtn" data-toggle="modal" id="editBtn" data-target="#editModel">Edit</button>
                    <button type="button" data-toggle="modal" id="deleteBtn" data-target="#exampleModal" class="btn btn-xs btn-danger deleteBtn col-xs-10 col-md-4">Delete</button>
                    <!-- Button trigger modal -->
                  </td>
                </tr>
              <?php endfor; ?>
            <?php } ?>
           </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Date</th>
              <th>Duration</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

<!-------------Delete Modal ----------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Acitivity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete activity?
            <form method="post" action="db/delete.php">
              <input type="hidden" name="deleteId" id="deleteId" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Confirm Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.deleteBtn').on('click', function() {
          $tr = $(this).closest('tr').attr('id');
          //  var data =$("td:nth-child(2)").attri();
          //  }).get();
          console.log($tr);
          $('#deleteId').val($tr);
         });
      });
    </script>
<!---------End Delete Model------------>

<!--------Edit Model-------------------->
    <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Acitivity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Are you sure you want to delete activity? -->
            <form method="post" action="db/edit.php">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="editName" id="editName" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" class="form-control" name="editDate" id="editDate" placeholder="Enter Date">
              </div>
              <div class="form-group">
                <label for="hours">Hours</label>
                <input type="number" class="form-control" name="editHours" id="editHours" placeholder="Enter Hours">
              </div>
              <div class="form-group">
                <label for="minutes">Minutes</label>
                <input type="number" class="form-control" name="editMinutes" min=0 max=59 id="editMinutes" placeholder="Enter minutes">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="editDescription" id="editDescription" rows="3"></textarea>
              </div>

              <!-- category selection edit --> 
              <div class="form-group">
               <label for="description">Category</label>
                <select class="form-control" name="editcatselect" id="editCategory">
                  <?php
                  $allcatnames = fetch_all_categories();
                  if (!empty($allcatnames)) { ?>
                    <?php for ($i = 0; $i < count($allcatnames); $i++) : ?>
                      <option value="<?= $allcatnames[$i]['id'] ?>"><?= $allcatnames[$i]['name'] ?></li>
                      <?php endfor; ?>
                    <?php } ?>

                </select>
              </div>

              <input type="hidden" name="edit-id" id="edit-id" />

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="edit" class="btn btn-primary">Confirm Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('.editBtn').on('click', function() {
          //console.log("hello");
          $tr = $(this).closest('tr').attr('id');
          var data = $(this).closest('tr').children("td").map(function() {
            return $(this).text();
          }).get();
          //console.log(data[4]);
          let hours = data[3].split(' ');
          $('#edit-id').val($tr);
          $('#editName').val(data[0]);
          $('#editDescription').text(data[1]);
          $('#editDate').val(data[2]);
          $('#editHours').val(hours[0].replace('h', ''));
          $('#editMinutes').val(hours[1].replace('m', ''));
          $('select[name="editcatselect"]').find('option:contains('+data[4]+')').attr("selected",true);
          //console.log(hours[0]);
      });
      });
    </script>
    <!---------End Delete Modal----------->
    <?php require_once('views/footer.php')  ?>