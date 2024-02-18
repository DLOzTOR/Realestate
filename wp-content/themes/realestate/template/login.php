<?php
/*
* Template name: Login
*/
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['log']) && isset($_POST['pwd'])) {
            $username = esc_attr(sanitize_user($_POST['log']));
            $password = esc_attr($_POST['pwd']);

            $user = wp_authenticate($username, $password);

            if (!is_wp_error($user)) {
                // Log the user in
                if (isset($_POST['rememberme'])) {
                    $remember = true;
                } else {
                    $remember = false;
                }
                wp_set_auth_cookie($user->ID, $remember);
                wp_redirect(home_url());
                exit;
            } else {
                $error_message = $user->get_error_message();
            }
        }
    } elseif (isset($_POST['register'])) {
        $user_data = array(
            'user_login' => esc_attr($_POST['user-name']),
            'user_pass' => esc_attr($_POST['password']),
            'user_email' => esc_attr($_POST['email']),
            'first_name' => esc_attr($_POST['first-name']),
            'last_name' => esc_attr($_POST['last-name']),
            'role' => 'subscriber'
        );

        $user_id = wp_insert_user($user_data);
        if (!is_wp_error($user_id)) {
            $success_message = 'Registration successful';
        } else {
            $error_message = $user_id->get_error_message();
        }
    }
}
get_header();
?>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">New account / Sign in </h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- register-area -->
<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">

        <form action="<?= wp_login_url() ?>" method="post">
            <div class="col-md-6">
                <div class="box-for overflow">
                    <div class="col-md-12 col-xs-12 register-blocks">
                        <h2>New account : </h2>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
                        ?>
                            <p>
                                <?php
                                if (isset($error_message)) {
                                    echo $error_message;
                                } elseif (isset($success_message)) {
                                    echo '<strong><span style="color: green;">' . $success_message . '</span></strong>';
                                }
                                ?>
                            </p>
                        <?php
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="first-name">First name</label>
                                <input type="text" class="form-control" name="first-name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last name</label>
                                <input type="text" class="form-control" name="last-name" required>
                            </div>
                            <div class="form-group">
                                <label for="user-name">Username</label>
                                <input type="text" class="form-control" name="user-name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="register" value="Register" class="btn btn-default">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?= wp_login_url() ?>" method="post">
            <div class="col-md-6">
                <div class="box-for overflow">
                    <div class="col-md-12 col-xs-12 login-blocks">
                        <h2>Login : </h2>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                        ?>
                            <p>
                                <?php
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                ?>
                            </p>
                        <?php
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="log">Username or Email Address</label>
                                <input type="text" class="form-control" name="log" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" name="pwd" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="rememberme" checked />
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login" value="Log in" class="btn btn-default">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
get_footer();
