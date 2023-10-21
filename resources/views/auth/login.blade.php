<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center"> <span class="font-weight-bold text-primary">Menu Login Admin</span></h5></div>
            <div class="card-body">

                @error('loginError')
                    <div class="alert alert-danger">
                        <strong>Error</strong>
                        <p>{{$message }}</p>
                    </div>
                @enderror

              <form method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                @error('email')
                <small style='color:red'>{{$message}}</small>
            @enderror
                <br>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password')
                <small style='color:red'>{{$message}}</small>
            @enderror
                <br>
                <div class="form-group">
                    <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                  </div>
                <br>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>