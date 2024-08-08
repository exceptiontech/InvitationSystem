<div>
    {{--  @extends('admin.layouts.app', ['script_editor' => true, 'script_datatables' => true])  --}}

<div class="container2">
    <div class="profile-picture">
        <img src="your-image-url.png" alt="Profile Picture">
    </div>

    <div class="tabs">
        <div class="tab active" data-tab="information">Information</div>
        <div class="tab" data-tab="create">Create</div>
        <div class="tab" data-tab="preview">Preview</div>
    </div>

    <form wire:submit.prevent="submit" class="tab-content @if ($show==1)
    active
    @endif" id="information">
    <div class="row">

        <div class="col-md-4 form-group">
            <label for="eventTitle" class="form-label">Event title</label>
            <input type="text" wire:model="event_title" id="eventTitle" name="eventTitle" class="form-input">
            @error('event_title') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="organization" class="form-label">Organization</label>
            <input type="text" wire:model="organization" id="organization" name="organization" class="form-input">
            @error('organization') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="eventDate" class="form-label">Event date</label>
            <input type="date" wire:model="event_date" id="eventDate" name="eventDate" class="form-input">
            @error('event_date') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="eventTime" class="form-label">Event time</label>
            <input type="time" wire:model="event_time" id="eventTime" name="eventTime" class="form-input">
            @error('event_time') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="eventType" class="form-label">Event type</label>
            <input type="text" wire:model="event_type" id="eventType" name="eventType" class="form-input">
            @error('event_type') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="locationLink" class="form-label">Location link</label>
            <input type="url" wire:model="location_link" id="locationLink" name="locationLink" class="form-input">
            @error('location_link') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="sendDate" class="form-label">Send date</label>
            <input type="date" wire:model="send_date" id="sendDate" name="sendDate" class="form-input">
            @error('send_date') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="sendTime" class="form-label">Send time</label>
            <input type="time" wire:model="send_time" id="sendTime" name="sendTime" class="form-input">
            @error('send_time') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="resendDate" class="form-label">Re-send date</label>
            <input type="date" wire:model="resend_date" id="resendDate" name="resendDate" class="form-input">
            @error('resend_date') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <label for="resendTime" class="form-label">Re-send time</label>
            <input type="time" wire:model="resend_time" id="resendTime" name="resendTime" class="form-input">
            @error('resend_time') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 form-group">
            <div x-data>
                <label for="sendTo" class="form-label">Send to</label>
                <div class="send-to">
                    <div class="tags">
                        @foreach($selectedItems as $id)
                            @php
                                $category = $categories->firstWhere('id', $id);
                            @endphp
                            <div class="tag">
                                {{ $category->name }}
                                <button type="button" wire:click="removeItem({{ $id }})">&times;</button>
                            </div>
                        @endforeach
                    </div>

                    <select id="sendTo" class="form-control" multiple x-on:change="handleSelectChange($event)">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="checkbox-group">
            <label for="scheduleInvitation">Schedule invitation</label>
            <input type="checkbox" wire:model="schedule_invitation" id="scheduleInvitation" name="scheduleInvitation">
            @error('schedule_invitation') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="checkbox-group">
            <label for="sendNow">Send now</label>
            <input type="checkbox" wire:model="send_now" id="sendNow" name="sendNow" checked>
            @error('send_now') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="checkbox-group">
            <label for="sendByEmail">Send by Email</label>
            <input type="checkbox" wire:model="send_by_email" id="sendByEmail" name="sendByEmail">
            @error('send_by_email') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="checkbox-group">
            <label for="sendByWhatsApp">Send by WhatsApp</label>
            <input type="checkbox" wire:model="send_by_whatsapp" id="sendByWhatsApp" name="sendByWhatsApp" checked>
            @error('send_by_whatsapp') <span class=""style="color: red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="form-button">Save</button>
    </div>
    </form>

    <div class="tab-content @if ($show==2)
    active
    @endif" >
        <div class="subject-line">
          <label for="subject">Subject</label>
          <input wire:model="subject" type="text" id="subject" name="subject" placeholder="Enter a subject">
        </div>
        <div class="file-upload">
          <label for="file-upload">Choose a file or drag and drop it here</label>
          <input wire:model="img" type="file" id="file-upload" name="file-upload">
        </div>
        <div class="button-container"> <button type="button">Back</button>
          <button wire:click="creation" type="button">Next</button>
        </div>
      </div>

    <div class="tab-content @if ($show==3)
    active
    @endif" >
        <div class="container2">
            <h1>Saudi Water Exhibition 2023</h1>
            <div class="content-info">
                <div class="content">
                    <h2>Content</h2>
                    <div class="invitation-card">
                        <img src="{{ img_chk_exist(@$invitaion_peview->img) }}" alt="{{ @$invitaion_peview->event_title }}">
                        <div class="dimensions">439 x 415</div>
                    </div>
                </div>
                <div class="information">
                    <h2>Information</h2>
                    @if ($invitaion_peview)
                    <ul>
                        <li><strong>Event Title:</strong> {{ @$invitaion_peview->event_title }}</li>
                        <li><strong>Organization:</strong> {{ @$invitaion_peview->organization }}</li>
                        <li><strong>Date:</strong> {{ @$invitaion_peview->event_date }}</li>
                        <li><strong>Time:</strong> {{ @$invitaion_peview->event_time }}</li>
                        <li><strong>Type of event:</strong> {{ @$invitaion_peview->event_type }}</li>
                        <li class="location"><strong>Location:</strong> <a href="{{ @$invitaion_peview->location_link }}" target="_blank">{{ @$invitaion_peview->location_link }}</a></li>
                        <li><strong>The organizer:</strong> {{ @$invitaion_peview->organizer }}</li>
                        <li><strong>Invitation status:</strong> Sent successfully</li>
                        <li><strong>Creator:</strong> Sent successfully</li>
                        <li><strong>Sending date/time:</strong> {{ @$invitaion_peview->send_date }} ({{ @$invitaion_peview->send_time }})</li>
                        <li><strong>Resend Date:</strong> {{ @$invitaion_peview->resend_date }}</li>
                        <li><strong>Resend Time:</strong> {{ @$invitaion_peview->resend_time }}</li>
                        <li><strong>Send To:</strong> {{ @$invitaion_peview->send_to }}</li>
                        <li><strong>Schedule Invitation:</strong> {{ @$invitaion_peview->schedule_invitation }}</li>
                        {{--  <li><strong>Send Now:</strong> {{ @$invitaion_peview->send_now }}</li>
                        <li><strong>Send By Email:</strong> {{ @$invitaion_peview->send_by_email }}</li>
                        <li><strong>Send By WhatsApp:</strong> {{ @$invitaion_peview->send_by_whatsapp }}</li>  --}}
                        <li><strong>Subject:</strong> {{ @$invitaion_peview->subject }}</li>
                    </ul>

                    <div class="additional-info">
                        <span>WhatsApp</span>
                        <span>462 Invited</span>
                        <a href="{{ url('A_ms_admin/invitations_details/' . @$invitaion_peview->id) }}">
                            <button class="view-invited">View invited list</button>
                        </a>
                    </div>
                    @endif

                </div>
            </div>
            <div class="actions">
                <button class="send">Send</button>
                <button class="edit">Edit</button>
                <button class="draft">Draft</button>
            </div>
        </div>    </div>
