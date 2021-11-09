<div id="home_content">
    <div class="title_day"><h1>&#10144; Contact Us</h1></div>
    <div class="box_responsible" style="color: #101010;">
        If you have any questions, please contact <span style="color: blue;">info@arsenalottery.com</span>.<br />
        Or you can claim the form below. Please send comments and suggestions.<br />
        <br />
        <hr color="#d0a;" />
        <div id="contact_form">
            <?php
                if(isset($_POST['submit'])){
                    $author = mysqli_real_escape_string($conn, $_POST['author']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
                    $text = mysqli_real_escape_string($conn, $_POST['text']);

                    if(!empty($author) and !empty($email) and !empty($subject) and !empty($text)){
                        $query = mysqli_query($conn, "insert into db_contact (name, email, subject, message) values ('$author', '$email', '$subject', '$text')"); 
                        if($query) {
                            $message = "Thank you!, your message will be send to service agent.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                    else {
                        $message = "Form Cannot Be Empty !";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
            ?>
            <form method="post" name="contact" action="#">
                <br />
                <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" required="required" />
                <br />
                <br />
                <label for="email">Email:</label> <input type="email" class="validate-email required input_field" name="email" id="email" required="required" />
                <br />
                <br />
                <label for="subject">Subject:</label> <input type="text" class="validate-subject required input_field" name="subject" id="subject" required="required" />
                <br />
                <br />
                <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required" required="required"></textarea>
                <br />
                <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
                <input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
            </form>
        </div>
        <div class="cleaner"></div>
    </div>
</div>