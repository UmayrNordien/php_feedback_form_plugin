<!DOCTYPE html>
<html>
    <head>
        <!-- FORM CSS -->
        <link rel="stylesheet" href="dev.css">
        <!-- BOXICONS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                title: 'Enter your Github username:',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: false,
                confirmButtonText: 'Search <img class="search-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAitJREFUSEu1lc2LjnEUhq8LWWhQlI+SkLDwrWRhiClCrJSPQpFQWBALfwCxoGkIC8pIyh8gK4WQjZESUSTGwmSIfH8cHZ7RfL3vM2Xmt3vefs+5nnOf+z6v9PGxj+tTERARY4F1wHJgRvEhTcBl4KL6sicf1wUQEUOA88CqKgUCuARsVj9VA3UARMQg4A4wFfgKnAbq1adZJCImAHuArcDA4m6t+r0SpDOgEdgAvACWqg+7ezEipgNXgNHAUXVvKSAipgH3gR/AXLUpIkYBJ4GFwE/gBrBNbYmIBcA14BswXn3VHeRfBxHRAOwEjqu7Ckn2AUc6vdgMzCogF4D1wAH1UBngCTAx9VcftF2OiNVAPvcDsshKoFHdFBGLgKvZmZoddTntO/gI5JD7q78qaD8OeAY0q2MiYhjwBmhVh5cB3gODgRo1YaUnImqAD0CLOqIMcK8I1Bz1bmn1v7adB9xOmdS6MsBhYD9wSt3RQ8A5YCPQoO4uA0wCHhV2/GPTapCIqAWuF3cqdt05aGcy/sBzYIn6uMKwZxZBG5lpV7eXBq3wfftV8aUI2TE1k52aZ5e5KrYAA4qiOYNMfQ67sk3b+X4okAFaUUWid8BBYC0wG0g5F6v5e4dTbV2n5zOly4DcPZ+BdNct4IT6tshBBi3XebqwTm1tT/jvP5wCchOYAuQ2mK++boP8N6CYTYYsHTU556Oe7VVAAcnNu0at71WJygLZKxJVg/Q54Dc9Zc4ZJ9NjaAAAAABJRU5ErkJggg=="/>',
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
                    title: `${result.value.login}'s profile pic`,
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
