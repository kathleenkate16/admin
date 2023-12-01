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
    $title = 'Books';
    $books_page = 'active'; 
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
                    <h1 class="h2">Book Management</h1>
                </div>
                <a href="addbooks.php" class="btn btn-primary brand-bg-color">Add Book</a>
                    <div id="table-container">
                    <?php
                        require_once '../admin/classes/books.class.php';
                        require_once '../admin/tools/functions.php';

                        $book = new Books();
 
                        // Fetch staff data (you should modify this to retrieve data from your database)
                        $bookArray = $book->show();
                        $counter = 1;
                            
                    ?>
                        <table id="book" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bookTableBody">
                        <?php
                            if ($bookArray) {
                                foreach ($bookArray as $item) {
                        ?>
                                    <tr>
                                        <td><?= $counter ?></td>
                                        <td><?= $item['title'] ?></td>
                                        <td><?= $item['author'] ?></td>
                                        <td><?= $item['publisher'] ?></td>
                                        <td><?= $item['genre'] ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td><?= $item['availability'] ?></td>
                                        <td><?= $item['image'] ?></td>
                                        <td class="text-center"><a href="editbooks.php?id=<?= $item['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
        </div>
    </main>
    <?php
        require_once('../admin/include/js.php')
    ?>
</body>
</html>