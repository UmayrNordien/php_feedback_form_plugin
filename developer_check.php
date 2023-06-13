<!DOCTYPE html>
<html>
    <head>
        <!-- FORM CSS -->
        <link rel="stylesheet" href="dev.css">
        <!-- SWEETALERT2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    </head>
    <body>
        <!-- DEVELOPER CHECK BUTTON -->
        <div class="feedback">
        <button id="feedback">Developer Feedback</button>
        </div>
        
        <!-- SCRIPT -->
        <script>
            document.getElementById('feedback').addEventListener('click', function() {
              Swal.fire({
                title: 'Submit your Github username',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                  return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                      if (!response.ok) {
                        throw new Error(response.statusText)
                      }
                      return response.json()
                    })
                    .catch(error => {
                      Swal.showValidationMessage(
                        `Request failed: ${error}`
                      )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading() /* redirect after the initial sweetalert */
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url,
                    imageWidth: 200,
                    imageHeight: 200
                  }).then(() => {
                    window.location.href = "http://localhost/php_feedback_form_plugin/form.php";
                  });
                }
              })
            });
        </script>
    </body>
</html>