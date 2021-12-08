<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'><link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css');  ?>">
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

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5" style="height: 500px;">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body" style="width: 90%;">
                        <div class="content-body">
                            <h5 class="card-title text-center"><?php echo $content ?></h5>
                        </div>
                        <div class="content-footer text-center">
                            <!-- <hr> -->
                            <label for="footer">Copyright © 2021 PT. IS Ing Silver.</label>
                        </div>
                        <!-- <form class="form-signin">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- partial -->
  
</body>
</html>
