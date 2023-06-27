<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Simple CRUD</h1>
        <form id="form">
            <div id="alertdiv"></div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                        <label for="lastname">Lastname</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                        <label for="firstname">Firstname</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate">
                        <label for="birthdate">Birthdate</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <select name="gender" id="gender" class="form-control" placeholder="Gender">
                            <option value="">-select gender-</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <select name="region" id="region" class="form-control" placeholder="Region">
                            <option value="">-select region-</option>
                        </select>
                        <label for="region">Region</label>
                    </div>
                </div>
            </div>
            <input type="hidden" id="action" name="action" value="save">
            <input type="hidden" id="volunteerid" name="volunteerid">
            <input type="submit" id="submitbtn" value="Save" class="btn btn-primary">
        </form>
        <div class="row">
            <table id="volunteertable" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Age</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Region</th>
                    </tr>
                </thead>
                <tbody id="row_data">
                </tbody>
            </table>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>
</html>