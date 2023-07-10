<!doctype html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
  <title>CTstore Đăng nhập - Đăng ký</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/login_sigin/style-login123.css">
</head>
<body>  
<?php
    // if(isset($data["message"])){
    //     $message = $data["message"];
    // }
?>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Đăng nhập</span><span>Đăng ký</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">

                                            <form method="post" action="/Project---CTStore---WD1110/Login_Sigin/Check_Login">
                                                <h4 class="mb-4 pb-3">Đăng nhập</h4>
                                                <?php if (isset($data['message'])){
                                                    $message = $data["message"];
                                                ?>
                                                    <p class="alert alert-danger"><?php echo $message?></p>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <input type="email" class="form-style" placeholder="Email" name="email">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password" name="password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input class="btn mt-4" type="submit" name="Login" value="Đăng nhập">
                                                <p class="mb-0 mt-4 text-center"><a href="/Project---CTStore---WD1110/Login_Sigin/View_Forgot_Password" class="link">Quên mật khẩu ?</a></p>
                                            </form> 
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">

                                            <form method="post" action="/Project---CTStore---WD1110/Login_Sigin/Check_Sigin/0">
                                                <h4 class="mb-3 pb-3">Đăng ký</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Họ và Tên" name="FullName">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" class="form-style" placeholder="Số điện thoại (bắt buộc)" name="Phone">
                                                    <i class="input-icon uil uil-phone"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="email" class="form-style" placeholder="Email (bắt buộc)" name="Email">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Mật khẩu" name="Password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <!-- <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Xác nhận mật khẩu" name="Password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div> -->
                                                <input class="btn mt-4" type="submit" name="Register" value="Đăng ký">
                                            </form> 
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>