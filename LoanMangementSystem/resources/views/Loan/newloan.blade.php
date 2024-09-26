<x-app-layout>

<div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">    
            <div>
            <div class="py-10"></div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center flex-wrap">
                    
                    <a href="{{ route('Loan') }}"
                            class=" flex items-center  sm:w-auto text-gray-200 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base px-2 py-2.5 sm:px-4 sm:py-3 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] mx-2 text-gray-800 dark:text-white" aria-hidden=?true?
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7" d="M9 1v16M1 9h16" />
                            </svg>CREATE NEW LOAN
                        </a>
                        <a href="{{ route('new-loan') }}" class="dark:bg-blue-500 bg-blue-500 flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-gray-800">
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
                        <a href="{{ route('paid-loan') }}" class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                            </svg>LOAN LIST
                        </a>
                    </div>
                </div>
                        @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                icon: "success",
                                title: "Borrower Approved",
                                text: "{{session('success')}}",

                                });
                            </script>

                        @elseif(session()->has('reject'))
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "Borrower Rejected",
                                text: "{{session('reject')}}",

                                });
                            </script>
                         @elseif(session()->has('error'))
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "Loan Registered is Active",
                                text: "{{session('error')}}",

                                });
                            </script>
                        @elseif(session()->has('delete'))
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "Loan Deleted",
                                text: "{{session('delete')}}",

                                });
                            </script>
                        @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100 ">
                <div >
            <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                <div class="p-6 text-black-900 dark:text-gray-100">
                    {{ __("Loan Application Table") }}
                </div>
                
            </div>
               
                   
                    <!-- /////////////////////// -->

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan No.') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Full Name') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Amount') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Date Loan') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Verified by') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Details') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Status') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        <div class="flex items-center">{{ __('ACTION') }}</div>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody id="Content">
                                
                                @foreach ($loanInfo as $loan)
                                                                    @if ($loan->borrowerinfo->loanstatus == "Waiting For Approval")    
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
                                                                                                                        <span class="text-gray-600 dark:text-gray-400 font-bold">First Balance:</span>
                                                                                                                        <span class="ml-2 text-purple-500 dark:text-purple-300">₱{{ number_format($loan->monthlyPayment, 2) }}</span>
                                                                                                                    </div>
                                                                                                                </td>

                                                                                                                <td class="px-6 py-4 text-blue-500 font-semibold dark:text-blue ">{{ $loan->borrowerinfo->loanstatus }}</td>
                                                                                                                <td class="px-6 py-4">

                                                                                                                @if (auth()->user()->is_admin)
                                                                                                                    <a data-tooltip-target="{{'tooltip-default-' . $loan->lid}}"
                                                                                                                        class="approved text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                                                                                        href="{{route('loan-Approve', ['lno' => $loan->lid]) }}">
                                                                                                                        <svg class="w-[19px] h-[19px] text-white dark:text-white" aria-hidden="true"
                                                                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                                                                                                                        </svg>
                                                                                                                        <div id="{{'tooltip-default-' . $loan->lid}}" role="tooltip"
                                                                                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-green-700">
                                                                                                                            Approve This Loan
                                                                                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                                                                                        </div>
                                                                                                                    </a>
                                                                                                                    <button data-tooltip-target="{{'tooltip-default2-' . $loan->lid}}" data-modal-target="modal-reject-{{ $loan->lid }}" data-modal-toggle="modal-reject-{{ $loan->lid }}"
                                                                                                                        class=" text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-red-700 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700">
                                                                                                                        <svg class="w-[19px] h-[19px] text-gray-200 dark:text-white" aria-hidden="true"
                                                                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                d="M15.992 11.287c-1 .097-1.96.45-2.792 1.029a25.118 25.118 0 0 0-4.454 5.721 1.803 1.803 0 0 1-.655.705 1.742 1.742 0 0 1-1.648.096 1.786 1.786 0 0 1-.604-.457 1.874 1.874 0 0 1-.432-1.439l1.562-4.626m9.023-1.03H19V2.03c0-.273-.106-.535-.294-.728A.99.99 0 0 0 17.997 1h-1.002a.99.99 0 0 0-.71.301 1.042 1.042 0 0 0-.293.728v9.258Zm-8.02 1.03H3.003c-.322 0-.64-.08-.925-.233a2.022 2.022 0 0 1-.716-.645 2.108 2.108 0 0 1-.242-1.883l2.36-7.2C3.769 1.54 3.96 1 5.365 1c2.59 0 5.39 1.06 7.504 1.66" />
                                                                                                                        </svg>
                                                                                                                        <div id="{{'tooltip-default2-' . $loan->lid}}" role="tooltip"
                                                                                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                                                                                                                            Reject This Loan
                                                                                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                                                                                        </div>
                                                                                                                    </button>
                                                                                                                @endif
                                                                                                                        <a data-tooltip-target="{{'tooltip-default-' . $loan->loanNumber}}"
                                                                                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                                                                                            href= "{{route('loan-edit', ['lno' => $loan->lid]) }}">
                                                                                                                            <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                                                                                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                                                                                                <path
                                                                                                                                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                                                                                                <path
                                                                                                                                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                                                                                            </svg>
                                                                                                                            <div id="{{'tooltip-default-' . $loan->loanNumber}}" role="tooltip"
                                                                                                                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                                                                                                                                Edit This Loan
                                                                                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                        <!-- ///////////////////////////// modal for reject -->

                                                                                <!-- ////////////// -->
                                                                                                                        <form data-tooltip-target="{{'tooltip-default1-' . $loan->loanNumber}}"
                                                                                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                                                                                            method="POST" action="{{ route('loan-delete', ['delete' => $loan->lid]) }}"  onsubmit="return submitForm(this);"> 
                                                                                                                            @csrf
                                                                                                                            @method('delete')
                                                                                                                            <button>
                                                                                                                                <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                                                                                                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                        d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                                                                                                </svg>
                                                                                                                                <div id="{{'tooltip-default1-' . $loan->loanNumber}}" role="tooltip"
                                                                                                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-800">
                                                                                                                                    Delete This Loan
                                                                                                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                                                                                                </div>
                                                                                                                            </button>

                                                                                                                            <script>
                                                                                                                            function submitForm(form) {

                                                                                                                                Swal.fire({
                                                                                                                                    title: 'Are you sure you want to delete this Loan Record?',
                                                                                                                                    text: "You won't be able to revert this!",
                                                                                                                                    icon: 'warning',
                                                                                                                                    showCancelButton: true,
                                                                                                                                    confirmButtonColor: '#3085d6',
                                                                                                                                    cancelButtonColor: '#d33',
                                                                                                                                    confirmButtonText: 'Yes, delete it!'
                                                                                                                                }).then((result) => {
                                                                                                                                    if (result.isConfirmed) {

                                                                                                                                        form.submit();




                                                                                                                                    }

                                                                                                                                });
                                                                                                                                return false;
                                                                                                                            }
                                                                                                                        </script>
                                                                                                                        </form>

                                                                                                                        <form method="POST" action="{{route('loan-Reject', ['lno' => $loan->lid]) }}"  onsubmit="return reject(this);">
                                                                                                                            @csrf
                                                                                                                            <div id="modal-reject-{{ $loan->lid }}" tabindex="-1"
                                                                                                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                                                                <div class="relative w-full max-w-4xl max-h-full">
                                                                                                                                    <!-- Modal content -->
                                                                                                                                    <div class="relative bg-gray-50  rounded-lg shadow dark:bg-gray-700">
                                                                                                                                        <!-- Modal header -->
                                                                                                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                                                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                                                                                                                Reject Reason
                                                                                                                                            </h3>
                                                                                                                                            <button type="button"
                                                                                                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                                                                                data-modal-hide="modal-reject-{{ $loan->lid }}">
                                                                                                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                                                                                    viewBox="0 0 14 14">
                                                                                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                                                                </svg>
                                                                                                                                                <span class="sr-only">Close modal</span>
                                                                                                                                            </button>
                                                                                                                                        </div>
                                                                                                                                        <!-- Modal body -->
                                                                                                                                        <div class="p-10 md:p-10 space-y-10 dark:bg-gray-900 shadow-sm sm:rounded-lg mx-auto"
                                                                                                                                            style="margin-left: 5%; margin-right: 5%;">
                                                                                                                                            <div class="grid gap-6 mb-5 md:grid-cols-1 content-center">
                                                                                                                                                <div class="flex flex-col">

                                                                                                                                                    <label for="reason" class="text-start mb-2 text-base font-bold text-rose-400">INPUT
                                                                                                                                                        REASON</label>
                                                                                                                                                    <textarea id="reason" name="reason" rows="4"
                                                                                                                                                        class="font-bold text-start bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                                                                                                                                                        required></textarea>
                                                                                                                                                </div>


                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <!-- Modal footer -->
                                                                                                                                        <div
                                                                                                                                            class="align-content: center flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                                                                            <button data-modal-hide="modal-reject-{{ $loan->lid }}"  type="submit"
                                                                                                                                                class="reject text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Reject</button>
                                                                                                                                            <button data-modal-hide="modal-reject-{{ $loan->lid }}" type="button"
                                                                                                                                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <!-- <script>
                                                                                                                                function reject(form) {

                                                                                                                                    Swal.fire({
                                                                                                                                        title: 'Are you sure you want to Reject this Loan Record?',
                                                                                                                                        icon: 'warning',
                                                                                                                                        showCancelButton: true,
                                                                                                                                        confirmButtonColor: '#3085d6',
                                                                                                                                        cancelButtonColor: '#d33',
                                                                                                                                        confirmButtonText: 'Yes, Reject it!'

                                                                                                                                    }).then((result) => {
                                                                                                                                        if (result.isConfirmed) {

                                                                                                                                            form.submit();




                                                                                                                                        }

                                                                                                                                    });
                                                                                                                                    return false;
                                                                                                                                }
                                                                                                                            </script> -->

                                                                                                                            <script>
                                                                                function reject(form) {
                                                                                    var borrowerFirstName = "{{ $loan->borrowerinfo->borFname }}";
                                                                                    var borrowerLastName = "{{ $loan->borrowerinfo->borLname }}";

                                                                                    Swal.fire({
                                                                                        title: 'Are you sure you want to Reject ' + borrowerFirstName + ' ' + borrowerLastName + '\'s Loan Record?',
                                                                                        icon: 'warning',
                                                                                        showCancelButton: true,
                                                                                        confirmButtonColor: '#3085d6',
                                                                                        cancelButtonColor: '#d33',
                                                                                        confirmButtonText: 'Yes, Reject it!'
                                                                                    }).then((result) => {
                                                                                        if (result.isConfirmed) {
                                                                                            form.submit();
                                                                                        }
                                                                                    });
                                                                                    return false;
                                                                                }
                                                                            </script>
                                                                                                                        </form>


                                                                                                                </td>
                                                                                                            </tr>
                                                                    @endif
                                @endforeach
                            </tbody>

                           
                                        




                                        
                           
                        </table>
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                        
                        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                       
                        <script>
                          new DataTable('#example', {
                              responsive: true
                            });
                          
                        </script>
                       

                        <script>
                            $(document).ready(function () {
                                // value from search parameter
                                var searchValue = new URLSearchParams(window.location.search).get('search');

                                // datatabel search value default
                                $('#example').DataTable().search(searchValue !== null ? searchValue : '').draw();
                            });
                        </script>
                       <script>
                           $('.approved').on('click', function (e) {
                                e.preventDefault();
                                var self = $(this);
                                Swal.fire({
                                    title: "Do you want to APPROVE this Loan?",
                                    showCancelButton: true,
                                    confirmButtonText: "Approve",
                                    cancelButtonText: "Cancel",
                                    confirmButtonColor: '#3085d6', // Custom color for Approve button
                                    cancelButtonColor: '#d33',     // Custom color for Cancel button
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = self.attr('href');  
                                    }
                                });
                            });

                            // $('.reject').on('click', function (e) {
                            //         e.preventDefault();
                            //         var self = $(this);
                            //         Swal.fire({
                            //             title: "Do you want to REJECT this Loan?",
                            //             showCancelButton: true,
                            //             confirmButtonText: "Reject",
                                        
                            //         }).then((result) => {
                            //             if (result.isConfirmed) {
                            //                 location.href = self.attr('href');  
                            //             }
                            //         });

                            //     });
                           
                       </script>
                    </div>

                            

                            
                
            </div>      
        </div>
    </div>
    
            


</x-app-layout>

