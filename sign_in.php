<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <form id="signup-form" class="signup-form">
                   <h2 style="margin-bottom:40px;">Sign In</h2>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email" required />
                    </div>
                    <div class="form-group" style="margin-bottom:40px;">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"
                            required />
                        <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="button" name="submit" id="submit" class="form-submit submit" value="Sign In" />
                        <a href="index.php" class="submit-link submit">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                var email = $("#email").val();
                var password = $("#password").val();
                if (email == "" || password == "") {
                    alert("Please fill all the fields");
                }
                else if (IsEmail(email) == false) {
                    alert("Invalid email address");
                } else {
                        $.ajax({
                            url: "backend.php",
                            type: "POST",
                            data: {
                                "signin_email": email,
                                "signin_password": password
                            },
                            success: function (data) {
                                alert(data);
                                if(data=="Login successfull"){
                                    window.location.href = "sign_in.php";
                                }
                            }
                        }); 
                }

            });
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

        })
    </script>
</body>

</html>