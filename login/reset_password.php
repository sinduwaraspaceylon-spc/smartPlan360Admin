<?php include "../components/CDN.php" ?>
<link rel="stylesheet" href="../css/test.css">
<div class="background">
    <div class="container">
        <div id="resetPasswordForm" class="form-container">
            <h2>Smart Plan 360</h2>
            <p class="subtitle">Create new password</p>

            <div id="resetPasswordMessage" class="form-message" style="display:none;"></div>

            <form id="resetPasswordFormElement">
                <!-- Hidden token field -->
                <input type="hidden" id="resetToken" name="token" value="">

                <div class="input-group">
                    <input type="password" id="newPassword" name="password" placeholder="New Password" required minlength="8">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div id="resetPasswordStrength" class="strength-bar">
                    <div id="resetStrengthIndicator"></div>
                </div>

                <small id="resetPasswordHint" class="password-hint">
                    <ul class="password-rules" id="resetPasswordRules">
                        <li id="reset-rule-length">8 characters</li>
                        <li id="reset-rule-upper">uppercase</li>
                        <li id="reset-rule-lower">lowercase</li>
                        <li id="reset-rule-number">number</li>
                        <li id="reset-rule-symbol">symbol</li>
                    </ul>
                </small>

                <div class="input-group">
                    <input type="password" id="resetConfirmPassword" name="confirm_password" placeholder="Confirm New Password" required minlength="8">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div id="resetConfirmPasswordMatch" class="confirm-password-match">
                    <span id="resetMatchMessage"></span>
                </div>

                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>

            <div class="back-to-login">
                Remember your password? <a href="login.php">Sign In</a>
            </div>
        </div>
    </div>
</div>
<script src="../js/reset_password.js"></script>