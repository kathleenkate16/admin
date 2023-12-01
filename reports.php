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
    $title = 'Reports';
    $report_page = 'active';
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
                        <h1 class="h2">Reports</h1>
                    </div>

                    <?php if (!empty($booksReport)) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($booksReport as $book) : ?>
                                    <tr>
                                        <td><?= $book['id'] ?></td>
                                        <td><?= $book['title'] ?></td>
                                        <td><?= $book['author'] ?></td>
                                        <td><?= $book['published_date'] ?></td>
                                        <td><?= $book['genre'] ?></td>
                                        <td><?= $book['description'] ?></td>
                                        <td><?= $book['availability'] ? 'Available' : 'Not Available' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No books found in the library.</p>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </main>

    <?php
        require_once('../admin/include/js.php')
    ?>
</body>

</html>