</div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container2 {
            width: 100%;
            {{--  max-width: 800px;  --}}
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .tab.active {
            border-bottom: 2px solid #007BFF;
        }

        .tab-content {
            display: none;
            grid-template-columns: repeat(3, 1fr);

        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;

        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .send-to {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .send-to .tag {
            background-color: #007BFF;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .profile-picture {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        h1 {
            text-align: center;
            color: #004165;
        }

        .content-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .content, .information {
            width: 48%;
        }

        .content h2, .information h2 {
            color: #004165;
            margin-bottom: 10px;
        }

        .invitation-card {
            position: relative;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
        }

        .invitation-card img {
            width: 100%;
            display: block;
        }

        .dimensions {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 12px;
        }

        .information ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .information ul li {
            margin-bottom: 10px;
            color: #333;
        }

        .additional-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .additional-info span {
            background-color: #f4f4f4;
            padding: 5px 10px;
            border-radius: 3px;
            color: #004165;
        }

        .view-invited {
            background-color: #004165;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .actions button {
            background-color: #004165;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .actions button:hover {
            background-color: #003351;
        }

        .actions .edit {
            background-color: #006494;
        }

        .actions .edit:hover {
            background-color: #005176;
        }

        .actions .draft {
            background-color: #007b8a;
        }

        .actions .draft:hover {
            background-color: #005f67;
        }

            .tags {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .tag {
                background-color: #e0e0e0;
                border-radius: 0.5rem;
                padding: 0.5rem 1rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .tag button {
                background: none;
                border: none;
                cursor: pointer;
            }

            .form-control {
                width: 100%;
                padding: 0.5rem;
                border: 1px solid #ccc;
                border-radius: 0.25rem;
                margin-top: 1rem;
            }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <script>
        function handleSelectChange(event) {
            this.selectedItems = Array.from(event.target.selectedOptions).map(option => option.value);
        }

        function removeItem(id) {
            this.selectedItems = this.selectedItems.filter(item => item !== id);
        }
    </script>
    <script>
        function handleSelectChange(event) {
            let selectedItem = event.target.value;
            @this.call('addItem', selectedItem);
        }
    </script>

    {{--  <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(item => item.classList.remove('active'));
                    tab.classList.add('active');

                    const target = tab.getAttribute('data-tab');
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        if (content.id === target) {
                            content.classList.add('active');
                        }
                    });
                });
            });
        });
    </script>  --}}

    </div>
