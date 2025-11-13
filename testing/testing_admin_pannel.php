<?php
// admin_password_reset.php
session_start();
require_once '../components/db_connection.php';

// Check if user is admin (adjust according to your admin check logic)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

include "../components/CDN.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Reset User Password</title>
    <link rel="stylesheet" href="../css/test.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 20px;
        }
        
        .admin-header {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        .admin-header h2 {
            margin: 0;
            color: #333;
        }
        
        .user-search {
            margin-bottom: 30px;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #4CAF50;
        }
        
        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .users-table th,
        .users-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .users-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #555;
        }
        
        .users-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .btn-reset {
            background-color: #ff9800;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        
        .btn-reset:hover {
            background-color: #f57c00;
        }
        
        .btn-reset:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        
        .no-users {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .status-inactive {
            background-color: #ffebee;
            color: #c62828;
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        
        .modal-header {
            margin-bottom: 20px;
        }
        
        .modal-header h3 {
            margin: 0;
            color: #333;
        }
        
        .modal-body {
            margin-bottom: 20px;
        }
        
        .modal-footer {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        
        .btn-confirm {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-confirm:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-card">
            <div class="admin-header">
                <h2><i class="fa-solid fa-key"></i> Admin Password Reset</h2>
                <p style="color: #666; margin-top: 5px;">Search and reset user passwords (No limit)</p>
            </div>
            
            <div id="messageBox" class="form-message" style="display:none;"></div>
            
            <div class="user-search">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="🔍 Search by email, name, or ID..."
                >
            </div>
            
            <div id="usersTableContainer">
                <table class="users-table" id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <tr>
                            <td colspan="5" class="no-users">
                                <i class="fa-solid fa-circle-notch fa-spin"></i> Loading users...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Reset Password Modal -->
    <div id="resetModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-lock-open"></i> Reset User Password</h3>
            </div>
            <div class="modal-body">
                <p>Reset password for: <strong id="modalUserName"></strong></p>
                <p style="color: #666; font-size: 14px;">
                    <i class="fa-solid fa-info-circle"></i> A new temporary password will be generated and sent to the user's email.
                </p>
                
                <div class="input-group" style="margin-top: 20px;">
                    <input 
                        type="password" 
                        id="newPasswordInput" 
                        placeholder="Enter new password (min 8 characters)" 
                        class="search-input"
                        minlength="8"
                    >
                </div>
                
                <div class="checkbox-group" style="margin-top: 15px;">
                    <input type="checkbox" id="sendEmailCheck" checked>
                    <label for="sendEmailCheck">Send password reset email to user</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal()">Cancel</button>
                <button class="btn-confirm" onclick="confirmReset()">
                    <i class="fa-solid fa-key"></i> Reset Password
                </button>
            </div>
        </div>
    </div>
    
    <script>
        let currentUserId = null;
        let allUsers = [];
        
        // Load all users on page load
        document.addEventListener('DOMContentLoaded', () => {
            loadUsers();
            
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', (e) => {
                filterUsers(e.target.value);
            });
        });
        
        // Load users from database
        async function loadUsers() {
            try {
                const res = await fetch('admin_get_users.php');
                const result = await res.json();
                
                if (result.success) {
                    allUsers = result.users;
                    displayUsers(allUsers);
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error loading users:', error);
                showMessage('Error loading users', 'error');
            }
        }
        
        // Display users in table
        function displayUsers(users) {
            const tbody = document.getElementById('usersTableBody');
            
            if (users.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="no-users">
                            <i class="fa-solid fa-users-slash"></i> No users found
                        </td>
                    </tr>
                `;
                return;
            }
            
            tbody.innerHTML = users.map(user => `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.fullname || 'N/A'}</td>
                    <td>${user.email}</td>
                    <td>
                        <span class="status-badge status-active">Active</span>
                    </td>
                    <td>
                        <button class="btn-reset" onclick="openResetModal(${user.id}, '${user.fullname}', '${user.email}')">
                            <i class="fa-solid fa-key"></i> Reset Password
                        </button>
                    </td>
                </tr>
            `).join('');
        }
        
        // Filter users based on search
        function filterUsers(searchTerm) {
            const filtered = allUsers.filter(user => {
                const term = searchTerm.toLowerCase();
                return (
                    user.id.toString().includes(term) ||
                    user.email.toLowerCase().includes(term) ||
                    (user.fullname && user.fullname.toLowerCase().includes(term))
                );
            });
            
            displayUsers(filtered);
        }
        
        // Open reset modal
        function openResetModal(userId, userName, userEmail) {
            currentUserId = userId;
            document.getElementById('modalUserName').textContent = `${userName} (${userEmail})`;
            document.getElementById('newPasswordInput').value = '';
            document.getElementById('sendEmailCheck').checked = true;
            document.getElementById('resetModal').style.display = 'block';
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('resetModal').style.display = 'none';
            currentUserId = null;
        }
        
        // Confirm password reset
        async function confirmReset() {
            const newPassword = document.getElementById('newPasswordInput').value.trim();
            const sendEmail = document.getElementById('sendEmailCheck').checked;
            
            if (newPassword.length < 8) {
                showMessage('Password must be at least 8 characters long', 'error');
                return;
            }
            
            const confirmBtn = document.querySelector('.btn-confirm');
            const originalText = confirmBtn.innerHTML;
            confirmBtn.disabled = true;
            confirmBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
            
            try {
                const formData = new FormData();
                formData.append('user_id', currentUserId);
                formData.append('new_password', newPassword);
                formData.append('send_email', sendEmail ? '1' : '0');
                
                const res = await fetch('admin_reset_password.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await res.json();
                
                if (result.success) {
                    showMessage(result.message, 'success');
                    closeModal();
                    loadUsers(); // Reload users
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Error resetting password', 'error');
            } finally {
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = originalText;
            }
        }
        
        // Show message
        function showMessage(message, type) {
            const messageBox = document.getElementById('messageBox');
            messageBox.textContent = message;
            messageBox.className = 'form-message ' + type;
            messageBox.style.display = 'block';
            
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 5000);
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('resetModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>