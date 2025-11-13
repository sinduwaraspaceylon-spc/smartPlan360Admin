document.addEventListener('DOMContentLoaded', () => {
    // Check for token in URL and validate it
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('token');
    
    if (token) {
        // Store token in hidden field
        document.getElementById('resetToken').value = token;
        
        // Validate token before showing form
        validateToken(token);
    } else {
        // No token provided, redirect to login
        showError('No reset token provided. Please request a new password reset link.');
        setTimeout(() => {
            window.location.href = 'login_form.php';
        }, 3000);
    }

    // Validate token with backend
    async function validateToken(token) {
        try {
            const res = await fetch(`reset_password_handler.php?token=${encodeURIComponent(token)}`);
            const result = await res.json();
            
            if (!result.success && result.message === "Invalid or expired token.") {
                showError(result.message);
                setTimeout(() => {
                    window.location.href = 'login_form.php';
                }, 3000);
            }
            // If token is valid, form will remain visible
        } catch (error) {
            console.error('Error validating token:', error);
            showError('Error validating reset token. Please try again.');
        }
    }

    function showError(message) {
        const messageBox = document.getElementById('resetPasswordMessage');
        messageBox.textContent = message;
        messageBox.className = 'form-message error';
        messageBox.style.display = 'block';
    }

    // Password strength checker
    const newPasswordInput = document.getElementById('newPassword');
    const strengthBar = document.getElementById('resetPasswordStrength');
    const strengthIndicator = document.getElementById('resetStrengthIndicator');
    const passwordHint = document.getElementById('resetPasswordHint');

    if (newPasswordInput && strengthBar && strengthIndicator && passwordHint) {
        // Show strength bar and hints when password field is focused
        newPasswordInput.addEventListener('focus', function() {
            strengthBar.classList.add('visible');
            passwordHint.classList.add('visible');
        });

        // Hide when field loses focus and is empty
        newPasswordInput.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                strengthBar.classList.remove('visible');
                passwordHint.classList.remove('visible');
            }
        });

        // Password input logic
        newPasswordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            const rules = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                symbol: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };

            // Update rule indicators
            Object.keys(rules).forEach(key => {
                const ruleElement = document.getElementById(`reset-rule-${key}`);
                if (ruleElement) {
                    if (rules[key]) {
                        ruleElement.classList.add('valid');
                        strength++;
                    } else {
                        ruleElement.classList.remove('valid');
                    }
                }
            });

            // Update strength bar
            const percentage = (strength / 5) * 100;
            strengthIndicator.style.width = percentage + '%';

            if (strength <= 2) {
                strengthIndicator.style.background = '#dc3545'; // red
            } else if (strength <= 4) {
                strengthIndicator.style.background = '#ffc107'; // yellow
            } else {
                strengthIndicator.style.background = '#28a745'; // green
            }

            // Recheck password match if confirm field has value
            const confirmPasswordInput = document.getElementById('resetConfirmPassword');
            if (confirmPasswordInput && confirmPasswordInput.value !== '') {
                checkPasswordMatch();
            }
        });
    }

    // Confirm password match checker
    const confirmPasswordInput = document.getElementById('resetConfirmPassword');
    const confirmPasswordMatch = document.getElementById('resetConfirmPasswordMatch');
    const matchMessage = document.getElementById('resetMatchMessage');
    
    if (confirmPasswordInput && newPasswordInput && confirmPasswordMatch && matchMessage) {
        confirmPasswordInput.addEventListener('focus', function() {
            if (this.value !== '' || newPasswordInput.value !== '') {
                confirmPasswordMatch.classList.add('visible');
            }
        });

        confirmPasswordInput.addEventListener('blur', function() {
            if (this.value === '') {
                confirmPasswordMatch.classList.remove('visible');
            }
        });

        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    }

    function checkPasswordMatch() {
        const password = newPasswordInput.value;
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

    // RESET PASSWORD FORM AJAX SUBMISSION
    document.getElementById("resetPasswordFormElement").addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const form = e.target;
        const password = newPasswordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const messageBox = document.getElementById("resetPasswordMessage");
        
        // Validate passwords match
        if (password !== confirmPassword) {
            messageBox.textContent = 'Passwords do not match!';
            messageBox.className = 'form-message error';
            messageBox.style.display = "block";
            return;
        }

        // Validate password strength (at least 3 criteria met)
        const rules = {
            length: password.length >= 8,
            upper: /[A-Z]/.test(password),
            lower: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            symbol: /[!@#$%^&*(),.?":{}|<>]/.test(password)
        };
        
        const strength = Object.values(rules).filter(Boolean).length;
        if (strength < 3) {
            messageBox.textContent = 'Password is too weak. Please meet at least 3 requirements.';
            messageBox.className = 'form-message error';
            messageBox.style.display = "block";
            return;
        }

        const formData = new FormData(form);

        try {
            const res = await fetch("reset_password_handler.php", { 
                method: "POST", 
                body: formData 
            });
            
            const result = await res.json();

            messageBox.textContent = result.message;
            messageBox.className = 'form-message ' + (result.success ? 'success' : 'error');
            messageBox.style.display = "block";

            if (result.success) {
                // Reset form and clear all indicators
                form.reset();
                
                // Hide password strength indicators
                strengthBar.classList.remove('visible');
                passwordHint.classList.remove('visible');
                confirmPasswordMatch.classList.remove('visible');
                
                // Reset password rules
                const ruleKeys = ['length', 'upper', 'lower', 'number', 'symbol'];
                ruleKeys.forEach(key => {
                    const ruleElement = document.getElementById(`reset-rule-${key}`);
                    if (ruleElement) ruleElement.classList.remove('valid');
                });
                
                // Reset strength bar
                strengthIndicator.style.width = '0%';
                
                // Redirect to login after 2 seconds
                setTimeout(() => {
                    window.location.href = 'login_form.php';
                }, 2000);
            }
        } catch (error) {
            console.error('Error:', error);
            messageBox.textContent = 'An error occurred. Please try again.';
            messageBox.className = 'form-message error';
            messageBox.style.display = "block";
        }
    });
});