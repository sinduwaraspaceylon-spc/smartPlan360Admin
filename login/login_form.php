<?php include "../components/CDN.php" ?>
<link rel="stylesheet" href="../css/test.css">
<!-- <link rel="stylesheet" href="../css/test2.css"> -->
<div class="background">
        <div class="container">
            <!-- Login Form -->
            <div id="loginForm" class="form-container">
                <h2>Smart Plan 360</h2>
                <p class="subtitle">Login here</p>
                
                <div id="loginMessage" class="form-message" style="display:none;"></div>

                <form id="loginFormElement" action="login_handler.php" method="POST">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                
                    <div class="forgot-password">
                        <a onclick="showForgotPassword()">Forgot Password?</a>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>

                <div class="switch-form">
                    Don't have an account? <a onclick="showRegister()">Sign Up</a>
                </div>
            </div>

            <!-- Registration Form -->
            <div id="registerForm" class="form-container hidden">
                <h2>Smart Plan 360</h2>
                <p class="subtitle">Sign up here</p>

                <div id="registerMessage" class="form-message" style="display:none;"></div>

                <form id="registerFormElement" action="register_handler.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="fullname" placeholder="Full Name" required>
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="input-group" style="position: relative;">
                        <input type="email" name="email" id="registerEmail" placeholder="Email Address" required>
                        <i class="fa-solid fa-envelope"></i>
                        <span id="emailStatus" class="email-status"></span>
                    </div>

                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div id="passwordStrength" class="strength-bar">
                        <div id="strengthIndicator"></div>
                    </div>

                    <small id="passwordHint" class="password-hint">
                        <ul class="password-rules" id="passwordRules">
                            <li id="rule-length">8 characters</li>
                            <li id="rule-upper">uppercase</li>
                            <li id="rule-lower">lowercase</li>
                            <li id="rule-number">number</li>
                            <li id="rule-symbol">symbol</li>
                        </ul>
                    </small>

                    <div class="input-group">
                        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required minlength="8">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div id="confirmPasswordMatch" class="confirm-password-match">
                        <span id="matchMessage"></span>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to Terms & Conditions</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Account</button>
                </form>

                <div class="switch-form">
                    Already have an account? <a onclick="showLogin()">Sign In</a>
                </div>
            </div>
            <!-- Forgot Password Form -->
            <div id="forgotPasswordForm" class="form-container hidden">
                <h2>Smart Plan 360</h2>
                <p class="subtitle">Reset your password</p>

                <div id="forgotPasswordMessage" class="form-message" style="display:none;"></div>

                <form id="forgotPasswordFormElement" action="forgot_password_handler.php" method="POST">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                </form>

                <div class="back-to-login">
                    Remember your password? <a onclick="showLogin()">Sign In</a>
                </div>
        </div>
    </div>
    </div>
    <script src="../js/user_auth.js"></script>