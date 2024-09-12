<div>
    <div class="content-body">


        <div class="charts-page">
            <div class="container-fluid">

                <div class="row">


                    <!-- resources/views/livewire/contacts-per-group.blade.php -->
                    <div class="col-md-7 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Number of contacts per group</h4>
                            </div>
                            <div class="card-body">
                                <div class="barChart_1">
                                    <canvas id="barChart_1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('livewire:load', function () {
                            var barChart1 = function() {
                                if (jQuery('#barChart_1').length > 0) {
                                    const barChart_1 = document.getElementById("barChart_1").getContext('2d');

                                    // Get the reference to the existing chart with ID 'barChart_1'
                                    var existingChart = Chart.getChart(barChart_1.canvas.id);

                                    // Check if the chart exists
                                    if (existingChart) {
                                        // Destroy the existing chart
                                        existingChart.destroy();
                                    }

                                    var config = {
                                        type: 'bar',
                                        data: {
                                            defaultFontFamily: 'Poppins',
                                            labels: @json($categories->pluck('name')),
                                            datasets: [{
                                                label: "Number of contacts per group",
                                                data: @json($categories->pluck('users_count')),
                                                borderColor: 'rgba(34, 47, 185, 1)',
                                                borderWidth: "0",
                                                backgroundColor: [
                                                    "rgba(98, 178, 253, 1)",
                                                    "rgba(155, 223, 196, 1)",
                                                    "rgba(249, 155, 171, 1)",
                                                    "rgba(255, 180, 79, 1)",
                                                    "rgba(159, 151, 247, 1)"
                                                ],
                                                barThickness: "60",
                                            }]
                                        },
                                        options: {
                                            plugins: {
                                                legend: false,
                                            },
                                            barPercentage: 0.5,
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    grid: {
                                                        color: '#eee'
                                                    }
                                                },
                                                x: {
                                                    grid: {
                                                        color: '#eee'
                                                    }
                                                }
                                            }
                                        }
                                    };
                                    var barChart = new Chart(barChart_1, config);

                                    var element = document.querySelector('body');
                                    var observer = new MutationObserver(function(mutations) {
                                        mutations.forEach(function(mutation) {
                                            if (mutation.attributeName === "data-theme-version") {
                                                if ($('body').attr('data-theme-version') === "dark") {
                                                    config.options.scales.y.grid.color = '#3d3d4e';
                                                    config.options.scales.x.grid.color = '#3d3d4e';
                                                } else {
                                                    config.options.scales.y.grid.color = '#eee';
                                                    config.options.scales.x.grid.color = '#eee';
                                                }
                                                barChart.update();
                                            }
                                        });
                                    });
                                    observer.observe(element, {
                                        attributes: true
                                    });
                                }
                            };
                            barChart1();
                            window.livewire.on('renderChart', barChart1); // Re-render chart when Livewire component is updated
                        });
                    </script>
                    @endpush



                    <div class="col-md-5 col-12">
                        <div class="card pie_chart">
                            <div class="card-header">
                                <h4 class="card-title">Percentage of events by type</h4>
                            </div>


                            <div class="card-body">
                                <div class="chart-point">
                                    <div class="check-point-area">
                                        <canvas id="pie_chart"></canvas>
                                    </div>
                                    <ul class="chart-point-list">
                                        @foreach($typeLabels as $index => $label)
                                        <li class="te-color-{{ $index + 1 }}"><i class="fa fa-circle me-1"></i> <p>{{ $label }}</p>
                                            <span>{{ $typePercentages[$index] }}%</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- resources/views/livewire/contacts-during-year.blade.php -->
                    <div class="col-md-7 col-12">
                        <div class="card">
                            <div class="card-header d-sm-flex d-block">
                                <h4 class="card-title">Number of contacts during the year</h4>
                            </div>
                            <div class="card-body">
                                <div class="barChart_2">
                                    <canvas id="barChart_2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('livewire:load', function () {
                            var barChart2 = function() {
                                if (jQuery('#barChart_2').length > 0) {
                                    const barChart_2 = document.getElementById("barChart_2").getContext('2d');

                                    // Get the reference to the existing chart with ID 'barChart_2'
                                    var existingChart = Chart.getChart(barChart_2.canvas.id);

                                    // Check if the chart exists
                                    if (existingChart) {
                                        // Destroy the existing chart
                                        existingChart.destroy();
                                    }

                                    var config = {
                                        type: 'bar',
                                        data: {
                                            defaultFontFamily: 'Poppins',
                                            labels: {!! json_encode($monthLabels) !!},
                                            datasets: [{
                                                label: "Number of contacts during the year",
                                                data: {!! json_encode($contactCounts) !!},
                                                borderColor: 'rgba(34, 47, 185, 1)',
                                                borderWidth: "0",
                                                backgroundColor: [
                                                    "rgba(98, 178, 253, 1)",
                                                    "rgba(155, 223, 196, 1)",
                                                    "rgba(249, 155, 171, 1)",
                                                    "rgba(255, 180, 79, 1)",
                                                    "rgba(159, 151, 247, 1)",
                                                    "rgba(123, 104, 238, 1)",
                                                    "rgba(255, 99, 132, 1)",
                                                    "rgba(75, 192, 192, 1)",
                                                    "rgba(153, 102, 255, 1)",
                                                    "rgba(255, 159, 64, 1)",
                                                    "rgba(255, 205, 86, 1)",
                                                    "rgba(54, 162, 235, 1)"
                                                ],
                                                barThickness: "60",
                                            }]
                                        },
                                        options: {
                                            plugins: {
                                                legend: false,
                                            },
                                            barPercentage: 0.5,
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    grid: {
                                                        color: '#eee'
                                                    }
                                                },
                                                x: {
                                                    grid: {
                                                        color: '#eee'
                                                    }
                                                }
                                            }
                                        }
                                    };
                                    var barChart = new Chart(barChart_2, config);

                                    var element = document.querySelector('body');
                                    var observer = new MutationObserver(function(mutations) {
                                        mutations.forEach(function(mutation) {
                                            if (mutation.attributeName === "data-theme-version") {
                                                if ($('body').attr('data-theme-version') === "dark") {
                                                    config.options.scales.y.grid.color = '#3d3d4e';
                                                    config.options.scales.x.grid.color = '#3d3d4e';
                                                } else {
                                                    config.options.scales.y.grid.color = '#eee';
                                                    config.options.scales.x.grid.color = '#eee';
                                                }
                                                barChart.update();
                                            }
                                        });
                                    });
                                    observer.observe(element, {
                                        attributes: true
                                    });
                                }
                            };
                            barChart2();
                            window.livewire.on('renderChart', barChart2); // Re-render chart when Livewire component is updated
                        });
                    </script>
                    @endpush



                    <div class="col-md-5 col-12">
                        <div class="card pie_chart2">
                            <div class="card-header">
                                <h4 class="card-title">Supervisor participation rate</h4>
                            </div>


                            <div class="card-body">
                                <div class="chart-point">
                                    <div class="check-point-area">
                                        <canvas id="pie_chart2"></canvas>
                                    </div>
                                    <ul class="chart-point-list">
                                        <li class="te-color-1"><i class="fa fa-circle te-color-1 me-1"></i> Omar
                                            <span>33%</span></li>
                                        <li class="te-color-2"><i class="fa fa-circle te-color-2 me-1"></i> Khaled
                                            <span>50%</span></li>
                                        <li class="te-color-3"><i class="fa fa-circle te-color-3 me-1"></i> Mustafa
                                            <span>17%</span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-7 col-12">
                        <div class="overflow-hidden card">
                            <div class="p-0 card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>User name</th>
                                                <th>Events number</th>
                                                <th>Confirm number</th>
                                                <th>Reject number</th>
                                                <th>Maybe name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>


                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>


                                            <tr>
                                                <td>Omar Mahmoud</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- resources/views/livewire/event-status.blade.php -->
                    <div class="col-md-5 col-12">
                        <div class="card pie_chart3">
                            <div class="card-header">
                                <h4 class="card-title">Events Status</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-point">
                                    <div class="check-point-area">
                                        <canvas id="pie_chart3"></canvas>
                                    </div>
                                    <ul class="chart-point-list">
                                        @foreach($statusLabels as $index => $label)
                                            <li class="te-color-{{ $index + 1 }}">
                                                <i class="fa fa-circle te-color-{{ $index + 1 }} me-1"></i> {{ ucfirst($label) }}
                                                <span>{{ $statusPercentages[$index] }}%</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('livewire:load', function () {
                            var pieChart3 = function() {
                                if (jQuery('#pie_chart3').length > 0) {
                                    const pie_chart3 = document.getElementById("pie_chart3").getContext('2d');

                                    // Get the reference to the existing chart with ID 'pie_chart3'
                                    var existingChart = Chart.getChart(pie_chart3.canvas.id);

                                    // Check if the chart exists
                                    if (existingChart) {
                                        // Destroy the existing chart
                                        existingChart.destroy();
                                    }

                                    var config = {
                                        type: 'pie',
                                        data: {
                                            labels: {!! json_encode($statusLabels) !!},
                                            datasets: [{
                                                data: {!! json_encode($statusData) !!},
                                                backgroundColor: [
                                                    "#efcb10",
                                                    "#d91313",
                                                    "#1b87d8"
                                                ]
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    display: false
                                                }
                                            }
                                        }
                                    };
                                    var pieChart = new Chart(pie_chart3, config);

                                    var element = document.querySelector('body');
                                    var observer = new MutationObserver(function(mutations) {
                                        mutations.forEach(function(mutation) {
                                            if (mutation.attributeName === "data-theme-version") {
                                                if ($('body').attr('data-theme-version') === "dark") {
                                                    config.options.scales.y.grid.color = '#3d3d4e';
                                                    config.options.scales.x.grid.color = '#3d3d4e';
                                                } else {
                                                    config.options.scales.y.grid.color = '#eee';
                                                    config.options.scales.x.grid.color = '#eee';
                                                }
                                                pieChart.update();
                                            }
                                        });
                                    });
                                    observer.observe(element, {
                                        attributes: true
                                    });
                                }
                            };
                            pieChart3();
                            window.livewire.on('renderChart', pieChart3); // Re-render chart when Livewire component is updated
                        });
                    </script>
                    @endpush



                    <div class="col-md-7 col-12">
                        <div class="overflow-hidden card">
                            <div class="p-0 card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Event name</th>
                                                <th>INV. number</th>
                                                <th>Confirm number</th>
                                                <th>Reject number</th>
                                                <th>Maybe name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>


                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>


                                            <tr>
                                                <td>Saudi Water Exhibition</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                                <td>22</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>








                    {{--  <div class="col-md-5 col-12">
                        <div class="card pie_chart4">
                            <div class="card-header">
                                <h4 class="card-title">Comments</h4>
                            </div>


                            <div class="card-body">
                                <div class="chart-point">
                                    <div class="check-point-area">
                                        <canvas id="pie_chart4"></canvas>
                                    </div>
                                    <ul class="chart-point-list">
                                        <li class="te-color-1"><i class="fa fa-circle te-color-1 me-1"></i> Inquired
                                            <span>33%</span></li>
                                        <li class="te-color-2"><i class="fa fa-circle te-color-2 me-1"></i> Comment
                                            <span>50%</span></li>
                                        <li class="te-color-3"><i class="fa fa-circle te-color-3 me-1"></i> Asking
                                            <span>17%</span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  --}}





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
    {{--  <script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                var ctx = document.getElementById('barChart_1').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($categories->pluck('name')),
                        datasets: [{
                            label: 'Number of Contacts',
                            data: @json($categories->pluck('users_count')),
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </script>  --}}
    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('pie_chart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($typeLabels),
                    datasets: [{
                        label: 'Event Types',
                        data: @json($typeData),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

</div>
