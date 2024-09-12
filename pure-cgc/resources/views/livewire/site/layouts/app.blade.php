<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Title -->
    <title>CGC</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="PureSoft">
    <meta name="keywords" content="CGC">
    <meta name="description" content="CGC">
    <meta property="og:title" content="CGC">
    <meta property="og:description" content="CGC">
    <meta property="og:image" content="images/logo.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="CGC">
    <meta name="twitter:description" content="CGC">
    <meta name="twitter:image" content="images/logo.png">
    <meta name="twitter:card" content="images/logo.png">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('admin/images/favicon.png') }}">
    <link rel="stylesheet" href="{{url('admin/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{url('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{url('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">

    <link href="{{url('admin/css/owl.css') }}" rel="stylesheet">
    <link class="main-css" href="{{url('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img src="images/logo.png" alt="logo">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <i class="fa fa-long-arrow-left"></i>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="chat" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);"><svg xmlns="" xmlns:xlink="" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                                x="4" y="11" width="16" height="2" rx="1" />
                                        </g>
                                    </svg></a>
                                <div>
                                    <h6 class="mb-1">Chat List</h6>
                                    <p class="mb-0">Show All</p>
                                </div>
                                <a href="javascript:void(0);"><svg xmlns="" xmlns:xlink="" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                        </g>
                                    </svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                                <ul class="contacts">
                                    <li class="name-first-letter">A</li>
                                    <li class="active dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Ali</span>
                                                <p>Ali is online</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Ahmed</span>
                                                <p>Ahmed left 7 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Anas</span>
                                                <p>Anas is online</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Asmaa</span>
                                                <p>Asmaa left 30 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">B</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Belal</span>
                                                <p>Belal left 50 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Bahy</span>
                                                <p>Bahy is online</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="name-first-letter">D</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Dalia</span>
                                                <p>Dalia is online</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="name-first-letter">J</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Jamal</span>
                                                <p>Jamal left 50 mins ago</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="name-first-letter">O</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Omar</span>
                                                <p>Omar left 30 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="images/pic1.jpg" class="rounded-circle user_img rounded-lg"
                                                    alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Osama</span>
                                                <p>Osama left 30 mins ago</p>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card chat dz-chat-history-box d-none">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);" class="dz-chat-history-back">
                                    <svg xmlns="" xmlns:xlink="" width="18px" height="18px" viewBox="0 0 24 24"
                                        version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) "
                                                x="14" y="7" width="2" height="10" rx="1" />
                                            <path
                                                d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                        </g>
                                    </svg>
                                </a>
                                <div>
                                    <h6 class="mb-1">Chat with Omar</h6>
                                    <p class="mb-0 text-success">Online</p>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                            xmlns="" xmlns:xlink="" width="18px" height="18px" viewBox="0 0 24 24"
                                            version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i>
                                            View profile</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to
                                            close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to
                                            group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Hi, how are you samim?
                                        <span class="msg_time">8:40 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Hi Khalid i am good tnx how about you?
                                        <span class="msg_time_send">8:55 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        I am good too, thank you for your chat template
                                        <span class="msg_time">9:00 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        You are welcome
                                        <span class="msg_time_send">9:05 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        I am looking for your next templates
                                        <span class="msg_time">9:07 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Ok, thank you have a good day
                                        <span class="msg_time_send">9:10 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Bye, see you
                                        <span class="msg_time">9:12 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Hi, how are you samim?
                                        <span class="msg_time">8:40 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Hi Khalid i am good tnx how about you?
                                        <span class="msg_time_send">8:55 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        I am good too, thank you for your chat template
                                        <span class="msg_time">9:00 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        You are welcome
                                        <span class="msg_time_send">9:05 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        I am looking for your next templates
                                        <span class="msg_time">9:07 AM, Today</span>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Ok, thank you have a good day
                                        <span class="msg_time_send">9:10 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="images/pic1.jpg" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Bye, see you
                                        <span class="msg_time">9:12 AM, Today</span>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer type_msg">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fa fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <div class="input-group search-area">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i
                                                class="fal fa-search"></i></a></span>
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <span class="input-group-text"><i class="flaticon-controls-5"></i></span>
                                </div>
                            </li>


                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <i class="fal fa-bell"></i>
                                    <div class="pulse-css">4</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-2">
                                        <ul class="timeline">

                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img class="rounded-lg" src="images/pic1.jpg">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-0">Omar ahmed accepted your invite for Exhibition
                                                            event</h6>
                                                        <a href="#" class="mark-read">Mark As Read</a>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img class="rounded-lg" src="images/pic1.jpg">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-0">Omar ahmed accepted your invite for Exhibition
                                                            event</h6>
                                                        <a href="#" class="mark-read">Mark As Read</a>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img class="rounded-lg" src="images/pic1.jpg">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-0">Omar ahmed accepted your invite for Exhibition
                                                            event</h6>
                                                        <a href="#" class="mark-read">Mark As Read</a>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img class="rounded-lg" src="images/pic1.jpg">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-0">Omar ahmed accepted your invite for Exhibition
                                                            event</h6>
                                                        <a href="#" class="mark-read">Mark As Read</a>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link " href="javascript:void(0);">
                                    <i class="fal fa-message-dots"></i> </a>
                            </li>


                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                    <i id="icon-light" class="fal fa-sun-bright"></i>
                                    <i id="icon-dark" class="fal fa-moon"></i>
                                </a>
                            </li>


                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="images/pic1.jpg" width="20" alt="">
                                    <div class="header-info">
                                        <span class="text-black">Yasser</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="profilemoderators.html" class="dropdown-item ai-icon">
