<?php
the_post();
get_header();
?>
<div class="wrapper">
    <?php
        $error= '';
        $success = "";
    
        global $wpdb, $PasswordHash, $current_user, $user_ID;
    
        if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
            
            $password1 = $wpdb->escape(trim($_POST['password_input']));
            $password2 = $wpdb->escape(trim($_POST['confirmpassword_input']));
            $email = $wpdb->escape(trim($_POST['email_input']));
            $username = $wpdb->escape(trim($_POST['fullname_input']));
            $lastname = $wpdb->escape(trim($_POST['lastname_input']));
            $firstname = $wpdb->escape(trim($_POST['firstname_input']));
            
            if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $lastname == "" || $firstname == "") {
                $error= 'Vui lòng điền vào tất cả các trường bắt buộc.';
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error= 'Địa chỉ email không hợp lệ.';
            } else if(email_exists($email) ) {
                $error= 'Email đã được tồn tại.';
            } else if($password1 <> $password2 ){
                $error= 'Mật khẩu không khớp.';       
            }
            else if(strlen($password1) < 8){
                $error= "Mật khẩu của bạn quá ngắn!";
            }
            else if(!preg_match("#[0-9]+#", $password1)){
                $error = "Mật khẩu của bạn phải có ít nhất một con số";
            }
            else if(!preg_match("#[a-zA-Z]+#", $password1)){
                $error = "Mật khẩu của bạn phải có ít nhất một kí tự!";
            }
            else if(empty($_POST['chexboxAgreement'])){
                $error= 'Vui lòng nhấp vào hộp tôi đồng ý với chính sách bảo mật của Sehama.';       
            }else {
    
                $user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $password1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'txtPhone' => apply_filters('pre_user_user_txtPhone', $phone),'txtAdress' => apply_filters('pre_user_user_txtAdress', $address),'role' => 'subscriber' ) );
                if( is_wp_error($user_id) ) {
                    $error= 'Error on user creation.';
                } else {
                    do_action('user_register', $user_id);
                    
                    $success = 'You\'re successfully register';
                }
                
            }
            
        }

    function validate_phone_number($phone){
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 11) {
        return false;
     } else {
       return true;
     }  
    }
    ?>
    <!--display error/success message-->
    <div id="message">
        <?php 
            if(!empty($err) ) :
                echo '<p class="error">'.$err.'';
            endif;
        ?>
        
        <?php 
            if(!empty($success) ) :
                echo "<script> window.location = '" . site_url('my-account'). "'</script>";
            endif;
        ?>

    </div>
   
    <div class="container-fluid">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p class="title-header">Welcom to ATDD company <span class="name-brand"></span>. Sign up here!</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p  style="float:right;">You have account<span class="text-login"><a href=" <?php echo  site_url('my-account'); ?>"> Sign in </a></span>here</p>
            </div>
        </div>
        <?php if($error){ ?>
        <div class="row alignleft alert alert-danger" style="color:red;">
            <span><?php if($success != "") { echo $success; } ?> <?php if($error!= "") { echo $error; } ?>
        </span>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
                <div class="bg-login-form mb-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-login">
                            <form class="login" method="post">
                            <div class="form-group">
                                    <label for="InputFirstName">First name:<span class="required"> *</span></label>
                                    <input type="text" class="form-control address-input" name="firstname_input" value="<?php echo $firstname; ?>" id="firstname_input" placeholder="First name">
                                    </div>
                                    
                                <div class="form-group">
                                    <label for="InputLastName">Last name:<span class="required"> *</span></label>
                                    <input type="text" class="form-control phonenumber-input" name="lastname_input" value="<?php echo $lastname; ?>" id="lastname_input" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <label for="InputFullName">Full name: <span class="required"> *</span></label>
                                    <input type="text" class="form-control fullname-input" name="fullname_input" id="fullname_input" value="<?php echo $username; ?>" placeholder="Vui lòng nhập họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email address: <span class="required"> *</span></label>
                                    <input type="email" class="form-control email-input" name="email_input" id="email_input" value="<?php echo $email; ?>" aria-describedby="emailHelp" placeholder="Vui lòng nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Password: <span class="required"> *</span></label>
                                    <input type="password" class="form-control password-input" name="password_input" id="password_input" placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Confirm password: <span class="required"> *</span></label>
                                    <input type="password" class="form-control password-input" name="confirmpassword_input" id="confirmpassword_input" placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                
                                <div class="form-check agreement">
                                    <input type="checkbox" class="form-check-input" name="chexboxAgreement" id="chexboxAgreement">
                                    <label class="form-check-label text-agreement" for="chexboxAgreement">I agree with the privacy policy of ATDD</label>
                                </div>
                                <div></div>
                                <button type="submit" class="form-control btn btn-dark register-button" id="register-button">Sing up</button>
                                <input type="hidden" name="task" value="register" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-2"></div>
        </div>
    </div>
</div>

<?php
get_footer(); ?> 