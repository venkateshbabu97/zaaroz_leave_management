<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            margin: auto;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .login-form .form-control {
            margin-bottom: 15px;
        }
        .login-form button {
            width: 100%;
        }
        .login-form h2 {
            margin-bottom: 20px;
        }
        .login-form .form-group label {
            font-weight: bold;
        }
        .error{
            color: brown;
        }
        .has-error .form-control {
            border-color: red;
        }
        .has-success .form-control {
            border-color: green;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2 class="text-center">Login</h2>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" id="login_form">
            @csrf
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#login_form').validate({
                rules:{
                    email:{
                        required:true,
                        email:true,
                    },
                    password:{
                        required:true,
                    },
                },
                messages:{
                    email:{
                        required:"Please enter your email",
                        email:"Please enter a valid email address",
                    },
                    password:{
                        required:"Please enter your password",
                    },
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
