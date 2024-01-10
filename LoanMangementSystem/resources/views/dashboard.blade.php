<x-app-layout>
    <div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
           
           
       
        <div class="p-6 ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-10">
                <!-- //////////// -->
                <div class="shadow-2xl  shadow-inner shadow-blue-500/100 bg-white rounded-md p-6 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-show relative">
    <div class="relative top-0 left-0 bg-blue-500 h-24 w-24 -mt-12 mx-7 mb-20 flex items-center justify-center shadow-sm sm:rounded-lg">
        <svg class="w-12 h-12 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
        </svg>
    </div>
    <div class="absolute top-0 right-0 text-right pr-6 pt-4">
        <div class="text-xl font-medium text-gray-500 dark:text-gray-400">Accounts</div>
        <div class="text-4xl font-semibold text-gray-900 dark:text-gray-100 mt-2">{{$AccountCount}}</div>
    </div>
    <div class="border-t border-blue-500/100 flex items-center justify-between mt-6 text-gray-500 dark:text-gray-400">
        <div class="flex items-center mt-2">
            <a href="{{ route('officer') }}"
                class="flex text-gray-50 items-center bg-blue-500 hover:bg-gray-600 rounded-md p-2">
                <svg class="w-5 h-5 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                </svg>
                <span class="ml-2 font-semibold">SHOW ALL</span>
            </a>
        </div>
    </div>
</div>

                <div class="shadow-2xl  shadow-inner shadow-cyan-500/100 bg-white rounded-md p-6 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-show relative">
                
                    
                    <div
                        class="relative top-0 left-0 bg-teal-500 h-24 w-24 -mt-12 mx-7 mb-20 flex items-center justify-center shadow-sm sm:rounded-lg">
                        <svg class="w-12 h-12 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </div>
                
                   
                    <div class="absolute top-0 right-0 text-right pr-6 pt-4">
                        <div class="text-xl font-medium text-gray-500 dark:text-gray-400">Borrowers</div>
                        <div class="text-4xl font-semibold text-gray-900 dark:text-gray-100 mt-2">{{$borrowerCount}}</div>
                    </div>
                
              
                
                    <div class="border-t border-cyan-500/100 flex items-center justify-between mt-6 text-gray-500 dark:text-gray-400">
                        <div class="flex items-center mt-2">
                            <a href="{{ route('borrower') }}"
                                class="flex text-gray-50 items-center bg-teal-500 hover:bg-gray-600 rounded-md p-2">
                                <svg class="w-5 h-5 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                </svg>
                                <span class="ml-2 font-semibold">SHOW ALL</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-2xl  shadow-inner shadow-green-500/100 bg-white rounded-md p-6 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-show relative">
                
                    
                <div
                    class="relative top-0 left-0 bg-green-500 h-24 w-24 -mt-12 mx-7 mb-20 flex items-center justify-center shadow-sm sm:rounded-lg">
                    <svg class="w-[40px] h-[40px] text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                
                   
                    <div class="absolute top-0 right-0 text-right pr-6 pt-4">
                        <div class="text-xl font-medium text-gray-500 dark:text-gray-400">Loan Registered</div>
                        <div class="text-4xl font-semibold text-gray-900 dark:text-gray-100 mt-2">{{$LoanCount}}</div>
                    </div>
                
              
                
                    <div class="border-t border-green-500/100 flex items-center justify-between mt-6 text-gray-500 dark:text-gray-400">
                        <div class="flex items-center mt-2">
                            <a href="{{ route('paid-loan') }}"
                                class="flex text-gray-50 items-center bg-green-500 hover:bg-gray-600 rounded-md p-2">
                                <svg class="w-5 h-5 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                </svg>
                                <span class="ml-2 font-semibold">SHOW ALL</span>
                            </a>
                        </div>
                    </div>
                </div>


            


                <!-- ///////////// -->
                
               
            </div>

              <!-- ///////////// -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow dark:bg-gray-800 shadow-md shadow-black/5 p-6 rounded-md">
            
                    <div >
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Loan progress</h5>
                                    <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                        class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                    </svg>
                                    <div data-popover id="chart-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental
                                            </h3>
                                            <p>Report helps navigate cumulative growth of community activities. Ideally, the chart
                                                should have a growing trend, as stagnating chart signifies a significant decrease of
                                                community activity.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                            <p>For each date bucket, the all-time volume of activities is calculated. This means
                                                that activities in period n contain all activities up to period n, plus the
                                                activities generated by your community in period.</p>
                                            <a href="#"
                                                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg></a>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <div class="grid grid-cols-4 gap-3 mb-2">
                            <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-green-100 dark:bg-gray-500 text-green-600 dark:text-green-300 text-sm font-medium flex items-center justify-center mb-1">
                                    {{$activeCount}}
                                </dt>
                                <dd class="text-green-600 dark:text-green-300 text-sm font-medium">Active</dd>
                            </dl>
                            
                            <dl class="bg-green-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                                    {{$newLoanCount}}
                                </dt>
                                <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">New Loan</dd>
                            </dl>
                            
                            <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                                    {{$approvedCount}}
                                </dt>
                                <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Approved</dd>
                            </dl>
                            
                            <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">
                                {{$rejectedCount}}
                                </dt>
                                <dd class="text-red-600 dark:text-red-300 text-sm font-medium">Rejected</dd>
                            </dl>
                            </div>
                            <button data-collapse-toggle="more-details" type="button"
                                class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show
                                more details <svg class="w-2 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average task completion rate:
                                    </dt>
                                    <dd
                                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                        </svg> 57%
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until sprint ends:</dt>
                                    <dd
                                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                        13 days</dd>
                                </dl>
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Next meeting:</dt>
                                    <dd
                                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                        Thursday</dd>
                                </dl>
                            </div>
                        </div>
            
                        <!-- Radial Chart -->
                        <div class="py-6" id="radial-chart"></div>
            
                        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                                <!-- Button -->
                                <div>
    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
            data-dropdown-placement="bottom"
            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
            type="button">
        Last 7 days
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <div id="lastDaysdropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="/dashboard?date_range=yesterday"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
            </li>
            <li>
                <a href="/dashboard?date_range=today"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
            </li>
            <li>
                <a href="/dashboard?date_range=last_7_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
            </li>
            <li>
                <a href="/dashboard?date_range=last_30_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
            </li>
            <li>
                <a href="/dashboard?date_range=last_90_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
            </li>
        </ul>
    </div>
