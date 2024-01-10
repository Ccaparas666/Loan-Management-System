<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">
            <div>
                <div class="py-10"></div>
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center flex-wrap">
                        <a href="{{ route('Loan') }}"
                            class=" flex items-center  sm:w-auto text-gray-200 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base px-2 py-2.5 sm:px-4 sm:py-3 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] mx-2 text-gray-800 dark:text-white" aria-hidden=?true?
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7" d="M9 1v16M1 9h16" />
                            </svg>CREATE NEW LOAN
                        </a>
                        <a href="{{ route('new-loan') }}"
                            class=" flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base px-2 py-2.5 sm:px-4 sm:py-3 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-gray-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                            </svg>NEW LOAN
                        </a>
                        <a href="{{ route('rejected-loan') }}"
                            class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base px-2 py-2.5 sm:px-4 sm:py-3 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            REJECTED LOANS
                        </a>
                        <a href="{{ route('approved-loan') }}"
                            class="dark:bg-blue-500 bg-blue-500 flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                            </svg>APPROVED LOANS
                        </a>
                        <a href="{{ route('paid-loan') }}"
                            class=" flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base px-2 py-2.5 sm:px-4 sm:py-3 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                            </svg>LOAN LIST
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black-900 dark:text-gray-100 ">
                        <div>
                            <div
                                class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                                <div class="p-6 text-black-900 dark:text-gray-100">
                                    {{ __("Approved Borrower Table") }}
                                </div>

                            </div>

                            @if (session()->has('Released'))
                            <script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Loan Released",
                                    text: "{{session('Released')}}",

                                });
                            </script>


                            @endif
                            <form method="POST" action="{{ route('borrower-store') }}">
                                @csrf
                                <!-- /////////////////////// -->

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table id="example"
                                        class="display nowrap text-sm text-left text-black-500 dark:text-gray-400"
                                        style="width:100%">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>

                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Loan No.') }}<a href=""></div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Full Name') }}<a href="#">
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Loan Amount') }}<a href="#">
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Approved by') }}<a href="#">
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Approved Date') }}<a href="#">
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Loan Details') }}</div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <div class="flex items-center">{{ __('Status') }}<a href="#"></div>
                                                </th>
                                                <th scope="col" class="px-6 py-3 flex justify-center">{{ __('ACTION') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="Content">

                                            @foreach ($loanInfo as $loan)

                                            @if ($loan->borrowerinfo->loanstatus == "Approved" || $loan->borrowerinfo->loanstatus == "Loan Active")

                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $loan->loanNumber }}</td>
                                                <td class="px-6 py-4">{{$loan->borrowerinfo->borLname}}, {{$loan->borrowerinfo->borFname}}
                                                    {{$loan->borrowerinfo->borMname}} {{$loan->borrowerinfo->borSuffix}}</td>
                                                <td class="px-6 py-4">₱ {{ number_format($loan->LoanAmount, 2) }}</td>
                                                <td class="px-6 py-4">{{$loan->approved_by}}</td>
                                                <td>{{ \Carbon\Carbon::parse($loan->loan_approval_date)->format('M-d-Y') }}</td>
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
                                                @if ($loan->borrowerinfo->loanstatus == "Approved")
                                                <td class="px-6 py-4">{{ $loan->borrowerinfo->loanstatus }} waiting for cash release
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <a data-tooltip-target="{{'tooltip-default-'. $loan->lid}}" data-modal-target="Release-Modal-{{ $loan->lid }}" data-modal-toggle="Release-Modal-{{ $loan->lid }}"
                                                        class="Released text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                        > 
                                                        <svg class="w-[19px] h-[19px] text-gray-200 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                                        </svg>
                                                        <div id="{{'tooltip-default-'. $loan->lid}}" role="tooltip" 
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-green-700">
                                                            For Cash Release
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </a>
                                                    <a data-tooltip-target="{{'tooltip-default1-'. $loan->lid}}" href="{{route('borrower-view', ['brno' => $loan->bno]) }}"
                                                        class="approved text-white bg-blue-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                        href="#">
                                                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 14">
                                                            <g stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2">
                                                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                <path
                                                                    d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                                            </g>
                                                        </svg>
                                                        <div id="{{'tooltip-default1-'. $loan->lid}}" role="tooltip" 
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-blue-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                                                            View Loan Details
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </a>
                                                </td>
                                                @elseif($loan->borrowerinfo->loanstatus == "Loan Active")
                                                <td class="px-6 py-4 text-green-500 font-semibold dark:text-green">
                                                    <h1
                                                        class="inline-block p-1 rounded bg-emerald-200/10 text-emerald-500 font-medium text-[12px] leading-none">
                                                        {{ $loan->borrowerinfo->loanstatus }}</h1>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <a data-tooltip-target="{{'tooltip-default3-'. $loan->lid}}" href="{{route('borrower-view', ['brno' => $loan->bno]) }}"
                                                        class="text-white bg-teal-500/75 hover:bg-teal-700/75 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-teal-400/75 dark:hover:bg-teal-800/75 focus:outline-none dark:focus:ring-teal-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700">
                                                        <svg class="w-[19px] h-[19px] test"
                                                            xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 384 512">
                                                            <style>
                                                                .test {
                                                                    fill: #fffff2
                                                                }
                                                            </style>
                                                            <path
                                                                d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z" />
                                                        </svg>

                                                        <div id="{{'tooltip-default3-'. $loan->lid}}" role="tooltip"
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-teal-700">
                                                            Pay Loan
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </a>
                                                </td>
                                                @elseif($loan->borrowerinfo->loanstatus == "Loan Active")
                                                <td class="px-6 py-4 text-green-500 font-semibold dark:text-green">
                                                    <h1
                                                        class="inline-block p-1 rounded bg-emerald-200/10 text-emerald-500 font-medium text-[12px] leading-none">
                                                        {{ $loan->borrowerinfo->loanstatus }}</h1>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <a data-tooltip-target="{{'tooltip-default3-'. $loan->lid}}" href="{{route('borrower-view', ['brno' => $loan->bno]) }}"
                                                        class="text-white bg-teal-500/75 hover:bg-teal-700/75 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-teal-400/75 dark:hover:bg-teal-800/75 focus:outline-none dark:focus:ring-teal-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700">
                                                        <svg class="w-[19px] h-[19px] test"
                                                            xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 384 512">
                                                            <style>
                                                                .test {
                                                                    fill: #fffff2
                                                                }
                                                            </style>
                                                            <path
                                                                d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z" />
                                                        </svg>

                                                        <div id="{{'tooltip-default3-'. $loan->lid}}" role="tooltip"
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-teal-700">
                                                            Pay Loan
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </a>
                                                </td>
                                                @endif



                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>


                                       


                                    </table>
                                    
                                    <!--  -->


                                </div>




                            </form>
                            @foreach ($loanInfo as $loan)
                                @if ($loan->borrowerinfo->loanstatus == "Approved" || $loan->borrowerinfo->loanstatus == "Loan Active")
                                <form method="POST" action="{{route('loan-Release', ['lno' => $loan->lid]) }}">
                                            @csrf
                                            <div id="Release-Modal-{{ $loan->lid }}" tabindex="-1"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-4xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-gray-50  rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                                Transaction
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="Release-Modal-{{ $loan->lid }}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-10 md:p-10 space-y-10 dark:bg-gray-900 shadow-sm sm:rounded-lg mx-auto" style="margin-left: 5%; margin-right: 5%;">
                                                            <div class="grid gap-6 mb-5 md:grid-cols-1 content-center">
                                                            <div class="flex flex-col">
                                                                <label for="Balance" class="text-center mb-2 text-base font-bold text-rose-400">RELEASE DATE</label>
                                                                <input type="text" id="releaseDate" name="ReleaseDate"
                                                                    class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                                                                    readonly required>
                                                            </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="align-content: center flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                            <button data-modal-hide="Release-Modal" type="submit"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">PAY</button>
                                                            <button data-modal-hide="Release-Modal" type="button"
                                                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                @endif
                            @endforeach
                            

                                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                                    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                                    <script
                                        src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

                                    <script>
                                        $(document).ready(function () {
                                                $('#example').DataTable({
                                                    responsive: true
                                                });
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
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <script>
                                        flatpickr("#releaseDate", {
                                            dateFormat: "M d, Y",
                                            defaultDate: new Date(),
                                        });
                                    </script>
                        </div>
                    </div>
                </div>




</x-app-layout>