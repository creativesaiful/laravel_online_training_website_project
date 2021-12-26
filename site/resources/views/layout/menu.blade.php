<nav class="navbar fixed-top nav-before navbar-expand-lg navbar-light bg-light">


    {{-- <a class="navbar-brand" href="#"><img class="nav-logo" src="">Saiful Islam</a> --}}

    <a class="navbar-brand mr-5" href="{{url('/')}}">Logo</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-3 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link nav-font" href="{{url('/')}}">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-font" href="{{url('/course')}}">Courses </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-font" href="{{url('/project')}}">Projects </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-font" href="#contact">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="normal-btn btn" >সাইন ইন</button>
        </form>
    </div>
</nav>
