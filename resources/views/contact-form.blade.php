<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" >
                            </div>

                            <!-- Subject -->
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter the subject" >
                            </div>

                            

                            <!-- Message -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button id="submitBtn" type="submit" class="btn btn-success">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
          $("#submitBtn").click(function(e){
            e.preventDefault();

            let name = $("#name").val();
            let email = $("#email").val();
            let subject = $("#subject").val();
            let message = $("#message").val();
            let token = 

            $.ajax({
              type:"POST",
              url:"{{ route('submit') }}",
              data:{
                name:name,
                email:email,
                subject:subject,
                message:message,
                _token:token
              },
              success:function (response){
                alert("form submmited");
                console.log("form submmited");
                
              },
              error: function(xhr, status, error) {
                console.error(xhr.responseText);
                console.log("form not submmited");
              }
            })
          })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
