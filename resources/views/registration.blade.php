<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CustomAuthentication</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="justify-content:centre, margintop: 20px">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Registration</h4>
                <form action="{{ route('registerUser') }}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-success">{{Session::get('fail')}}</div>cess
                    @endif
                    @csrf
                    <div class="formgroup">
                        <label for="name">Full Name</label>
                        <br>
                        <input type="text" class="formcontrol" placeholder="Enter Name"
                         name="name" value="{{old('name')}}"></input>
                         <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <div class="formgroup" style="margin: top 20px">
                        <label for="email">Email Address</label>
                        <br>
                        <input type="email" class="formcontrol" placeholder="Enter Email" name="email" value=""></input>
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>

                    </div>
                    <div class="formgroup">
                        <label for="password">Password</label>
                        <br>
                        <input type="password" class="formcontrol" placeholder="Enter Password" name="password" value=""></input>
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="formgroup">
                        <label for="password">Prompt</label>
                        <br>
                        <input type="text" class="formcontrol" placeholder="Enter Prompt" name="prompt" value=""></input>
                        <span class="text-danger">@error('prompt'){{$message}} @enderror</span>
                    </div>
                    <br>
                    <input type="submit" value="Register">                    <br>
                    <a href="login">Already have Account! Login here</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>