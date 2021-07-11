<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>

    <body>
        <!-- ADD Student Data Modal -->
        <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD Student Data Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addform">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                            </div>

                            <div class="form-group">
                                <label> Last Name </label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                            </div>
                        
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label> Mobile </label>
                                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Phone Number">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Student Data</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!-- EDIT Data Student Modal -->
        <div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editFormID">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                            </div>

                            <div class="form-group">
                                <label> Last Name </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                            </div>
                        
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label> Mobile </label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Phone Number">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Student Data</button>
                        </div>
                    </form> 
                    
                </div>
            </div>
        </div>

        <!-- DELETE Data Student Modal -->
        <div class="modal fade" id="studentDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="deleteFormID">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            
                            <input type="hidden" name="id" id="delete_id">
                            <p>Are you sure want to DELETE this data?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">DELETE Student Data</button>
                        </div>
                    </form> 
                    
                </div>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">CampusPedia Internship Assignment</h1>
                <p class="lead">CRUD Laravel 5.6 with using AJAX JQuery</p>
                <hr class="my-4">
                <p>This is made by Vincentius Sutanto (@vcentsu) from Binus University. Data dibawah ini merupakan data dummy yang dibuat sebagai simulasi pendaftar Campuspedia Internship</p>
                <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    ADD Student Data
                </button>
            </div>
            
            <!-- READ Student Data -->
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>
                                <a href="#" class="btn btn-success editbtn"> EDIT </a>
                                <a href="#" class="btn btn-danger deletebtn"> DELETE </a>
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function(){
                
                $('.deletebtn').on('click',function(){
                    $('#studentdeleteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);
                });

                $('#deleteFormID').on('submit', function(e){
                    e.preventDefault();

                    var id = $('#delete_id').val();

                    s.ajax({
                        type: "DELETE",
                        url: "/studentdelete/"+id,
                        data: $('#deleteFormID').serialize(),
                        success: function(response){
                            console.log(response);
                            $('#studentdeleteModal').modal('hide');
                            alert("Data Deleted");
                            location.reload();
                        },
                        error: function(error){
                            console.log(error);
                            
                        }
                    });
                });
            });
        </script>
        
        <script>
            $(document).ready(function(){

                $('.editbtn').on('click',function(){
                    $('#studentEditModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#id').val(data[0]);
                    $('#first_name').val(data[1]);
                    $('#last_name').val(data[2]);
                    $('#email').val(data[3]);
                    $('#mobile').val(data[4]);
                });

                $('#editFormID').on('submit', function(e){
                    e.preventDefault();

                    var id = $('#id').val();

                    $.ajax({
                        type: "PUT",
                        url: "/studentupdate/"+id,
                        data: $('#editFormID').serialize(),
                        success: function(response){
                            console.log(response);
                            $('#studentEditModal').modal('hide');
                            alert("Data Updated");
                            location.reload();
                        },
                        error: function(error){
                            console.log(error)
                            //alert("Data Not Updated");
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {

                $('#addform').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: "/studentadd",
                        data: $('#addform').serialize(),
                        success: function (response){
                            console.log(response)
                            $('#studentaddmodal').modal('hide')
                            alert("Data Saved");
                            location.reload();
                        },
                        error: function(error){
                            console.log(error)
                            //alert("Data Not Saved");
                        }
                    });
                });
            });
        </script>

        
    </body>
</html>
