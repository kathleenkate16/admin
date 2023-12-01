<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'employee'){
        header('location: index.php');
    }
    //if the above code is false then html below will be displayed
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Notification';
    $notification_page = 'active';
    require_once('../admin/include/head.php');
?>
<body>
    <?php
        require_once('../admin/include/header.admin.php')
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../admin/include/sidepanel.php')
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Notification</h1>
                    </div>
                    
                    <!-- Notification Component 1 -->
                    <div class="alert alert-info alert-dismissible fade show" role="alert" data-bs-toggle="modal" data-bs-target="#notificationModal1">
                        <strong>Info:</strong> You have a new message.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Notification Component 2 -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-toggle="modal" data-bs-target="#notificationModal2">
                        <strong>Success:</strong> Your settings have been updated.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Notification Component 3 -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" data-bs-toggle="modal" data-bs-target="#notificationModal3">
                        <strong>Warning:</strong> Low storage space.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Notification Component 4 -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-toggle="modal" data-bs-target="#notificationModal4">
                        <strong>Success:</strong> User John Doe has borrowed the book "The Great Gatsby."
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Add your modals here -->
                    <div class="modal fade" id="notificationModal1" tabindex="-1" aria-labelledby="notificationModal1Label" aria-hidden="true">
                        <!-- Your modal content for notification 1 -->
                    </div>

                    <div class="modal fade" id="notificationModal2" tabindex="-1" aria-labelledby="notificationModal2Label" aria-hidden="true">
                        <!-- Your modal content for notification 2 -->
                    </div>

                    <div class="modal fade" id="notificationModal3" tabindex="-1" aria-labelledby="notificationModal3Label" aria-hidden="true">
                        <!-- Your modal content for notification 3 -->
                    </div>

                    <div class="modal fade" id="notificationModal4" tabindex="-1" aria-labelledby="notificationModal4Label" aria-hidden="true">
                        <!-- Your modal content for notification 4 -->
                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../admin/include/js.php')
    ?>
</body>
</html>
