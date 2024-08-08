<div>
    <div class="container">
        <div class="header-tab">
            <ul>
                <li wire:click="step(1)" class="tab {{ $step == 1 ? 'active' : '' }}" data-tab="new-contact">New Contact
                </li>
                <li wire:click="step(2)" class="tab {{ $step == 2 ? 'active' : '' }}" data-tab="contacts">Contacts</li>
                <li wire:click="step(3)" class="tab {{ $step == 3 ? 'active' : '' }}" data-tab="groups">Groups</li>

            </ul>
        </div>

        <div class="tab-content {{ $step == 1 ? 'active' : '' }}" id="new-contact">
            {{-- <form class="form" wire:submit.prevent="saveContact"> --}}
                <fieldset class="form-fieldset">
                    <legend class="form-legend">New Contact</legend>

                    <div class="form-group">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="form-input" wire:model="name"
                            required>
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="form-input" wire:model="last_name"
                            required>
                        @error('last_name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" id="phone" name="phone" class="form-input" wire:model="mobile" required>
                        @error('mobile') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" wire:model="email" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="organization" class="form-label">Organization/Company Name</label>
                        <input type="text" id="organization" name="organization" class="form-input"
                            wire:model="organizer" required>
                        @error('organizer') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="group" class="form-label">Add to a Group</label>
                        <select id="group" name="group" class="form-select" wire:model="group_id" required>
                            <option value="">Select Group</option>
                            @forelse ($groups as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @empty

                            @endforelse
                        </select>
                        @error('group_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="form-label"> nationality</label>
                        <select id="nationality" name="nationality" class="form-select" wire:model="nationality_id"
                            required>
                            <option value="">Select nationality</option>
                            @forelse ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @empty

                            @endforelse
                        </select>
                        @error('nationality_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="country" class="form-label"> country</label>
                        <select id="country" name="country" class="form-select" wire:model="country" required>
                            <option value="">Select country</option>
                            @forelse ($collection as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}</option>

                            @empty

                            @endforelse
                            <option value="1">nationality 1</option>
                            <option value="2">nationality 2</option>
                        </select>
                        @error('country') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="country" class="form-label"> country</label>
                        <select id="country" name="country" class="form-select" wire:model="country_id" required>
                            <option value="">Select country</option>
                            @forelse ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @empty

                            @endforelse

                        </select>
                        @error('country_id') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="city" class="form-label"> city</label>
                        <select id="city" name="city" class="form-select" wire:model="city_id" required>
                            <option value="">Select city</option>
                            @if ($cites )

                            @forelse ($cites as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @empty

                            @endforelse
                            @endif

                        </select>
                        @error('city_id') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" id="jobTitle" name="jobTitle" class="form-input" wire:model="job_title"
                            required>
                        @error('job_title') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea id="notes" name="notes" class="form-textarea" wire:model="notes"></textarea>
                    </div>

                    <button wire:click="saveContact" class="form-button">Save Contact</button>
                </fieldset>
                {{--
            </form> --}}
        </div>


        <div class="tab-content {{ $step == 2 ? 'active' : '' }}" id="contacts">
            <header class="header">
                <h1>Contacts</h1>
                <input type="text" id="search" class="search-input" placeholder="Search Contacts">
            </header>

            <div class="content">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            @forelse ($contacts as $item)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="image1.jpg" class="card-img-top" alt="Card image 1">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }} {{ $item->last_name }} </h5>
                                        <a class="card-text">{{ $item->email }}</a>
                                        <a class="card-text">{{ $item->mobile }}</a>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content {{ $step == 3 ? 'active' : '' }}" id="groups">
            <header class="header">
                <h1>Groups</h1>
                <div class="header-right">
                    <input type="text" id="search" class="search-input" placeholder="Search Groups">
                    <button class="btn btn-primary add-group-btn" data-toggle="modal" data-target="#myModal">
                        <span class="icon">+</span> Add New Group
                    </button>
                </div>
            </header>
            <div class="content">
                <div class="container">

                    @if ($show_group_users)
                    <a wire:click="return_to_groups" class="btn btn-primary">back to groups </a>

                    @forelse ($group_users as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="image1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->user->name }} {{ $item->user->last_name }} </h5>
                                <a class="card-text">{{ $item->user->email }}</a>
                                <a class="card-text">{{ $item->user->mobile }}</a>
                            </div>
                        </div>

                    </div>
                    @empty

                    <h3>no members</h3>
                    {{-- <a wire:click="return_to_groups" class="btn btn-primary">back to groups </a> --}}

                    @endforelse
                    @else
                    <div class="row">
                        @forelse ($groups as $item)
                        <div class="col-md-4">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $item->name }}</h5>
                                    <a wire:click="view_members({{ $item->id }})" class="btn btn-primary">View
                                        members</a>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse


                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="myModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            @if(session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                            @endif



                            {{-- <form wire:submit.prevent="saveGroup"> --}}
                                <div class="mb-3">
                                    <label for="groupName" class="form-label">Group Name</label>
                                    <input type="text" class="form-control" id="groupName" wire:model="group_name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                {{--
                            </form> --}}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click='saveGroup' type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header-tab ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            background-color: #f1f1f1;
            margin: 0;
            border-bottom: 1px solid #ccc;
        }

        .header-tab ul li {
            padding: 15px 20px;
            cursor: pointer;
        }

        .header-tab ul li.active {
            background-color: #ccc;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form {
            margin: 20px 0;
        }

        .form-fieldset {
            border: 1px solid #ccc;
            padding: 20px;
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
        }

        .header {
            margin: 20px 0;
        }

        .search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .content {
            margin-top: 20px;
        }

        .contact-list,
        .groups-list {
            list-style: none;
            padding: 0;
        }

        .error {
            color: red;
            font-size: 0.875em;
            margin-top: 0.25em;
        }

        .card-custom {
            /* Add custom styles here to match card design from image */
            border-radius: 10px;
            /* Example for rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Example for shadow */
        }

        .card-custom:hover {
            /* Add hover effects here to change card appearance on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Example for hover shadow */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f4f4f4;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-group-btn {
            display: flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add-group-btn .icon {
            margin-right: 8px;
            font-size: 20px;
        }

        .add-group-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
          tab.addEventListener('click', function() {
            tabs.forEach(item => item.classList.remove('active'));
            tab.classList.add('active');

            const target = tab.getAttribute('data-tab');
            tabContents.forEach(content => {
              content.style.display = content.getAttribute('id') === target ? 'block' : 'none';
            });
          });
        });

        // Set the initial active tab content
        document.querySelector('.tab-content.active').style.display = 'block';
      });

    </script>

</div>
