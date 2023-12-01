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
    $title = 'Staff';
    $staff_page = 'active'; 
    require_once('../admin/include/head.php');
?>

<body>
    <?php require_once('../admin/include/header.admin.php'); ?>

    <main class="container-fluid">
        <div class="row">
            <?php require_once('../admin/include/sidepanel.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Staffs</h1>
                </div>

                <div class="table-responsive overflow-hidden">
                    <div class="row g-1 mb-0 m-0">

                        <div class="button col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0">
                        <a href="addstaff.php" class="btn btn-primary brand-bg-color mb-3">Add Staff</a>
                    <?php
                        require_once '../admin/classes/staff.class.php';
                        require_once '../admin/tools/functions.php';

                        $staff = new Staff();

                        // Fetch staff data (you should modify this to retrieve data from your database)
                        $staffArray = $staff->show();
                        $counter = 1;
                            
                    ?>
                    </div>

                        <!-- Filter Options -->
                        <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                            <select name="staff-role" id="staff-role" class="form-select me-md-2">
                                <option value="">All Roles</option>
                                <option value="Manager">Manager</option>
                                <option value="Staff">Staff</option>
                                <option value="Cashier">Cashier</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0">
                            <select name="staff-status" id="staff-status" class="form-select me-md-2">
                                <option value="">All Status</option>
                                <option value="Active">Active</option>
                                <option value="Deactivated">Deactivated</option>
                            </select>
                        </div>
                        
                    </div>

                    <!-- Staff Table -->
                    <table id="staff" class="table table-bordered table-sm mt-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Staff Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="staffTableBody">
                        <?php
                            if ($staffArray) {
                                foreach ($staffArray as $item) {
                        ?>
                                    <tr>
                                        <td><?= $counter ?></td>
                                        <td><?= $item['firstname'] . ' ' . $item['lastname'] ?></td>
                                        <td><?= $item['role'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['status'] ?></td>
                                        <td class="text-center"><a href="editstaff.php?id=<?= $item['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    </tr>
                        <?php
                                    $counter++;
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                </div>
            </main>
        </div>
    </main>

    <?php require_once('../admin/include/js.php'); ?>
</body>

</html>
