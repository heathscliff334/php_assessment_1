<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'><link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css');  ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
    <style>
        .content-body{
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;

            -ms-flex-align: center;
            -webkit-align-items: center;
            -webkit-box-align: center;

            align-items: center;
            justify-content: center;
            min-height: calc(100% - 25px);
        }    
        .content-footer{
            color: #9c9c9c;
            border-top: 1px solid rgba(0,0,0,.1);
            margin-top: 30px;
            padding-top: 15px;
        }
        .content-footer2{
            color: #9c9c9c;
            border-top: 1px solid rgba(0,0,0,.1);
            padding-top: 15px;
        }
        @media only screen and (max-width: 40em) {
			.content-body{
                min-height: calc(100% - 60px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5" style="min-height: 500px;">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div id="formId" class="card-body" style="">
                        <h5 class="card-title text-center">Invitation Form</h5>
                        <hr>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="email" class="form-control" placeholder="email*" required autofocus>
                                <label for="email">Email <font style="color: red;">*</font></label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="password*"  required autofocus>
                                <label for="password">Password <font style="color: red;">*</font></label>
                            </div>
                            <p id="errorMessage" style="color: red;"></p>

                            <a id="btnSubmit" class="btn btn-lg btn-primary btn-block text-uppercase text-white" onclick="submitForm()"><i class="fa fa-spinner fa-spin" id="spinner_id" style="display: none;"></i><i class="fa fa-check" id="check_id" style="display: none;"></i> Login</a>
                            <br>
                            <a id="btnMoveEn" class="btn btn-lg btn-success btn-block text-uppercase text-white" onclick="moveToEncrypt()">Encrypt / Decrypt</a>
                        </form>
                        <div class="content-footer text-center">
                            
                            <label for="footer">Developed by Kevin.</label>
                        </div>
                    </div>
                    <div id="formSuccess" class="card-body" style="display: none;">
                        <div class="content-body">
                            <h5 class="card-title text-center">Login Success</h5>
                        </div>
                        <div class="content-footer2 text-center">
                            <!-- <hr> -->
                            <label for="footer">Copyright © 2021 PT. IS Ing Silver.</label>
                        </div>
                    </div>
                    <div id="formEncrypt" class="card-body" style="display: none;">
                        <h5 class="card-title text-center">Encrypt / Decrypt Form</h5>
                        <hr>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="input" class="form-control" placeholder="input*" required autofocus>
                                <label for="input">Input <font style="color: red;">*</font></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="result" class="form-control" placeholder="result*"  required autofocus>
                                <label for="result">Result <font style="color: red;">*</font></label>
                            </div>
                            
                            <p id="errorMessage" style="color: red;"></p>
                            <br>
                            <a id="btnEn" class="btn btn-lg btn-primary btn-block text-uppercase text-white" onclick="encryptInput()">Encrypt</a>
                            <br>
                            <a id="btnDec" class="btn btn-lg btn-success btn-block text-uppercase text-white" onclick="decryptInput()">Decrypt</a>
                            <br>
                            <a id="btnClear" class="btn btn-lg btn-danger btn-block text-uppercase text-white" onclick="clearInput()">Clear</a>
                            <br>
                            <a id="btnBack" class="btn btn-lg btn-warning btn-block text-uppercase text-white" onclick="moveToDefault()">< Back</a>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let secretPass = "W8GGhyhYes44Uys";

        function encryptInput(){
            var input = document.getElementById('input').value;
            
            console.log(input);
            var encryptedAES = CryptoJS.AES.encrypt(input, secretPass);
            document.getElementById('result').value = encryptedAES;
        }
        function decryptInput(){
            var input = document.getElementById('input').value;
            
            var decryptedBytes = CryptoJS.AES.decrypt(input, secretPass);
            console.log(decryptedBytes);
            var plainText = decryptedBytes.toString(CryptoJS.enc.Utf8);
            console.log(plainText);
            document.getElementById('result').value = plainText;
        }
        function clearInput(){
            document.getElementById('input').value = "";
            document.getElementById('result').value = "";
        }
        function moveToDefault(){
            $("#formEncrypt").slideUp('slow');
            $("#formId").slideDown('slow');
        }
        function moveToEncrypt(){
            $("#formEncrypt").slideDown('slow');
            $("#formId").slideUp('slow');
        }
        function submitForm(){
            
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            
            
            $("#spinner_id").show('slow');
            $.ajax({
                url : "http://laurenscodes.space:5001/api/online_att/auth",
                type: 'POST',
                data: {email:email, password:password},
                success : function(data){

                    
                    var obj = data
                    if(obj.success == true){  
                        setTimeout(() => {
                            $("#spinner_id").css("display", "none");
                            $("#check_id").css("display", "");
                            $("#check_id").removeClass("fa-times");
                            $("#check_id").addClass("fa-check");
                            setTimeout(() => {
                                $("#check_id").hide('slow');
                            }, 2000);
                            $("#formId").slideUp('slow');
                            $("#formSuccess").slideDown('slow');
                        }, 2000);         
                    } else {
                        setTimeout(() => {
                            $("#spinner_id").css("display", "none");
                            $("#check_id").css("display", "");
                            $("#errorMessage").slideDown('slow');
                            $("#check_id").addClass("fa-times");
                            $("#check_id").removeClass("fa-check");
                            document.getElementById('errorMessage').innerHTML = obj.message;
                            setTimeout(() => {
                                $("#check_id").hide('slow');
                            }, 2000);
                        }, 2000);      
                    }
                },
                error: function(){
                alert("Server Error");
                }
            });  
        }        
    </script>
</body>
<!-- partial -->
</html>
