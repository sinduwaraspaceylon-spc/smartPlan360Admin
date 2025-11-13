document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('verifyEmailFormElement');
    const messageBox = document.getElementById('verifyEmailMessage');
    const sectionSelect = document.getElementById('section_id');

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Validate section selection
            if (!sectionSelect.value) {
                showMessage('Please select a section.', 'error');
                sectionSelect.focus();
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verifying...';

            // Prepare form data
            const formData = new FormData(form);

            try {
                const response = await fetch('varify_email_handler.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.error) {
                    showMessage(result.message, 'success');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                } else {
                    
                }
            } catch (error) {
                showMessage('An error occurred. Please try again.', 'error');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });
    }

    function showMessage(message, type) {
        messageBox.textContent = message;
        messageBox.className = 'form-message ' + (type === 'success' ? 'success-message' : 'error-message');
        messageBox.style.display = 'block';
        
        // Scroll to message
        messageBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        // Auto-hide message after 5 seconds (only for error messages)
        if (type === 'error') {
            setTimeout(() => {
                messageBox.style.opacity = '0';
                setTimeout(() => {
                    messageBox.style.display = 'none';
                    messageBox.style.opacity = '1';
                }, 300);
            }, 5000);
        }
    }
});