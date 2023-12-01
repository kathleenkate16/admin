<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $dashboard_page ?>" aria-current="page" href="dashboard.php">
                    Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $borrowed_page ?>" href="borrowed.php">
                    Borrowed Books
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $books_page ?>" href="books.php">
                    Books
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$message_page ?>" href="message.php">
                  Message
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$report_page ?>" href="reports.php">
                   Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$notification_page ?>" href="notification.php">
                   Notification
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $staff_page ?>" href="staff.php">
                    Staff
                </a>
            </li>
            
            <hr class="d-lg-none">
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="#">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>