</div>
                                <a href="#"
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Progress report
                                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
            
                    <script>
    window.addEventListener("load", function () {
        const getChartOptions = (chartData) => {
            return {
                series: chartData,
                colors: ["#008000", "#FFA500", "#0000FF", "#FF0000"],
                chart: {
                    height: "380px",
                    width: "100%",
                    type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: '#E5E7EB',
                        },
                        dataLabels: {
                            show: false,
                        },
                        hollow: {
                            margin: 0,
                            size: "32%",
                        }
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -23,
                        bottom: -20,
                    },
                },
                labels: ["Active", "New Loan", "Approved", "Rejected"],
                legend: {
                    show: true,
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function (value) {
                            return value + '%';
                        }
                    }
                }
            };
        };

        const updateChart = (chart, chartData) => {
            chart.updateSeries(chartData);
        };

        const fetchDataAndUpdateChart = (filter) => {
            
            fetchData(filter).then((data) => {
              
                const updatedChartData = data.map(Number);

                
                updateChart(chart, updatedChartData);
            });
        };

        const handleFilterClick = (filter) => {
            fetchDataAndUpdateChart(filter);
        };

        if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
            var chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions([{{$activeCount}}, {{$newLoanCount}}, {{$approvedCount}}, {{$rejectedCount}}]));
            chart.render();

            
            document.getElementById("last7daysFilter").addEventListener("click", () => {
                handleFilterClick("last7days");
            });

         
        }
    });
</script>
            
                </div>
                

            <!-- //////////////////////////// 2 -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                    <div class="flex justify-between mb-4 items-start">
                        <div class=" mb-5 px-5 font-medium text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-left py-2 text-lg font-bold dark:text-white">Transactions</div>
                    </div>
    
                            
            <table id="history" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Borrower Name') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Payment Date') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('ReferenceNumber') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Payment Amount') }}</div>
                                    </th>              
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Remaining Balance') }}</div>
                                    </th>
                                    
                                </tr>
                                
                            </thead>
                            
                            <tbody>
                                @foreach($transactionHistory as $transaction)
                                    <tr>
                                        
                                        <td class="px-6 py-4"> @isset($transaction->borrower)
                                            {{ $transaction->borrower->borLname }}, {{ $transaction->borrower->borFname }} {{ $transaction->borrower->borMname }} {{ $transaction->borrower->borSuffix }}
                                            @else
                                            @endisset</td>
                                        <td class="px-6 py-4">{{ $transaction->PaymentDate }}</td> 
                                        <td class="px-6 py-4">{{ $transaction->ReferenceNumber }}</td>
                                        <td class="px-6 py-4">P {{ number_format($transaction->PaymentAmount, 2) }}</td> 
                                        <td class="px-6 py-4">{{ $transaction->RemainingBalance }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>               
                            
                        </div>
                    
                </div>
                
            </div>
        </div>
   
                  
        </div>      
    </div>
</div>

                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

                <script>
                    new DataTable('#example2', {
                        responsive: true
                    });
                </script>
                <script>
                    new DataTable('#history', {
                        responsive: true,
                        order: [[0, 'desc']]
                    });
                </script>
</x-app-layout>