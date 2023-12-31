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
            <div class="form-group">
            <div class="form-group-half">
                <!-- <label for="name">Name</label> -->
                <input name="name" type="text" placeholder="Name" id="name">
            </div>
            <div class="form-group-half">
                <!-- <label for="email">Email</label> -->
                <input name="email" type="text" placeholder="Email" id="email">
            </div>
            </div>
            <div class="form-group">
            <!-- <label for="message">Message</label> -->
            <textarea name="message" id="message" placeholder="Message"></textarea>
            </div>
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
                        title: 'Great!',
                        text: 'Aight, looks like your feedback is in the books!',
                        theme: 'dark',
                    })
                </script>
                <?php
            }
        }
        ?>
    </body>
</html>