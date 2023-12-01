<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'employee'){
        header('location: ./index.php');
    }
    //if the above code is false then html below will be displayed
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Borrowed';
    $borrowed_page = 'active'; 
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
                    <h1 class="h2">Borrowed Books</h1>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All Borrowed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="current-tab" data-bs-toggle="tab" href="#current" role="tab" aria-controls="current" aria-selected="false">Currently Borrowed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="done-tab" data-bs-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">Done Borrowing</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <h2>All Borrowed Books</h2>
                        <table id="book" class="table table-bordered table-sm mt-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Borrower Name</th>
                                    <th scope="col">Maximum Book</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col">Return Date</th>
                                </tr>
                            </thead>
                            <tbody id="borowedTableBody">
                        <?php
                        
                            if ($borrowedArray) {
                                foreach ($borrowealldArray as $item) {
                        ?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td><?= $item['member_id'] ?></td>
                                <td><?= $item['item_name'] ?></td>
                                <td><?= $item['borrower_name'] ?></td>
                                <td><?= $item['maximum_book'] ?></td>
                                <td><?= $item['borrowed_date'] ?></td>
                                <td><?= $item['return_date'] ?></td>

                            </tr>

                        <?php
                                    $counter++;
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Currently Borrowed Books -->
                    <div class="tab-pane fade" id="current" role="tabpanel" aria-labelledby="current-tab">
                        <h2>Currently Borrowed Books</h2>
                        <table id="book" class="table table-bordered table-sm mt-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Borrower Name</th>
                                    <th scope="col">Maximum Book</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="borowedTableBody">
                        <?php
                        
                            if ($currentlyArray) {
                                foreach ($currentlyArray as $item) {
                        ?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td><?= $item['title'] ?></td>
                                <td><?= $item['author'] ?></td>
                                <td><?= $item['genre'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><?= $item['published_date'] ?></td>
                                <td><?= $item['availability'] ?></td>
                                <td class="text-center">
                                     <button class="btn btn-success btn-sm" onclick="markAsDone(<?= $book['id']; ?>)">Done</button>

                                    
                                </td>
                            </tr>

                        <?php
                                    $counter++;
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Done Borrowing Books -->
                    <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
                        <h2>Done Borrowing Books</h2>
                        <table id="book" class="table table-bordered table-sm mt-0">
                            <thead>
                                <tr>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Borrower Name</th>
                                    <th scope="col">Maximum Book</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="borowedTableBody">
                        <?php
                        
                            if ($doneArray) {
                                foreach ($doneArray as $item) {
                        ?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td><?= $item['title'] ?></td>
                                <td><?= $item['author'] ?></td>
                                <td><?= $item['genre'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><?= $item['published_date'] ?></td>
                                <td><?= $item['availability'] ?></td>
                                <td class="text-center">
                                    <!-- Edit Link -->
                                    <a href="editbooks.php?id=<?= $item['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <!-- Delete Link with Confirmation Prompt -->
                                    <a href="books.php?id=<?= $item['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
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