// Form switching functions
function showLogin() {
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('forgotPasswordForm').classList.add('hidden');
}

function showRegister() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
    document.getElementById('forgotPasswordForm').classList.add('hidden');
}

function showForgotPassword() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('forgotPasswordForm').classList.remove('hidden');
}

// Realtime Email Check for Registration
const emailInput = document.getElementById('registerEmail');
const emailStatus = document.getElementById('emailStatus');
let emailTimer = null;

if (emailInput) {
    emailInput.addEventListener('input', () => {
        clearTimeout(emailTimer);
        const email = emailInput.value.trim();

        if (email === '') {
            resetEmailField();
            return;
        }

        // Gmail format validation
        if (!email.match(/^[a-zA-Z0-9._%+-]+@gmail\.com$/)) {
            emailInput.style.borderColor = '#e74c3c';
            emailStatus.className = 'email-status invalid';
            return;
        }

        // Wait until user stops typing for 500ms
        emailTimer = setTimeout(async () => {
            try {
                const res = await fetch(`register_handler.php?email=${encodeURIComponent(email)}`);
                const result = await res.json();

                if (result.exists) {
                    emailStatus.className = 'email-status invalid';
                    emailInput.style.borderColor = '#e74c3c';
                } else {
                    emailStatus.className = 'email-status valid';
                    emailInput.style.borderColor = '#2ecc71';
                }
            } catch (err) {
                console.error('Error checking email:', err);
            }
        }, 500);
    });

    emailInput.addEventListener('blur', () => {
        if (emailInput.value.trim() === '') {
            resetEmailField();
        }
    });
}

function resetEmailField() {
    emailInput.style.borderColor = '';
    emailStatus.textContent = '';
    emailStatus.className = 'email-status';
}

// Password strength checker for REGISTRATION
const passwordInput = document.getElementById('password');
if (passwordInput) {
    const strengthBar = document.getElementById('passwordStrength');
    const passwordHint = document.getElementById('passwordHint');

    passwordInput.addEventListener('focus', function() {
        strengthBar.classList.add('visible');
        passwordHint.classList.add('visible');
    });

    passwordInput.addEventListener('blur', function() {
        if (this.value === '') {
            strengthBar.classList.remove('visible');
            passwordHint.classList.remove('visible');
        }
    });

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strengthIndicator = document.getElementById('strengthIndicator');
        
        let strength = 0;
        const rules = {
            length: password.length >= 8,
            upper: /[A-Z]/.test(password),
            lower: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            symbol: /[!@#$%^&*(),.?":{}|<>]/.test(password)
        };

        Object.keys(rules).forEach(key => {
            const ruleElement = document.getElementById(`rule-${key}`);
            if (rules[key]) {
                ruleElement.classList.add('valid');
                strength++;
            } else {
                ruleElement.classList.remove('valid');
            }
        });

        const percentage = (strength / 5) * 100;
        strengthIndicator.style.width = percentage + '%';
        
        if (strength <= 2) {
            strengthIndicator.style.background = '#dc3545';
        } else if (strength <= 4) {
            strengthIndicator.style.background = '#ffc107';
        } else {
            strengthIndicator.style.background = '#28a745';
        }
    });
}

