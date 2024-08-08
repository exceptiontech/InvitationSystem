<div>
    @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
    @if ($showForm == false)
        <div class="container">
            @forelse ($results as $item)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ img_chk_exist($item->profile_photo_path) }}">
                        <div class="card-details">
                            <h3>{{ $item->name }}</h3>
                            <p class="role">Moderators</p>
                            <p class="contact">{{ $item->mobile }}</p>
                            <p class="email">{{ $item->email }}</p>
                        </div>
                        <div class="menu-button" onclick="toggleMenu(this)">
                            <span>&#x22EE;</span>
                            <div class="dropdown-menu">
                                <a wire:click='ViewDetails(false,{{ $item->id }})'>View Moderator</a>
                                <a wire:click="active_edit({{ $item->id }})">Edit Moderator</a>
                                {{--  <a href="#">Edit Password</a>  --}}
                                <a wire:click="takeId({{$item->id}})"  data-toggle="modal" data-target="#myModal2" >Delete Moderator</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse


        </div>
        <button wire:click="active_edit(0)" class="add-moderator">Add new moderator</button>
    @else
        <div class="container">
            <div class="account-wrapper">
                <ul class="account-tabs">
                    <li wire:click='ViewDetails(false)' class="tab  @if ($showForm && !$showFormE) active @endif ">
                        View Details</li>
                    <li wire:click='ViewDetails(true)' class="tab  @if ($showForm && $showFormE) active @endif">Edit
                    </li>
                    <li wire:click='back' class="tab "> back to all</li>
                </ul>
                <div class="account-content">
                    <div class="view-details  @if ($showForm && !$showFormE) active @endif ">
                        @isset($data)
                            <h2>Account Details</h2>
                            <p>Name: {{ $data->name }}</p>
                            <p>Email: {{ $data->email }}</p>
                            <p>Phone Number: {{ $data->mobile }}</p>
                        @endisset

                    </div>
                    <div class="edit-details   @if ($showForm && $showFormE) active @endif ">
                        <h2>Edit Account</h2>


                        {{--  <form>  --}}
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input wire:model="name" type="text" id="name" name="name">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input wire:model="last_name" type="text" id="name" name="name">
                                @error('last_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="name">Job title</label>
                                <input wire:model="job_title" type="text" id="name" name="name">
                                @error('job_title')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model="email" type="email" id="email" name="email">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input wire:model="mobile" type="tel" id="phone" name="phone">
                                @error('mobile')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="date">start date</label>
                                <input wire:model="date" type="date" id="date" name="date">
                                @error('date')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <button wire:click='savemoderator'>Save Changes</button>

                        {{--  </form>  --}}
                    </div>
                </div>
            </div>

        </div>

    @endif
    <!-- resources/views/livewire/delete-moderator.blade.php -->

    <div wire:ignore.self class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Moderator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this moderator?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteModerator" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <style>
        .account-wrapper {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
            /* Adjust width as needed */
        }

        .account-tabs {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            border-bottom: 1px solid #ddd;
        }

        .account-tabs li {
            padding: 10px 15px;
            cursor: pointer;
        }

        .account-tabs li.active {
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            /* Optional styling for active tab */
        }

        .account-content {
            padding: 20px;
        }

        .view-details,
        .edit-details {
            display: none;
            /* Initially hide both sections */
        }

        .view-details.active,
        .edit-details.active {
            display: block;
            /* Show the active section */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: visible;
            width: 300px;
            position: relative;
        }

        .card-header {
            display: flex;
            align-items: center;
            padding: 10px;
            position: relative;
            width: 100%;
        }

        .card-header img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .card-details {
            flex-grow: 1;
        }

        .card-details h3 {
            margin: 0;
            font-size: 18px;
        }

        .card-details p {
            margin: 2px 0;
            color: #666;
            font-size: 14px;
        }

        .menu-button {
            position: relative;
            cursor: pointer;
        }

        .menu-button span {
            font-size: 24px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1;
            width: 200px;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #eee;
        }

        .dropdown-menu a:last-child {
            border-bottom: none;
        }

        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }

        .add-moderator {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .add-moderator:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function toggleMenu(element) {
            const dropdownMenu = element.querySelector('.dropdown-menu');
            const allDropdownMenus = document.querySelectorAll('.dropdown-menu');

            allDropdownMenus.forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.style.display = 'none';
                }
            });

            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        }

        document.addEventListener('click', function(event) {
            const isClickInside = event.target.closest('.menu-button');
            if (!isClickInside) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
</div>
