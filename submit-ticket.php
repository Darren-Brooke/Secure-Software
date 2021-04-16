<?php
include_once 'scripts/token.php';
include_once "scripts/session_check.php";
include 'header.php';
include 'navbar.php';

?>
<div class="container-fluid">
<title>Submit Tickets</title>
    <!-- Page Content  -->
    <div class="row justify-content-center">
        <div class="col-11 col-md-6">
            <h2>Submit Bug Ticket</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11 col-md-6">
            <form method="POST" action="scripts/submit.php">
                <div class="form-group">
                    <label for="ticketname">Ticket Name</label>
                    <input type="text" name="ticketname" class="form-control" id="ticketname" aria-describedby="ticketname" placeholder="Ticket Name">
                </div>
                <div class="form-group">
                    <label for="assigneduser">Assign User</label>
                    <input name="assigneduser" type="text" class="form-control" id="assigneduser" placeholder="Assign User">
                </div>
                <div class="form-group">
                    <label for="description">Ticket Description</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="ticket_type">Ticket Type</label>
                    <select name="ticket_type" class="form-control" id="ticket_type">
                        <option>development</option>
                        <option>testing</option>
                        <option>production</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Priority">Priority</label>
                    <select name="priority" class="form-control" id="priority">
                        <option>low</option>
                        <option>medium</option>
                        <option>high</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="status">Ticket Status</label>
                    <select name="status" class="form-control" id="status">
                        <option>open</option>
                        <option>resolved</option>
                        <option>closed</option>
                    </select>
                </div> -->
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
                <input type="hidden" name="finder" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="team" value="<?php echo $_SESSION['team'] ?>">
                <input type="hidden" name="status" value="open">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>