<i class="fal fa-user-circle text-primary"></i>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="editmoderators.html" class="dropdown-item ai-icon">
<i class="fal fa-gear text-primary"></i>	
                                        <span class="ms-2">Settings </span>
                                    </a>
                                    <a href="login.html" class="dropdown-item ai-icon">
<i class="fal fa-arrow-right-from-bracket text-primary"></i>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">


                    <li><a href="index.html" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-controls-1"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li><a href="contacts.html" class="ai-icon" aria-expanded="false">
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

                    <li class="mm-active"> <a href="moderators.html" class="ai-icon" aria-expanded="false">
                            <i class="fal fa-user-circle"></i>
                            <span class="nav-text">Moderators</span>
                        </a>
                    </li>

                    <li><a href="statistics.html" class="ai-icon" aria-expanded="false">
                            <i class="fal fa-chart-line"></i>
                            <span class="nav-text">Statistics</span>
                        </a>
                    </li>




                </ul>


                <div class="last-btn">
                    <a href="newinvitaion.html" title="#" class="btn btn-primary w-100 new-Invitations"><i
                            class="fal fa-plus-circle"></i>New Invitations</a>
                    <a href="login.html" title="" class="btn btn-primary w-100"><i
                            class="fal fa-arrow-right-from-bracket"></i>logout</a>

                </div>



            </div>
        </div>



        <!-- Add Group modal -->
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-confirm">



                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box text-danger">
                            <i class="fal fa-trash"></i>
                        </div>

                        <h4 class="modal-title w-100">Delete Moderator</h4>


                        <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fal fa-times"></i></button>

                    </div>


                    <div class="modal-body p-0">


                        <p>Do You Want To Delete Moderator ? You Cant Back From this step</p>


                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary btn-cancel">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>


                    </div>

                </div>
            </div>
        </div>



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body rightside-event">
            <!-- row -->


            <div class="invitations-page">
                <div class="container-fluid">

                    <div class="row">


                        <div class="col-md-8 m-auto">
                            <div class="row">


                                <div class="col-md-6 col-12 mt-0">
                                    <div class="card contact-card ">
                                        <div class="card-body">
                                            <div class="text-center">


                                                <div class="dropdown">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                            </g>
                                                        </svg> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="profilemoderators.html"><i
                                                                class="fal fa-user"></i> View moderators</a>
                                                        <a class="dropdown-item" href="editmoderators.html"><i
                                                                class="fal fa-edit"></i> Edit moderators</a>
                                                        <a class="dropdown-item" href="editpassword.html"><i
                                                                class="fal fa-edit"></i> Edit Password</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-sm"><i
                                                                class="fal fa-trash"></i> Delete moderators</a>
                                                    </div>
                                                </div>

                                                <div class="profile-flx">
                                                    <div class="profile-photo">
                                                        <img src="images/pic1.jpg" class="img-fluid rounded-circle"
                                                            alt="" width="100">
                                                    </div>

                                                    <div>
                                                        <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                        <p class="mb-2">moderators</p>

                                                        <ul>
                                                            <li>+09666298195191</li>
                                                            <li>Omarahmed@mail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-6 col-12 mt-0">
                                    <div class="card contact-card ">
                                        <div class="card-body">
                                            <div class="text-center">


                                                <div class="dropdown">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                            </g>
                                                        </svg> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="profilemoderators.html"><i
                                                                class="fal fa-user"></i> View moderators</a>
                                                        <a class="dropdown-item" href="editmoderators.html"><i
                                                                class="fal fa-edit"></i> Edit moderators</a>
                                                        <a class="dropdown-item" href="editpassword.html"><i
                                                                class="fal fa-edit"></i> Edit Password</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-sm"><i
                                                                class="fal fa-trash"></i> Delete moderators</a>
                                                    </div>
                                                </div>

                                                <div class="profile-flx">
                                                    <div class="profile-photo">
                                                        <img src="images/pic1.jpg" class="img-fluid rounded-circle"
                                                            alt="" width="100">
                                                    </div>

                                                    <div>
                                                        <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                        <p class="mb-2">moderators</p>

                                                        <ul>
                                                            <li>+09666298195191</li>
                                                            <li>Omarahmed@mail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-0">
                                    <div class="card contact-card ">
                                        <div class="card-body">
                                            <div class="text-center">


                                                <div class="dropdown">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                            </g>
                                                        </svg> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="profilemoderators.html"><i
                                                                class="fal fa-user"></i> View moderators</a>
                                                        <a class="dropdown-item" href="editmoderators.html"><i
                                                                class="fal fa-edit"></i> Edit moderators</a>
                                                        <a class="dropdown-item" href="editpassword.html"><i
                                                                class="fal fa-edit"></i> Edit Password</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-sm"><i
                                                                class="fal fa-trash"></i> Delete moderators</a>
                                                    </div>
                                                </div>

                                                <div class="profile-flx">
                                                    <div class="profile-photo">
                                                        <img src="images/pic1.jpg" class="img-fluid rounded-circle"
                                                            alt="" width="100">
                                                    </div>

                                                    <div>
                                                        <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                        <p class="mb-2">moderators</p>

                                                        <ul>
                                                            <li>+09666298195191</li>
                                                            <li>Omarahmed@mail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6 col-12 mt-0">
                                    <div class="card contact-card ">
                                        <div class="card-body">
                                            <div class="text-center">


                                                <div class="dropdown">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                            </g>
                                                        </svg> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="profilemoderators.html"><i
                                                                class="fal fa-user"></i> View moderators</a>
                                                        <a class="dropdown-item" href="editmoderators.html"><i
                                                                class="fal fa-edit"></i> Edit moderators</a>
                                                        <a class="dropdown-item" href="editpassword.html"><i
                                                                class="fal fa-edit"></i> Edit Password</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-sm"><i
                                                                class="fal fa-trash"></i> Delete moderators</a>
                                                    </div>
                                                </div>

                                                <div class="profile-flx">
                                                    <div class="profile-photo">
                                                        <img src="images/pic1.jpg" class="img-fluid rounded-circle"
                                                            alt="" width="100">
                                                    </div>

                                                    <div>
                                                        <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                        <p class="mb-2">moderators</p>

                                                        <ul>
                                                            <li>+09666298195191</li>
                                                            <li>Omarahmed@mail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->





        <!-- modal box strat -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Event Title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Event Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="The Story Of Danau Toba">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="{{url('admin/vendor/global/global.min.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{url('admin/vendor/chart-js/chart.bundle.min.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{url('admin/vendor/apexchart/apexchart.js')}}"></script>



    <script src="{{url('admin/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{url('admin/js/custom.min.js')}}"></script>
    <script src="{{url('admin/js/deznav-init.js')}}"></script>
    <script src="{{url('admin/js/demo.js')}}"></script>



</body>

</html>