// Password strength checker for RESET PASSWORD
const newPasswordInput = document.getElementById('newPassword');
if (newPasswordInput) {
    const resetStrengthBar = document.getElementById('resetPasswordStrength');
    const resetPasswordHint = document.getElementById('resetPasswordHint');

    newPasswordInput.addEventListener('focus', function() {
        resetStrengthBar.classList.add('visible');
        resetPasswordHint.classList.add('visible');
    });

    newPasswordInput.addEventListener('blur', function() {
        if (this.value === '') {
            resetStrengthBar.classList.remove('visible');
            resetPasswordHint.classList.remove('visible');
        }
    });

    newPasswordInput.addEventListener('input', function() {
        const password = this.value;
        const strengthIndicator = document.getElementById('resetStrengthIndicator');
        
        let strength = 0;
        const rules = {
            length: password.length >= 8,
            upper: /[A-Z]/.test(password),
            lower: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            symbol: /[!@#$%^&*(),.?":{}|<>]/.test(password)
        };

        Object.keys(rules).forEach(key => {
            const ruleElement = document.getElementById(`reset-rule-${key}`);
            if (rules[key]) {
                ruleElement.classList.add('valid');
                strength++;
            } else {
                ruleElement.classList.remove('valid');
            }
        });

        const percentage = (strength / 5) * 100;
        strengthIndicator.style.width = percentage + '%';
        
        if (strength <= 2) {
            strengthIndicator.style.background = '#dc3545';
        } else if (strength <= 4) {
            strengthIndicator.style.background = '#ffc107';
        } else {
            strengthIndicator.style.background = '#28a745';
        }
    });
}

// Confirm password match for REGISTER form
const confirmPasswordInput = document.getElementById('confirmPassword');
if (confirmPasswordInput && passwordInput) {
    const confirmPasswordMatch = document.getElementById('confirmPasswordMatch');
    const matchMessage = document.getElementById('matchMessage');

    confirmPasswordInput.addEventListener('focus', function() {
        if (this.value !== '' || passwordInput.value !== '') {
            confirmPasswordMatch.classList.add('visible');
        }
    });

    confirmPasswordInput.addEventListener('blur', function() {
        if (this.value === '') {
            confirmPasswordMatch.classList.remove('visible');
        }
    });

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword === '') {
            confirmPasswordMatch.classList.remove('visible');
            return;
        }

        confirmPasswordMatch.classList.add('visible');

        if (password === confirmPassword) {
            confirmPasswordMatch.classList.remove('no-match');
            confirmPasswordMatch.classList.add('match');
            matchMessage.innerHTML = '<i class="fa-solid fa-check"></i> Passwords match!';
        } else {
            confirmPasswordMatch.classList.remove('match');
            confirmPasswordMatch.classList.add('no-match');
            matchMessage.innerHTML = '<i class="fa-solid fa-xmark"></i> Passwords do not match';
        }
    }

    confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    passwordInput.addEventListener('input', function() {
        if (confirmPasswordInput.value !== '') {
            checkPasswordMatch();
        }
    });
}

// Confirm password match for RESET PASSWORD form
const resetConfirmPasswordInput = document.getElementById('resetConfirmPassword');
if (resetConfirmPasswordInput && newPasswordInput) {
    const resetConfirmPasswordMatch = document.getElementById('resetConfirmPasswordMatch');
    const resetMatchMessage = document.getElementById('resetMatchMessage');

    resetConfirmPasswordInput.addEventListener('focus', function() {
        if (this.value !== '' || newPasswordInput.value !== '') {
            resetConfirmPasswordMatch.classList.add('visible');
        }
    });

    resetConfirmPasswordInput.addEventListener('blur', function() {
        if (this.value === '') {
            resetConfirmPasswordMatch.classList.remove('visible');
        }
    });

    function checkResetPasswordMatch() {
        const password = newPasswordInput.value;
        const confirmPassword = resetConfirmPasswordInput.value;

        if (confirmPassword === '') {
            resetConfirmPasswordMatch.classList.remove('visible');
            return;
        }

        resetConfirmPasswordMatch.classList.add('visible');

        if (password === confirmPassword) {
            resetConfirmPasswordMatch.classList.remove('no-match');
            resetConfirmPasswordMatch.classList.add('match');
            resetMatchMessage.innerHTML = '<i class="fa-solid fa-check"></i> Passwords match!';
        } else {
            resetConfirmPasswordMatch.classList.remove('match');
            resetConfirmPasswordMatch.classList.add('no-match');
            resetMatchMessage.innerHTML = '<i class="fa-solid fa-xmark"></i> Passwords do not match';
        }
    }

    resetConfirmPasswordInput.addEventListener('input', checkResetPasswordMatch);
    newPasswordInput.addEventListener('input', function() {
        if (resetConfirmPasswordInput.value !== '') {
            checkResetPasswordMatch();
        }
    });
}

