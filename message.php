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
    $title = 'Message';
    $message_page = 'active';
    require_once('../admin/include/head.php');
?>
<body>
    <?php
        require_once('../admin/include/header.admin.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../admin/include/sidepanel.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Message</h1>
                    </div>

                     <div class="row g-2 mb-2 m-0 justify-content-between">
                         <div class="button col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0">
                     <button class="btn btn-primary brand-bg-color mb-0" type="button" data-bs-toggle="modal" data-bs-target="#addmessageModal">Compose Message</button>
                        </div>
                     <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                            <select name="message" id="message" class="form-select me-md-2">
                                <option value="">All Messages</option>
                                <option value="Manager">Received</option>
                                <option value="Staff">Sent</option>
                            </select>
                        </div>
                    
                        <ul class="list-group">
                        <!-- Notification 1 -->
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>John Doe</h4>
                                    <p>Subject: Regarding Library Hours</p>
                                    <p>Date: 2023-10-15 09:30 AM</p>
                                </div>
                                <div class="col-md-5">
                                    <!-- Add notification content here -->
                                    <p>Dear Admin, I have a question regarding the library's operating hours. Can you please provide more information?</p>
                                </div>
                                <div class="col-md-1">
                                    <!-- Add delete button here -->
                                    <button class="btn btn-danger btn-sm" onclick="deleteNotification(this)">Delete</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Add notice here (e.g., "Sent" or "Received") -->
                                    <p class="notification-notice">Sent</p>
                                </div>
                            </div>
                        </li>

                        <!-- Notification 2 -->
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Jane Smith</h4>
                                    <p>Subject: Book Request</p>
                                    <p>Date: 2023-10-14 03:45 PM</p>
                                </div>
                                <div class="col-md-5">
                                    <!-- Add notification content here -->
                                    <p>Hello, I would like to request the book titled "The Great Gatsby." Is it available in the library?</p>
                                </div>
                                <div class="col-md-1">
                                    <!-- Add delete button here -->
                                    <button class="btn btn-danger btn-sm" onclick="deleteNotification(this)">Delete</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Add notice here (e.g., "Sent" or "Received") -->
                                    <p class="notification-notice">Received</p>
                                </div>
                            </div>
                        </li>
                        <!-- Add more notifications as needed -->
                    </ul>

                    <script>
                        // JavaScript function to handle the deletion
                        function deleteNotification(button) {
                            // Get the parent list item and remove it
                            var listItem = button.closest('.list-group-item');
                            listItem.remove();
                        }
                    </script>



                     <!-- Modal -->
                    <div class="modal fade" id="addmessageModal" tabindex="-1" aria-labelledby="addmessageModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="addmessageModalLabel">Compose a Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="mb-2">
                                <label for="recipient">Recipient:</label>
                                <input type="text" class="form-control" id="recipient" placeholder="Enter recipient's name" required>
                            </div>
                            <div class="mb-2">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="subject" placeholder="Enter message subject" required>
                            </div>
                            <div class="mb-2">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
                            </div>
                        <button type="submit" class="btn btn-primary mt-2 brand-bg-color" id="addmessageButton">Send Message</button>
                    </form>
                </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../admin/include/js.php');
    ?>
</body>
</html>
