<link rel="stylesheet" href="css/admin_style.css">
<div class="topbar">
    <button id="mobileSidebarActive" class="sidebar-toggle">
            <i class="fas fa-bars"></i>
      </button>
    <h1 id="currentModule" class="currentModule">Dashboard</h1>
<div class="left-menu">
  <!-- Header menu -->
   <div class="heading-menu">
        <!-- This UL will be dynamically populated by JavaScript -->
        <ul id="dynamic-menu">
            <!-- Menu items will be inserted here by buildHeaderMenu() function -->
        </ul>
    </div>
    
  <!-- Notification pannel -->
    <div class="notification">
      <button
        class="notification-icon"
        id="notificationIcon"
        aria-label="Notifications"
      >
        <i class="fa-solid fa-bell"></i>
        <span class="notification-badge" id="notificationBadge">3</span>
      </button>

      <div class="notification-menu" id="notificationMenu">
        <div class="notification-header">
          <h2>
            <i class="fa-solid fa-bell"></i>
            Notifications
          </h2>
          <a href="#" class="mark-all-read" id="markAllRead"
            >Mark all as read</a
          >
          <button id="closePanelBtn" class="hide-sidebar">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <div class="notification-list" id="notificationList">
          <div class="notification-item unread" data-id="1">
            <div class="notification-icon-type success">
              <i class="fa-solid fa-check"></i>
            </div>
            <div class="notification-content">
              <div class="notification-title">Fragrance Production Done</div>
              <div class="notification-message">
                Scheduled fragrance productions is done on time.
              </div>
              <div class="notification-time">2 minutes ago</div>
            </div>
          </div>

          <div class="notification-item unread" data-id="2">
            <div class="notification-icon-type info">
              <i class="fa-solid fa-info"></i>
            </div>
            <div class="notification-content">
              <div class="notification-title">System has updated</div>
              <div class="notification-message">
                Advanced analytics dashboard is now available in your admin
                panel.
              </div>
              <div class="notification-time">1 hour ago</div>
            </div>
          </div>

          <div class="notification-item unread" data-id="3">
            <div class="notification-icon-type warning">
              <i class="fa-solid fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
              <div class="notification-title">Maintain Alert</div>
              <div class="notification-message">
                Scheduled maintenance will occur tomorrow from 2:00 AM to 4:00
                AM EST.
              </div>
              <div class="notification-time">3 hours ago</div>
            </div>
          </div>

          <div class="notification-item" data-id="4">
            <div class="notification-icon-type info">
              <i class="fa-solid fa-user-plus"></i>
            </div>
            <div class="notification-content">
              <div class="notification-title">New user registered</div>
              <div class="notification-message">
                John Smith has joined your organization and requested access
                permissions.
              </div>
              <div class="notification-time">Yesterday</div>
            </div>
          </div>

          <div class="notification-item" data-id="5">
            <div class="notification-icon-type success">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <div class="notification-content">
              <div class="notification-title">Monthly report generated</div>
              <div class="notification-message">
                Your monthly performance report is ready for review.
              </div>
              <div class="notification-time">2 days ago</div>
            </div>
          </div>
        </div>

        <div class="notification-footer">
          <a href="#" class="view-all-link">View all notifications</a>
        </div>
      </div>
    </div>

<!-- Dropdown Menu -->
      <div class="user-dropdown">
        <button class="user-icon" id="userIcon" aria-label="User menu">
          <i class="fa-solid fa-user"></i>
        </button>

        <div class="user-menu" id="userMenu">
          <div class="user-opt-header">
            <h2>
            <i class="fa-solid fa-gear"></i>
            Options
          </h2>
          </div>
          <nav class="user-opt-nav">
            <div class="opt-nav-section">
              <ul>
                <li>
                  <a href="#" class="dropdown-nav-link" data-module="dashboard">
                    <i class="fa-solid fa-user"></i>User Data
                  </a>
                </li>
                <li>
                  <a href="#" class="dropdown-nav-link" data-module="data-management">
                    <i class="fa-solid fa-user-tie"></i>Admin Data
                  </a>
                </li>
                <li>
                  <a href="#" class="dropdown-nav-link" data-module="demand-forecasting">
                    <i class="fa-solid fa-wrench"></i>Settings
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="dropdown-nav-link"
                    data-module="production-planning"
                  >
                    <i class="fa-solid fa-hourglass-start"></i>Coming Soon
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
</div>
    <!-- Overlay for closing dropdown -->
    <div class="dropdown-overlay" id="dropdownOverlay"></div>
    <script src="js/admin_header.js"></script>