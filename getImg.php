<?php
require_once('./admin/classes/books.class.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $books = new Books();
    $book = $books->fetch($id);

    if ($book && isset($book['image'])) {
        // Set appropriate content type header for images
        header('Content-Type: image/jpg');
        
        // Output the image content
        echo $book['image'];
        exit();
    }
}

// If no image found or an error occurred, you can output a default image or handle it as needed
header('Content-Type: image/jpg');
echo file_get_contents('img/jpg'); // Replace with the path to your default image
exit();
?>