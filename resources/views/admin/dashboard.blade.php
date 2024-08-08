<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #343a40;
            color: #fff;
        }
        .btn-primary, .btn-secondary {
            margin-top: 10px;
        }
        .modal-header {
            background-color: #343a40;
            color: #fff;
        }
        .list-group {
            margin-left: 250px;
        }
        #add_button {
            margin-left: 468px;
        }
        .error{
            color:red;
        }
        .has-error .form-control {
            border-color: red;
        }
        .has-success .form-control {
            border-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0 text-center">Admin Dashboard</h1>
            </div>
            <div class="card-body">
                <h2 class="card-title text-center">Employee List</h2>
                <ul class="list-group mb-4 text-center w-50 ">
                    @foreach($employees as $employee)
                        <li class="list-group-item">{{ $employee->name }} - {{ $employee->email }}</li>
                    @endforeach
                </ul>
                <button class="btn btn-primary" id="add_button" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</button>
                <form action="{{ route('logout') }}" method="POST" class="mt-3 text-center">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Register Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store_employee')}}" method="POST" id="reg_form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#reg_form').validate({
                rules:{
                    name:{
                        required:true,
                    },
                    email:{
                        required:true,
                        email:true,
                    },
                    password:{
                        required:true,
                        minlength:8
                    },
                },
                messages:{
                    name:{
                        required:"Please Enter Name"
                    },
                    email:{
                        required:"Please Enter Email",
                        email:"Enter Valid Email Address"
                    },
                    password:{
                        required:"Please Enter Password",
                        minlength:"Your Password contain atleast 8 characters"
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    $(element).remove();
                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            });
        });
    </script>
</body>
</html>