// REGISTER FORM AJAX
document.getElementById('registerFormElement').addEventListener('submit', async function (e) {
    e.preventDefault();
    const form = e.target;
    const messageBox = document.getElementById('registerMessage');
    const submitButton = form.querySelector('button[type="submit"]');
    const formData = new FormData(form);

    if (emailStatus.classList.contains('invalid')) {
        messageBox.style.display = 'block';
        messageBox.textContent = 'This email is already registered!';
        messageBox.className = 'form-message error';
        return;
    }

    // Show loading state
    const originalButtonText = submitButton.innerHTML;
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Creating Account...';

    try {
        const res = await fetch('register_handler.php', { method: 'POST', body: formData });
        const result = await res.json();

        messageBox.style.display = 'block';
        messageBox.textContent = result.message;
        messageBox.className = 'form-message ' + (result.success ? 'success' : 'error');

        if (result.success) {
            // Reset form and clear all visual indicators
            form.reset();
            emailStatus.textContent = '';
            emailStatus.className = 'email-status';
            emailInput.style.borderColor = '';
            
            // Hide password strength indicators
            document.getElementById('passwordStrength').classList.remove('visible');
            document.getElementById('passwordHint').classList.remove('visible');
            document.getElementById('confirmPasswordMatch').classList.remove('visible');
            
            // Reset password rules
            const rules = ['length', 'upper', 'lower', 'number', 'symbol'];
            rules.forEach(rule => {
                const ruleElement = document.getElementById(`rule-${rule}`);
                if (ruleElement) ruleElement.classList.remove('valid');
            });
            
            // Reset strength bar
            document.getElementById('strengthIndicator').style.width = '0%';
        }
    } catch (error) {
        messageBox.style.display = 'block';
        messageBox.textContent = 'An error occurred. Please try again.';
        messageBox.className = 'form-message error';
    } finally {
        // Re-enable button
        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
    }
});

// LOGIN FORM AJAX
document.getElementById('loginFormElement').addEventListener('submit', async function (e) {
    e.preventDefault();
    const form = e.target;
    const messageBox = document.getElementById('loginMessage');
    const formData = new FormData(form);

    const res = await fetch('login_handler.php', { method: 'POST', body: formData });
    const result = await res.json();

    messageBox.style.display = 'block';
    messageBox.textContent = result.message;
    messageBox.className = 'form-message ' + (result.success ? 'success' : 'error');

    if (result.success) {
        // Reset form
        form.reset();
        
        // Redirect after success
        setTimeout(() => {
            window.location.href = '../index.php';
        }, 1000);
    }
});

// FORGOT PASSWORD FORM AJAX
document.getElementById("forgotPasswordFormElement").addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const messageBox = document.getElementById("forgotPasswordMessage");
    const submitButton = form.querySelector('button[type="submit"]');

    // Show loading state
    const originalButtonText = submitButton.innerHTML;
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';

    try {
        const res = await fetch("forget_password_handler.php", { method: "POST", body: formData });
        const result = await res.json();

        messageBox.textContent = result.message;
        messageBox.className = 'form-message ' + (result.success ? 'success' : 'error');
        messageBox.style.display = "block";
        
        if (result.success) {
            // Reset form after successful submission
            form.reset();
        }
    } catch (error) {
        messageBox.textContent = 'An error occurred. Please try again.';
        messageBox.className = 'form-message error';
        messageBox.style.display = "block";
    } finally {
        // Re-enable button
        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
    }
});

// RESET PASSWORD FORM AJAX
document.getElementById("resetPasswordFormElement").addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const messageBox = document.getElementById("resetPasswordMessage");

    const res = await fetch("reset_password_handler.php", { method: "POST", body: formData });
    const result = await res.json();

    messageBox.textContent = result.message;
    messageBox.className = 'form-message ' + (result.success ? 'success' : 'error');
    messageBox.style.display = "block";

    if (result.success) {
        setTimeout(() => {
            // Remove token from URL
            window.history.replaceState({}, document.title, window.location.pathname);
            showLogin();
            messageBox.style.display = "none";
        }, 2000);
    }
});