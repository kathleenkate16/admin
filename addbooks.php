<?php

require_once './classes/books.class.php';
require_once  './tools/functions.php';
    
    if(isset($_POST['save'])){

    $books = new Books();
    //sanitize
    $books->title = htmlentities($_POST['title']);
    $books->author = htmlentities($_POST['author']);
    $books->publisher = htmlentities($_POST['publisher']);
    $books->genre = htmlentities($_POST['genre']);
    $books->description = htmlentities($_POST['description']);
    $books->image = htmlentities($_POST['image']);
    if(isset($_POST['availability'])){
        $books->availability = htmlentities($_POST['availability']);
    }else{
        $books->availability = '';
    } 

    //validate
    if (validate_field($books->title) &&
    validate_field($books->author) &&
    validate_field($books->publisher) &&
    validate_field($books->genre) &&
    validate_field($books->description) &&
    validate_field($books->availability) &&
    validate_field($books->image)) {
        if($books->add()){
            header('location: books.php');
        }else{
            echo 'An error occured while adding in the database.';
        }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Add Book';
    $book_page = 'active';
    require_once('./include/head.php');
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
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Add Book</h2>
                        <a href="../admin/books.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } ?>">
                                <?php
                                    if(isset($_POST['title']) && !validate_field($_POST['title'])){
                                ?>
                                        <p class="text-danger my-1">Title is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" required value="<?php if(isset($_POST['author'])) { echo $_POST['author']; } ?>">
                                <?php
                                    if(isset($_POST['author']) && !validate_field($_POST['author'])){
                                ?>
                                        <p class="text-danger my-1">Author is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" required value="<?php if(isset($_POST['publisher'])) { echo $_POST['publisher']; } ?>">
                                <?php
                                    if(isset($_POST['publisher']) && !validate_field($_POST['publisher'])){
                                ?>
                                        <p class="text-danger my-1">Publisher is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="genre" class="form-label">Genre</label>
                                <select name="genre" id="genre" class="form-select">
                                    <option value="">Select Genre</option>
                                    <option value="Fiction" <?php if(isset($_POST['genre']) && $_POST['genre'] == 'Fiction') { echo 'selected'; } ?>>Fiction</option>
                                    <option value="Non-fiction" <?php if(isset($_POST['genre']) && $_POST['genre'] == 'Non-fiction') { echo 'selected'; } ?>>Non-fiction</option>
                                </select>
                                <?php
                                    if(isset($_POST['genre']) && !validate_field($_POST['genre'])){
                                ?>
                                        <p class="text-danger my-1">Select book genre</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required value="<?php if(isset($_POST['description'])) { echo $_POST['description']; } ?>">
                                <?php
                                    if(isset($_POST['description']) && !validate_field($_POST['description'])){
                                ?>
                                        <p class="text-danger my-1">Description is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required value="<?php if(isset($_POST['image'])) { echo $_POST['image']; } ?>">
                                <?php
                                    if(isset($_POST['image']) && !validate_field($_POST['image'])){
                                ?>
                                        <p class="text-danger my-1">Image is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Availability</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="inStock" name="availability" value="In Stock" <?php if(isset($_POST['availability']) && $_POST['availability'] == 'In Stock') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="inStock">In Stock</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="radio" class="form-check-input" id="outStock" name="availability" value="Out of Stock" <?php if(isset($_POST['availability']) && $_POST['availability'] == 'Out of Stock') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="outStock">Out of Stock</label>
                                    </div>
                                </div>
                                <?php
                                    if((!isset($_POST['availability']) && isset($_POST['save'])) || (isset($_POST['availability']) && !validate_field($_POST['availability']))){
                                ?>
                                        <p class="text-danger my-1">Select availability of the book</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color">Save Book</button>
                        </form>
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