<?php
include_once 'scripts/token.php';
include_once "scripts/session_check.php";
include 'header.php';
include 'navbar.php';
if (isset($_POST['edit'], $_POST['token'])) {
    if (Token::check($_POST['token'])) {
        require 'scripts/config.php';

        $id = $_POST['ticketid'];
        $stmt = $conn->prepare('SELECT * FROM ticket WHERE ticketid = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $token = Token::generate();
        foreach ($stmt as $ticket) {
            $ticketid = htmlspecialchars($ticket['ticketid']);
            $ticketname = htmlspecialchars($ticket['ticketname']);
            $assigneduser = htmlspecialchars($ticket['assigneduser']);
            $description = htmlspecialchars($ticket['description']);
            $ticket_type = htmlspecialchars($ticket['ticket_type']);
            $priority = htmlspecialchars($ticket['priority']);
            $status = htmlspecialchars($ticket['status']);
            ?>
            <div class="container-fluid">
            <title>Update Tickets</title>
                <div class="row justify-content-center">
                    <div class="col-11 col-md-6">
                        <form method="POST" action="scripts/update.php">
                            <div class="form-group">
                                <label for="ticketname">Ticket Name</label>
                                <input type="text" name="ticketname" class="form-control" id="ticketname" value="<?php echo $ticketname ?>">
                            </div>
                            <div class="form-group">
                                <label for="assigneduser">Assign User</label>
                                <input name="assigneduser" type="text" class="form-control" id="assigneduser" value="<?php echo $assigneduser ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Ticket Description</label>
                                <textarea rows="5" name="description" type="text" class="form-control" id="description"><?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticket_type">Ticket Type</label>
                                <select name="ticket_type" class="form-control" id="ticket_type">
                                    <option><?php echo $ticket_type ?></option>
                                    <option>development</option>
                                    <option>testing</option>
                                    <option>production</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Priority">Priority</label>
                                <select name="priority" class="form-control" id="priority">
                                    <option><?php echo $priority ?></option>
                                    <option>low</option>
                                    <option>medium</option>
                                    <option>high</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Ticket Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option><?php echo $status ?></option>
                                    <option>open</option>
                                    <option>resolved</option>
                                    <option>closed</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">submit</button>
                            <input type="hidden" name="id" value="<?php echo $ticketid ?>">
                            <input type="hidden" name="finder" value="<?php echo $_SESSION['username'] ?>">
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        </form>
                    </div>
                </div>
            </div>
<?php
        }
        include 'footer.php';
    } else {
        exit(header("Location: /SecureSoftwareProject/invalid.php"));
    }
}
?>