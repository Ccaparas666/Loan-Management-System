<x-app-layout>

<div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">    
            <div>
            <div class="py-10"></div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center flex-wrap">
                        <a href="{{ route('Loan') }}" class=" flex items-center sm:w-auto text-gray-200 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"> 
                            <svg class="w-[20px] h-[20px] mx-2 text-gray-800 dark:text-white" aria-hidden=?true? xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 1v16M1 9h16" />
                            </svg>CREATE NEW LOAN 
                        </a>
                        <a href="{{ route('new-loan') }}" class=" flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-gray-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                            </svg>NEW LOAN
                        </a>
                        <a href="{{ route('rejected-loan') }}" class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            REJECTED LOANS
                        </a>
                        <a href="{{ route('approved-loan') }}" class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20"> 
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                            </svg>APPROVED LOANS
                        </a>
                        <a href="{{ route('paid-loan') }}" class="dark:bg-blue-500 bg-blue-500 flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                            </svg>LOAN LIST
                        </a>
                    </div>
                </div>
                @if(session()->has('error'))
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "There is No Record Between The Range Date",
                                text: "{{session('error')}}",

                                });
                            </script>
                            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100 ">
                <form method="POST" action="{{ route('generate-report') }}" id="vedformid">
                @csrf
                <div>
                    <div date-rangepicker class="flex items-center">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="start" id="start" type="text" value="01/01/2024"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="end" id="end" type="text"  value="01/31/2024"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                                
                        </div>


                        <div>
                        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 ms-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Generate Report</button>
                        </div>

                        <!-- Dropdown menu -->
                        
                    </div>

                    
                        



                    

                    
                </div>
                </form>

                <br>
                <div >
            <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                <div class="p-6 text-black-900 dark:text-gray-100">
                    {{ __("lOAN LIST TABLE") }}
                </div>

               
                
            </div>
           
                @csrf
                <!-- /////////////////////// -->

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan No.') }}<a href=""></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Full Name') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Amount') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Date Loan') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Verified by') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Details') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Status') }}<a href="#"></div>
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3 flex justify-center">{{ __('ACTION') }}</th> -->
                                    
                                </tr>
                            </thead>
                            <tbody id="Content">
                                
                                @foreach ($loanInfo as $loan)
                                   
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loan->loanNumber }}</td>
                                        <td class="px-6 py-4">{{$loan->borrowerinfo->borLname}}, {{$loan->borrowerinfo->borFname}} {{$loan->borrowerinfo->borMname}} {{$loan->borrowerinfo->borSuffix}}</td>
                                        <td class="px-6 py-4">₱ {{ number_format($loan->LoanAmount, 2) }}</td>
                                       
                                        <td>{{ \Carbon\Carbon::parse($loan->LoanApplication)->format('M-d-Y') }}</td>
                                        <td class="px-6 py-4">{{$loan->created_by}}</td>
                                        <td class="px-6 py-4">
                                            <div class="mb-2">
                                                <span class="text-gray-600 dark:text-gray-400 font-bold">Interest Rate:</span>
                                                <span class="ml-2 text-blue-500 dark:text-blue-300">{{ number_format($loan->InterestRate, 0) }}%</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-600 dark:text-gray-400 font-bold">Due Balance:</span>
                                                <span class="ml-2 text-purple-500 dark:text-purple-300">₱{{ number_format($loan->monthlyPayment, 2) }}</span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 font-semibold">
                                        @if ($loan->loanstatus == "Waiting For Approval")
    <span class="inline-block p-1 inline-block bg-gray-200 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 border border-blue-500">Waiting For Approval</span>
@elseif ($loan->loanstatus == "Approved")
    <span class="inline-block p-1 bg-green-200 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-500">Approved</span>
@elseif ($loan->loanstatus == "Loan Active")
    <span class="inline-block bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-500">Loan Active</span>
