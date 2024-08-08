<div class="calendar-container">



    <h2>
        <button wire:click="previousMonth">
            {{--  <h2> السابق</h2>  --}}
            السابق
        </button>
        {{ date('F Y', strtotime($year . '-' . $month . '-01')) }}
        <button wire:click="nextMonth">
            {{--  <h2>التالي</h2>  --}}
            التالي
        </button>
    </h2>

    <table>
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody>
            @php $markedDates = []; @endphp
            @foreach ($calendar as $week)
            <tr>
                @foreach ($week as $day)
                <td class="{{ $day['isCurrentMonth'] ? '' : 'disabled' }}
                           {{ in_array($day['date'], $markedDates) ? 'marked-date' : '' }}
                           {{ $day['date'] == $selectedDate ? 'selected-date' : '' }}">
                    {{ $day['day'] }}
                    @php
                    $dayOfWeek = date('w', strtotime($day['date']));
                    @endphp

                    <!-- Display the price based on the day of the week -->
                    <div class="price {{ $dayOfWeek >= 0 && $dayOfWeek <= 4 ? 'weekday' : 'weekend' }}">
                        {{ $dayOfWeek >= 0 && $dayOfWeek <= 4 ? $price : $price2 }} ريال
                    </div>

                    @php
                    $events = \App\Models\Discount::where('unit_id',$unit_id)->whereDate('from_time', '<=', $day['date']) ->whereDate('to_time',
                        '>=', $day['date'])
                        ->get();
                    @endphp

                    @foreach ($events as $event)
                    @if ($event->type=='increase')
                    <div class="event-bar {{ $event->type }}">
                        <span class="close-btn" wire:click='delete({{ $event->id }} )' >x</span>
                        <p>{{ $event->discount_percent }} ريال </p>
                    </div>
                    @elseif($event->type=='discount')
                    <div class="event-bar {{ $event->type }}">
                        <span class="close-btn" wire:click='delete({{ $event->id }} )' >x</span>
                        <p>{{ $event->discount_percent }} %  </p>
                    </div>
                    @endif

                    @endforeach
                    <br>
                </td>

                @php
                if(in_array($day['date'], $markedDates)){
                    $lastDate = end($markedDates);
                    while($lastDate != $day['date']){
                        $lastDate = date('Y-m-d', strtotime($lastDate . ' +1 day'));
                        if($lastDate != $day['date']){
                            echo "<td wire:click=\"toggleDate('$lastDate')\" class='marked-date'></td>";
                        }
                    }
                }
                @endphp
                @php $markedDates[] = $day['date']; @endphp
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Form for adding a discount -->
    <div class="form-container">
        <h2>إضافة خصم أو زيادة</h2> <!-- Title added here -->
        <form id="discount-form" wire:submit.prevent="submitDiscount">
            <div class="form-row" wire:ignore>
                <div class="form-group">
                    <label for="from-time">من يوم</label>
                    <input wire:model='fromTime' type="text" id="from-time" name="from_time" required>
                    @error('fromTime') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="to-time">إلى يوم</label>
                    <input wire:model='toTime' type="text" id="to-time" name="to_time" required>
                    @error('toTime') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="discount-percent">القيمة</label>
                    <input wire:model='discountPercent' type="number" id="discount-percent" name="discount_percent" required>
                    @error('discountPercent') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="addition-type">نوع الإضافة</label>
                    <select wire:model="type" name="addition_type" required>
                        <option value="">اختر</option>
                        <option value="discount">خصم</option>
                        <option value="increase">زيادة</option>
                    </select>
                    @error('type') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit">إضافة</button>
        </form>
    </div>


    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <style>

        .calendar-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
            border-radius: 50px; /* Adjust the value as needed */
        }


        .calendar-container h2 {
            font-size: 17px;
            text-align: center;
            margin: 10px;
        }

        .calendar-container button {
            margin: 12px;
            background-color: rgb(152, 236, 194);
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 15px -3px rgba(26, 4, 4, 0.842), 0 4px 6px -2px rgba(0, 0, 0, 0.05);

        }

        .calendar-container table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 20px; /* Adjust the value as needed */
        }

        .calendar-container table th,
        .calendar-container table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            height: 100px;
            border-radius: 30px;
        }

        .calendar-container table td.selected-date {
            background-color: #f7eabd;
        }

        .calendar-container table td:not(.disabled):hover {
            cursor: pointer;
            background-color: #f1f1f1;
        }

        .calendar-container table td.disabled {
            color: #ccc;
        }

        .event-bar {
            display: flex;
            align-items: center;
            padding: 2px;
            border-radius: 3px;
            color: white;
            margin-bottom: 10px;
        }

        .event-bar.increase {
            background-color: #2bac2b;
        }

        .event-bar.discount {
            background-color: rgb(255, 146, 57);
        }

        .event-bar.other {
            background-color: black;
        }

        .close-btn {
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            color: #ff2600;
        }

        .form-container {
            margin-top: 20px;
            text-align: left;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            font-size: 14px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .form-row .form-group {
            flex: 1;
            min-width: calc(50% - 10px);
        }

        .form-container input,
        .form-container select,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        .form-container button {
            background-color: rgb(152, 236, 194);
            cursor: pointer;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 15px -3px rgba(26, 4, 4, 0.842), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            font-size: 16px;
        }

        .alert {
            padding: 10px;
            margin-top: 20px;
            border: 1px solid green;
            background-color: #e6ffe6;
            color: green;
            border-radius: 5px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 0 15px;
            }

            .form-row .form-group {
                min-width: 100%;
            }

            .form-container label,
            .form-container input,
            .form-container select,
            .form-container button {
                font-size: 12px;
            }
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .price {
            font-size: 18px;
            padding: 1px;
            border-radius: 9px;
            color: #333;
            background-color: #f0f0f0;
            text-align: center;
            margin-bottom: 10px;
        }

        .price.weekday {
            background-color: #ebebeb;
            color: rgb(81, 64, 119);
        }

        .price.weekend {
            background-color: #b9b9b9;
            color: rgb(60, 37, 73);
        }
        .box {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            margin: 20px auto;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            margin: 10px;
            width: 80%;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        {{--  body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }  --}}
        .flex-container {
            display: flex;
            align-items: center;
            gap: 130px; /* Adjust the gap between elements as needed */
        }
        .flex-item {
            margin-right: 10px; /* Adjust the margin as needed */
        }
        h3 {
            margin: 0 10px 0 0; /* Adjust the margin as needed */
        }
        input, button {
            margin: 0 10px 0 0; /* Adjust the margin as needed */
        }



    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#from-time", {
                enableTime: false,
                dateFormat: "Y-m-d"
            });

            flatpickr("#to-time", {
                enableTime: false,
                dateFormat: "Y-m-d"
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            @this.on('toggleDailyDiscount', function() {
                @this.call('toggleDailyDiscount');
            });
        });
    </script>

</div>
