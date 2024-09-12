<div class="deznav">
    <?php
            $select=Auth::user()->user_lang=='ar'? array("id","name_ar as name", "parent_id","page_url","img"):array("id","name", "parent_id","page_url","img");
            use Spatie\Permission\Models\Permission;
            use App\Models\static_page;
            use App\Models\Admin\User;
            //use App\Models\permissions_users_type;
            $user_id=Auth::id();
            $user=User::with('permissions','roles')->find($user_id);
            $pages_p=$user->getPermissionsViaRoles();
            //$pages_p=Permission::select($select)->where(['type'=>'page','parent_id'=>0,'is_active'=>'Y'])->orderBy('ord', 'ASC')->get();

        ?>
    {{-- @dd($pages_p) --}}

    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @foreach ($pages_p as $record_p)


            <li class="{{ request()->url() == url(config('app.url_admin').$record_p->page_url) ? 'mm-active' : '' }}">
                <a href="{{ url(config('app.url_admin').$record_p->page_url) }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-controls-1">{!! $record_p->img !!}</i>
                    <span class="nav-text">{{ $record_p->name }}</span>
                </a>
            </li>

            @endforeach

            {{-- <li class="mm-active"><a href="contacts.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-users"></i>
                    <span class="nav-text">Contacts</span>
                </a>
            </li>


            <li><a href="invitations.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-envelope-open-text"></i>
                    <span class="nav-text">Invitations</span>
                </a>
            </li>


            <li><a href="events.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-calendar-star"></i>
                    <span class="nav-text">Events</span>
                </a>
            </li>

            <li><a href="calendar.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-calendar-alt"></i>
                    <span class="nav-text">Calendar</span>
                </a>
            </li>

            <li><a href="moderators.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-user-circle"></i>
                    <span class="nav-text">Moderators</span>
                </a>
            </li>

            <li><a href="statistics.html" class="ai-icon" aria-expanded="false">
                    <i class="fal fa-chart-line"></i>
                    <span class="nav-text">Statistics</span>
                </a>
            </li> --}}




        </ul>


        <div class="last-btn">
            <a href="{{ url(config('app.url_admin').'invitations') }}"  class="btn btn-primary w-100 new-Invitations"><i
                    class="fal fa-plus-circle"></i>New Invitations</a>
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" title="" class="btn btn-primary w-100"><i
                    class="fal fa-arrow-right-from-bracket"></i>logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>



        </div>



    </div>
</div>
