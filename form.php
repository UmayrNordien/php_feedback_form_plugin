<!Doctype html>
<html>
    <head>
        <!-- FORM CSS -->
        <link rel="stylesheet" href="form.css">
        <!-- THEME -->
        <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css" />
        <script src="sweetalert2/dist/sweetalert2.min.js"></script>
        <!-- SWEETALERT2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    </head>
    <body>
        <!-- FEEDBACK FORM -->
        <div class="form">
        <form method="post">
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="text" placeholder="Email">
            <input name="message" type="text" placeholder="Message">
            <input name="submit" type="submit" value="Submit">
        </form>
        </div>

        <!-- PHP -->
        <?php
        if(isset($_POST['submit'])){
            $n=$_POST['name'];
            $e=$_POST['email'];
            $m=$_POST['message'];
            if(empty($n) || empty($e) || empty($m)){
                ?>
                
                <!-- SCRIPT -->
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid',
                        text: 'Input Fields Can\'t Be Empty',
                        theme: 'dark',
                    })
                </script>
                <?php
            } else {
                ?>
                <!-- SCRIPT -->
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Feedback Submitted Successfully',
                        theme: 'dark',
                    })
                </script>
                <?php
            }
        }
        ?>
    </body>
</html>