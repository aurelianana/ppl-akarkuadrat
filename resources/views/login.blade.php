<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Akar Kuadrat API</title>
    {{-- boostrap 5 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
    
</head>
<body>
    {{-- login page to api login and save the token to localstorage --}}
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        {{-- form login --}}
                        <form id="form-login" action="#">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="nim" name="nim" class="form-control" id="nim" aria-describedby="nimHelp" required>
                                <div id="nimHelp" class="form-text">We'll never share your nim with anyone else.</div>
                                @error('nim')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"class="form-control" id="password" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        {{-- end form login --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // login
    $('#form-login').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('api.login') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                // save token to localstorage
                localStorage.setItem('token', data.data.token);
                // redirect to home
                window.location.href = "{{ route('home') }}";
            },
            error: function(xhr, status, error){
                // show error message
                alert(xhr.responseJSON.message);
            }
        });
    });
</script>
</html>