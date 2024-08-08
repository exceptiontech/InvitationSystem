<div class="col-md-3">
  <nav class="navbar navbar-default sidebar" role="navigation" style="background-color:#0011">
      <div class=" navbar-collapse" id="">
          <ul class="nav navbar-nav">
              <li class="hed2"> Profile </li>
              {{-- <li><a href="{{route('members.my_courses',['type'=>1,'title'=>'كورساتى'])}}"><span class="badge"></span>  المواد الملتحق بها</a></li> --}}
              <li><a href="{{route('members.profile')}}">  Update Profile</a></li>
              <li>
              <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </li>
                           
          </ul>
        </div>
    </nav>
</div>