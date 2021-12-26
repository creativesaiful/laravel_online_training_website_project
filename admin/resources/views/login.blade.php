
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('name')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables-select.min.css')}}">
</head>
<body class="fix-header fix-sidebar">


<div class="container w-50 mt-5">
    <form action="{{url('/onlogin')}}" method="get">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="userEmail" aria-describedby="emailHelp" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" >Password</label>
          <input type="password" class="form-control" name="userPass" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" >
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" class="btn btn-success" value="Login">
      </form>

      <div>
        <h5>Access</h5>
        Email:admin@gmail.com <br>
        pass:123
      </div>

</div>




<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/custom.min-2.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/datatables-select.min.js')}}"></script>

<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

@yield('script')


</body>
</html>