@elseif ($loan->loanstatus == "Rejected")
    <span class="inline-block bg-red-200 p-1 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-500">Rejected</span>
@elseif ($loan->loanstatus == "PAID")
    <span class="text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-500 font-bold">PAID</span>
    @else
    <span class="text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-500 font-bold">Not Registered</span>
@endif

                                        </td>
                                        <!-- <td class="px-6 py-4">
                                        
                                            
                                                <a data-tooltip-target="{{'tooltip-default-'. $loan->lid}}"
                                                    class="approved text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                    href="{{route('loan-Approve', ['lno' => $loan->lid]) }}">
                                                    <svg class="w-[19px] h-[19px] text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                                                    </svg>
                                                    <div id="{{'tooltip-default-'. $loan->lid}}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-green-700">
                                                        Approve This Loan
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </a>
                                                <a data-tooltip-target="{{'tooltip-default2-'. $loan->lid}}"
                                                    class="reject text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-red-700 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                    href="{{route('loan-Reject', ['lno' => $loan->lid]) }}">
                                                    <svg class="w-[19px] h-[19px] text-gray-200 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.992 11.287c-1 .097-1.96.45-2.792 1.029a25.118 25.118 0 0 0-4.454 5.721 1.803 1.803 0 0 1-.655.705 1.742 1.742 0 0 1-1.648.096 1.786 1.786 0 0 1-.604-.457 1.874 1.874 0 0 1-.432-1.439l1.562-4.626m9.023-1.03H19V2.03c0-.273-.106-.535-.294-.728A.99.99 0 0 0 17.997 1h-1.002a.99.99 0 0 0-.71.301 1.042 1.042 0 0 0-.293.728v9.258Zm-8.02 1.03H3.003c-.322 0-.64-.08-.925-.233a2.022 2.022 0 0 1-.716-.645 2.108 2.108 0 0 1-.242-1.883l2.36-7.2C3.769 1.54 3.96 1 5.365 1c2.59 0 5.39 1.06 7.504 1.66" />
                                                    </svg>
                                                    <div id="{{'tooltip-default2-'. $loan->lid}}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                                                        Reject This Loan
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </a>
                                                <a data-tooltip-target="{{'tooltip-default-'. $loan->loanNumber}}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                    href="#">
                                                    <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                        <path
                                                            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                    </svg>
                                                    <div id="{{'tooltip-default-'. $loan->loanNumber}}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                                                        Edit This Loan
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </a>
                                        
                                                <form data-tooltip-target="{{'tooltip-default1-'. $loan->loanNumber}}"
                                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                    method="POST" action="#" onclick="return confirm('Are you sure you want to delete this record?')"> @csrf
                                                    @method('delete')
                                                    <button>
                                                        <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                        </svg>
                                                        <div id="{{'tooltip-default1-'. $loan->loanNumber}}" role="tooltip"
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-800">
                                                            Delete This Loan
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </button>
                                                </form>
                                           
                                        </td> -->
                                    </tr>
                                
                                @endforeach
                            </tbody>

                           
                                        
                                        
                           
                        </table>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                        
                        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                       
                        <script>
                          new DataTable('#example', {
                              responsive: true,
                              order: [[6, 'asc']]
                            });
                          
                        </script>
                       <script>
    $(document).ready(function () {
        $('[date-rangepicker]').on('change', 'input[name="start"], input[name="end"]', function () {
            var startDate = $('input[name="start"]').val();
            var endDate = $('input[name="end"]').val();

            // Make an AJAX request to the PDFController
            $.ajax({
                type: 'GET',
                url: '/generate-report', // Adjust the URL if necessary
                data: { start: startDate, end: endDate },
                success: function (data) {
                    // Handle the response from the controller (e.g., open the PDF)
                    console.log(data);
                    // Optionally, you can open the PDF in a new window or tab
                    window.open('/generate-report', '_blank');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
                       
                    </div>

                

                
            </div>      
        </div>
    </div>
    
            


</x-app-layout>

