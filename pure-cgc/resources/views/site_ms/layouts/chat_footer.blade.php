<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="{{asset('images/chatbot/css/chatbot_style.css')}}" type="text/css" />
<div id="chatbot_module" class="chatbot_module">
    <div class="chatbot_trigger">
        <div class="trigger_on" id="trigger_on">
            <div class="avatar">
                <span class="status"></span>
                <img src="{{asset('images/chatbot/images/avatar.svg')}}" class="avatar_trigger" />
            </div>
            <div class="trigger_message">
                <img src="{{asset('images/chatbot/images/sms.svg')}}" />
                <div class="visible_word">
                    <ul>
                        <li><b>دعني أساعدك</b></li>
                        <li><b>Let me help</b></li>
                        <li><b>دعني أساعدك</b></li>
                        <li><b>Let me help</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="trigger_off" id="trigger_off">
            <i class="fa fa-chevron-down"></i>
        </div>
    </div>

    <img src="{{asset('images/chatbot/images/welcome.gif')}}" class="mullak_avatar" />
    <div class="chatbot_window" id="chatbot_window">
        <div class="step_1">
            <div class="header_step_1">
                <img src="{{asset('images/chatbot/images/avatar.svg')}}" />
                <h4><b>حياك الله</b> ... <b>Welcome you</b></h4>
                <p>المساعد الالكتروني من شركة البعد الفني</p>
                <p>The Chatbot assistant from AD Company</p>
            </div>
            <div class="wrapper_step_1">
                <div class="advArea_step_1">
                    <a href="https://ad.net.sa" target="_blank">
                        <img src="{{asset('site/images/custom-images/ad_logo_svg.svg')}}" class="img_advArea" />
                        <p>عقدٌ من الإنجازات بدأ بإلهام،، وتحقق بنهجٍ مبتكر يواكب الرؤى البعيدة 2030</p>
                    </a>
                </div>
                <button class="start_conversation" rel="ar" type="button">بدأ المحادثة</button>
{{--                <button class="start_conversation" rel="en" type="button">Let's talk</button>--}}
                <a href="#" class="previous_chat" id="previous_chat_ar">الإطلاع على المحادثة السابقة</a>
{{--                <a href="#" class="previous_chat" id="previous_chat_en">See the previous conversation</a>--}}
            </div>
        </div>
        <div class="step_2 chatbot_dialog_window">
            <div class="header_window">
                <div class="avatar">
                    <span class="status"></span>
                    <img src="{{asset('images/chatbot/images/avatar.svg')}}" class="avatar_trigger" />
                </div>
                <div class="avatar_name">
                    <b>المساعد الالكتروني</b>
                    <span>متصل</span>
                </div>


                <div class="shortcut_links">
                    <a href="#" class="minimize_window tooltips">
                        <p class="tooltiptext">تصغير نافذة المحادثة</p>
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="#" class="expand_window tooltips">
                        <p class="tooltiptext">تغيير حجم نافذة المحادثة</p>
                        <span><i class="fa fa-expand"></i></span><span style="display: none;"><i class="fa fa-compress"></i></span>
                    </a>
                    <a href="#" class="remove_session tooltips" rel="en">
                        <p class="tooltiptext">حذف محتوى المحادثة</p>
                        <i class="fa fa-trash"></i>
                    </a>
{{--                    <a href="#" class="change_language tooltips" rel="en">--}}
{{--                        <p class="tooltiptext">تغيير لغة المحادثة</p>--}}
{{--                        <i class="fa fa-globe"></i> <span>En</span>--}}
{{--                    </a>--}}
                </div>

            </div>

            <div class="body_window" id="body_window">


            </div>

            <div class="command_window">
{{--                <div class="record_area">--}}
{{--                    <button id="recordButton" class="recordButton"><img src="{{asset('images/chatbot/images/mic.svg')}}"></button>--}}
{{--                    <button id="stopButton" class="stopButton" style="display: none"><img src="{{asset('images/chatbot/images/stop.svg')}}"> <span>Recording Now</span></button>--}}
{{--                </div>--}}
                <input name="message" id="textMessage" class="command_input" placeholder="اكتب رسالتك..." />
                <button type="submit" id="send_message" class="command_button"><i class="fa fa-paper-plane"></i>
                    <span>
                ارسال
                  </span>
                </button>
            </div>
        </div>
        <div class="step_3 chatbot_dialog_window2" style="display: none">
            <div class="header_window">
                <div class="avatar">
                    <span class="status"></span>
                    <img src="{{asset('images/chatbot/images/avatar.svg')}}" class="avatar_trigger" />
                </div>
                <div class="avatar_name">
                    <b>المساعد الالكتروني</b>
                    <span>متصل</span>
                </div>
                <div class="shortcut_links">
                    <a href="#" class="minimize_window"><i class="fa fa-minus"></i></a>
                    <a href="#" class="expand_window"><span><i class="fa fa-expand"></i></span><span style="display: none;"><i class="fa fa-compress"></i></span></a>
                </div>
            </div>

            <div class="body_window" id="body_window2">


            </div>

            <button class="start_conversation" rel="ar" type="button">بدأ المحادثة</button>
{{--            <button class="start_conversation" rel="en" type="button">Let's talk</button>--}}
        </div>
    </div>
</div>
