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
            <?php
            require 'scripts/config.php';
            $team = $_SESSION['team'];
            $stmt = $conn->prepare('SELECT * FROM ticket WHERE teamname = :team');
            $stmt->bindParam(':team', $team, PDO::PARAM_STR);
            $stmt->execute();
            $row_count = 1;
            $token = Token::generate();
            foreach ($stmt as $ticket) {
                $ticketid = htmlspecialchars($ticket['ticketid']);
                ?>
                <form method="POST" action="comments.php">
                    <div class="form-group row">
                        <?php
                            echo "<h2>", htmlspecialchars($ticket['ticketname']), "</h2>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Assigned User: </strong>", htmlspecialchars($ticket['assigneduser']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Bug Finder: </strong>", htmlspecialchars($ticket['finder']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Ticket Number: </strong>", htmlspecialchars($ticket['ticketid']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Ticket Priority: </strong>", htmlspecialchars($ticket['priority']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Date Created: </strong>", htmlspecialchars($ticket['datecreated']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Ticket Type: </strong>", htmlspecialchars($ticket['ticket_type']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<p><strong>Description: </strong>", htmlspecialchars($ticket['description']), "</p>";
                            ?>
                    </div>
                    <div class="form-group row">
                        <?php
                            echo "<h4><strong>Ticket Status: </strong>", htmlspecialchars($ticket['status']), "</strong></h4>";
                            ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">View Ticket</button>
                    <input type="hidden" name="ticketid" value="<?php echo htmlspecialchars($ticket['ticketid']) ?>">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                </form><br>
                <?php
                    if ($ticket['assigneduser'] === $_SESSION['username']) {
                        ?>
                    <form method="POST" action="update-ticket.php">
                        <button type="submit" name="edit" class="btn btn-primary">Edit Ticket</button>
                        <input type="hidden" name="ticketid" value="<?php echo htmlspecialchars($ticket['ticketid']) ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                    </form>
                <?php
                    } ?>

                <hr />
            <?php $row_count++;
            } ?>
            <?php
            ?>
        </div>
    </div>
</div>
</div>

<?php
include 'footer.php';
?>