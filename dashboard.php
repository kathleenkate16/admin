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
    $title = 'Dashboard';
    $dashboard_page = 'active';
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
                <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Overview</h1>
                </div>
                
                <!-- Row 1 - Widgets -->
                <div class="row">
                    <!-- Widget 1 - Total Users -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">1000</p>
                            </div>
                        </div>
                    </div>
    
                    <!-- Widget 2 - Total Books -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Books</h5>
                                <p class="card-text">5000</p>
                            </div>
                        </div>
                    </div>
    
                    <!-- Widget 3 - Total Borrowed -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Borrowed</h5>
                                <p class="card-text">10,000</p>
                            </div>
                        </div>
                    </div>
    
                    <!-- Widget 4 - Recent Borrowed -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Borrowed</h5>
                                <p class="card-text">10 new borrowed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3 - Recent Activity -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Activity</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Book</th>
                                            <th>Borrowed Date</th>
                                            <th>Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>17693494</td>
                                            <td>Maxine Dela Cruz</td>
                                            <td>Book: "The Great Gatsby"</td>
                                            <td>2023-08-18</td>
                                            <td>2023-09-12</td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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