<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mt-2 mt-lg-0" href="{{url('/')}}">
      <img
        src="https://sisfo.binadarma.ac.id/assets/images/boey33Tnew.png"
        height="25"
        alt="Logo"
        loading="lazy"
      />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/enrol')}}">Enrol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/report')}}">Report</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="nav-link" href="{{url('/survey/session')}}">Session</a></li>
            <li><a class="nav-link" href="{{url('/survey/questions')}}">Questions</a></li>
          </ul>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/enrol')}}">Enrol</a>
        </li> -->
      </ul>
      
      <div class="d-flex align-items-center">      
        <div class="d-flex align-items-center">
          <a href="{{url('/logout')}}" class="btn btn-sm btn-outline-primary">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </div>
  </div>
</nav>