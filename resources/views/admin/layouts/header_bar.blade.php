<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom_navbar_nav">
        <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse custom_navbar_div" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{get_admin_details_by_key('name')}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Change Password</a>
                <div class="dropdown-divider"></div>
                <a href="{{url('adminpanel/logout')}}" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


<section class="success_error_msg_sec">
        @if(session()->has('success_error_msg'))
            <div class="alert alert-success alert-dismissible show success_error_msg_alert">
                {{ session()->get('success_error_msg') }}
                <a type="button" class="close success_error_msg_alert_close" data-bs-dismiss="alert" aria-label="Close">x</a>
            </div>
        @endif
    </section>      