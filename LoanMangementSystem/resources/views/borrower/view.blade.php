<x-app-layout>
<div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
            <div class="py-12">
                <div>
                    <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                        <div class="p-6 text-black-900 dark:text-gray-100">
                            {{ __("MANAGE BORROWER`S INFORMATION") }}
                        </div>
                    </div>
                </div>
            </div> 
                            @if (session()->has('error'))
                           <script>
                                Swal.fire({
                                icon: "error",
                                title: "Invalid Input",
                                text: "{{session('error')}}",
                                });                               
                            </script>
                            @elseif (session()->has('paySuccess'))
                           <script>
                                Swal.fire({
                                icon: "success",
                                title: "Payment Successful!",
                                text: "{{session('paySuccess')}}",
                                });                               
                            </script>
                            @endif
                           
            @foreach ($borrowerinfo as $borinfo)
            <div class="flex flex-row space-x-4">
                <div class="basis-2/5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                <!-- <div class="flex items-center justify-center mt-4">
                    <div class="w-48 h-48 bg-gray-200 border-2 border-purple-500 rounded-full overflow-hidden flex items-center justify-center ">
                        <img src="{{ asset($borinfo->borPicture) }}" alt="Profile Picture"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                </div> -->

                <div x-data="{ open: false }" class="relative flex items-center justify-center mt-4">
                <div class="w-48 h-48 sm:w-32 sm:h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 bg-gray-200 border-2 border-purple-500 rounded-full overflow-hidden flex items-center justify-center">
        <img x-on:click="open = true" src="{{ asset($borinfo->borPicture) }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full cursor-pointer">
    </div>

    <!-- Modal -->
    <div x-show="open" x-on:click.outside="open = false" class="fixed inset-0 overflow-y-auto z-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-black bg-opacity-75 absolute inset-0"></div>
            <div class="relative p-4 bg-white dark:bg-gray-800 rounded-lg">
                <img src="{{ asset($borinfo->borPicture) }}" alt="Profile Picture" class="w-full h-full object-cover rounded-lg max-w-full max-h-full">
                <button @click="open = false" class="absolute top-0 right-0 p-2 m-4 text-white bg-purple-700 hover:bg-purple-800 rounded-full focus:outline-none focus:ring focus:border-purple-300" style="z-index: 60;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

                <button data-modal-target="large-modal2" data-modal-toggle="large-modal2"
                        data-tooltip-target="{{'tooltip-default-'. $borinfo->lid}}"
                        class="mt-2 absolute top-0 right-0 flex items-center text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                        <svg class="w-5 h-5 text-gray-50 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 12s3-8 10-8 10 8 10 8-3 8-10 8-10-8-10-8z"></path>
                        </svg>
                    
                    
                    
                    </button>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-center ">
                        
                            <label for="Name" class="font-bold block">{{ $borinfo->borFname }} {{ $borinfo->borMname }} {{
                                $borinfo->borLname }} {{ $borinfo->borSuffix }}</label>
                            <label for="Accountnumber" class="block mt-2">Borrower Account <span class="font-bold text-purple-500">{{
                                    $borinfo->borAccount }}</span></label>
                            @if ($loanStatus == "Waiting For Approval")
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-blue-200/10 text-blue-500 p-1">{{ $loanStatus
                                    }}</span></label>
                            @elseif ($loanStatus == "Approved")
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-green-200/10 text-green-500 p-1">{{ $loanStatus
                                    }}</span></label>
                            @elseif ($loanStatus == "Loan Active")
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-emerald-200/10 text-green-500 p-1">{{ $loanStatus
                                    }}</span></label>
                            @elseif ($loanStatus == "Rejected")
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-red-200/10 text-red-500 p-1">{{ $loanStatus
                                    }}</span></label>
                            @elseif ($loanStatus == "PAID")
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-cyan-600/10 text-green-500 p-1 text-2xl">{{ $loanStatus
                                    }}</span></label>        
                            @else
                            <label for="loanStatus" class="block mt-2">Loan Status <span
                                    class="font-bold inline-block rounded bg-gray-300/10 text-yellow-500 p-1">Not Registered</span></label>
                            @endif
            
                        </div>
                        <div>
            
        </div>
                        
                    </div>

                    <div class="grid gap-6 m-4 md:grid-cols-2">
                        <div>
                            <label for="ContactNumber" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-300">Contact Number</label>
                            <input type="text" value="{{ $borinfo->borContact }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required disabled>
                        </div>
                        <div>
                            <label for="EmailAddress" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-300">Email Address</label>
                            <input type="text" value="{{ $borinfo->borEmail }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required disabled>
                        </div>
                        <div>
                            <label for="DateOfBirth" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-300">Date of Birth</label>
                            <input type="date" value="{{ $borinfo->borDob }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required disabled>
                        </div>
                        <div>
                            <label for="Gender" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-300">Gender</label>
                            <input type="text" value="{{ $borinfo->borGender}}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="Address" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-300">Address</label>
                            <input type="text" value="{{ $borinfo->borAddress }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required disabled>
                        </div>
                    </div>


                        <div class="flex justify-center">
                        @if ($loanStatus == "Loan Active")
                            <div class="grid gap-6 m-4 md:grid-cols-2">
                                <a href="{{route('borrower-edit', ['brno' => $borinfo->bno]) }}"
                                    class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                                    </svg>
                                    UPDATE
                                </a>
                                
                                <button data-modal-target="large-modal" data-modal-toggle="large-modal"
                                    class="flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                    <svg class="w-[19px] h-[19px] test" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <style>
                                            .test {
                                                fill: #00ff00
                                            }
                                        </style>
                                        <path
                                            d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z" />
                                    </svg>
                                    Pay Loan
                                        </button>
                                        
                               
                        
                            </div>
                            @elseif ($loanStatus == "Rejected" || $loanStatus == "Waiting For Approval" || $loanStatus == "Approved")
                            <div class="grid gap-6 m-4 md:grid-cols-2">
                                <a href="{{route('borrower-edit', ['brno' => $borinfo->bno]) }}"
                                    class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                                    </svg>
                                    UPDATE
                                </a> 

                                <a href="@if ($loanStatus == 'Rejected'){{ route('rejected-loan', ['search' => $borinfo->loans->last()->loanNumber]) }}
                                           @elseif ($loanStatus == 'Waiting For Approval'){{ route('new-loan', ['search' => $borinfo->loans->last()->loanNumber]) }}
                                           @elseif ($loanStatus == 'Approved'){{ route('approved-loan', ['search' => $borinfo->loans->last()->loanNumber]) }}
                                           @endif"
                                    class="flex items-center text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                    <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                                    </svg>
                                    View Loan
                                </a>
                            </div>
                            @else
                            <div class="grid gap-6 m-4 md:grid-cols-2">
                                <a href="{{route('borrower-edit', ['brno' => $borinfo->bno]) }}"
                                    class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                                    </svg>
                                    UPDATE
                                </a>  
                                
                                <a href="{{ route('Apply-Loan', ['brno' => $borinfo->borAccount]) }}"
                                    class="flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                    <svg class="w-[19px] h-[19px] test" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <style>
                                            .test {
                                                fill: #00ff00;
                                            }
                                        </style>
                                        <path
                                            d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z" />
                                    </svg>
                                    @if ($loanStatus == "PAID")
                                    Re-Apply Loan
                                    @else
                                    Apply Loan
                                    @endif
                                </a>
                            </div>
                            

                            @endif
                        </div>
                    </div>
            
                <div class=" basis-3/5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                        <div class="mb-5 text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-lg font-bold dark:text-white">LOAN LOGS (monthly)</div>

                    <table id="example2" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Number') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Remaining Balance') }}</div>
                                    </th>              
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Due Date') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Loan Details') }}</div>
                                    </th>
                                </tr>
                                
                            </thead>
                            
                            <tbody id="Content">
                                @foreach ($borrowerinfo as $borinfo)
                                    @foreach ($borinfo->loans as $loan)
                                        @foreach ($loan->payments as $payment)
                                        <tr>
                                            <td class="px-6 py-4">{{$loan->loanNumber}}</td>
                                            <td class="px-6 py-4">₱ {{$payment->Remaining_Balance}}</td>
                                            <td class="px-6 py-4"> {{$payment->due_date}}</td>
                                            <td class="px-6 py-4">
                                                <div>
                                                    <span class="text-gray-400 font-bold">Interest Rate:</span>
                                                    <span class="ml-2 text-blue-500">{{ number_format($loan->InterestRate, 0) }}%</span>
                                                </div>
                                                @php
                                                $balanceAdded = $payment->Remaining_Balance * ($loan->InterestRate / 100);
                                                @endphp
                                                <div>
                                                    <span class="text-gray-400  font-bold">Due Penalty:</span>
                                                    <span class="ml-2 text-green-500">
                                                        + P{{ number_format($balanceAdded, 2) }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>

                        </table>
                    </div>       
                </div> 
        </div> 

<br>
<!-- /////////////////////// SECTION 2 ////////////////// -->
        <div>
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 text-gray-900 dark:text-gray-100"> 
        
            <div class="mb-5 px-5 text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-left py-2 text-lg font-bold dark:text-white">Transaction History</div>
                            
            <table id="history" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
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
                            @foreach ($transactionHistory as $transaction)
                            <tr>
                                <td class="px-6 py-4">{{ $transaction->PaymentDate }}</td>
                                <td class="px-6 py-4">{{ $transaction->ReferenceNumber }}</td>
                                <td class="px-6 py-4">{{ $transaction->PaymentAmount }}</td>
                                <td class="px-6 py-4">{{ $transaction->RemainingBalance }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>               
                            
                        </div>
            </div>
        </div>
            

        
        
        <form method="POST" action="{{ route('Route-Payment', ['bno' => $borinfo->bno]) }}">
        @csrf
        
        <div id="large-modal" tabindex="-1"
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
                            data-modal-hide="large-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-10 md:p-10 space-y-10 dark:bg-gray-900 shadow-sm sm:rounded-lg mx-auto"
                        style="margin-left: 5%; margin-right: 5%;">
                        <div class="grid gap-6 mb-5 md:grid-cols-1 content-center">
                       
                            <div class="flex flex-col">
                                <label for="PaymentDate" class="text-center mb-2 text-base font-bold text-rose-400">PAYMENT DATE</label>
                                <input type="text" id="PaymentDate" name="PaymentDate" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" readonly required>
                            </div>
                            <div class="flex flex-col">
                                <label for="Balance"
                                    class="text-center mb-2 text-base font-bold text-rose-400">REMAINING BALANCE</label>
                                    <input type="text" name="Balance" value="₱ {{ isset($loan) ? optional($loan->latestPaymentForLoan($loan->lid))->Remaining_Balance : '' }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" readonly>

                            </div>
                            <div class="flex flex-col">
                                <label for="PayAmount" class="text-center mb-2 text-base font-bold text-sky-400">Pay
                                    Amount</label>
                                    <input type="text" name="PayAmount" pattern="\d+(\.\d+)?" value="{{ old('Pay Amount') }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" required>
                            </div>
                            <x-input-error :messages="$errors->get('PayAmount')" class="mt-2" />
                            <div class="flex flex-col">
                                <label for="Money" class="text-center mb-2 text-base font-bold text-green-400">Money
                                    Given</label>
                                    <input type="text" name="Money" pattern="\d+(\.\d+)?" value="{{ old('Money') }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" required>
                            </div>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="align-content: center flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="large-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">PAY</button>
                        <button data-modal-hide="large-modal" type="button"
                            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
       
<!-- ///////////// for comaker -->
        <div id="large-modal2" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-gray-50  rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Comaker Information
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="large-modal2">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-10 md:p-10 space-y-10 dark:bg-gray-900 shadow-sm sm:rounded-lg mx-auto"
                        style="margin-left: 5%; margin-right: 5%;">
                        <div class="grid gap-6 mb-5 md:grid-cols-2 content-center">
                            <div class="flex flex-col">
                                <label class="text-center mb-2 text-base font-bold text-green-400">NAME: </label>
                                    <input type="text"  value="{{ optional($Loan->loans->first())->cmName }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" readonly>
                            </div>
                            <div class="flex flex-col">
                                <label class="text-center mb-2 text-base font-bold text-green-400">ADDRESS: </label>
                                    <input type="text"  value="{{ optional($Loan->loans->first())->cmAddress }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" required>
                            </div>
                            
                            <div class="flex flex-col">
                                <label class="text-center mb-2 text-base font-bold text-green-400">CONTACT NUMBER</label>
                                    <input type="text" value="{{ optional($Loan->loans->first())->cmContact }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" required>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-center mb-2 text-base font-bold text-green-400">EMAIL ADDRESS</label>
                                    <input type="text" value="{{ optional($Loan->loans->first())->cmEmail }}" class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" required>
                            </div>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="align-content: center flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600"> </div>
                </div>
            </div>
        </div>

         <!-- ////////////// SCRIPT ////////////// -->


         <script>
                            function submitForm(form) {
                                Swal.fire({
                                    title: 'Are you sure you want to delete this record?',
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
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                        
                        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                        
                        <script>
                            new DataTable('#example2', {
                                "order": [[0, 'desc']],
                                responsive: true
                            });
                        </script> 
                         <script>
                            new DataTable('#history', {
                                responsive: true,
                                order: [[0, 'desc']]
                            });
                        </script> 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                        <script>
                                        flatpickr("#PaymentDate", {
                                            dateFormat: "M d, Y",
                                            defaultDate: new Date(),
                                        });
                                    </script>


        <script>
            document.addEventListener('submit', function (event) {
                // Check if the form is being submitted
                if (event.target.tagName === 'FORM') {
                    // Iterate through the form elements
                    for (const input of event.target.elements) {
                        // Check if the input has a pattern attribute
                        if (input.tagName === 'INPUT' && input.type === 'text' && input.hasAttribute('pattern')) {
                            // Check if the input value matches the pattern
                            if (new RegExp('^' + input.getAttribute('pattern') + '$').test(input.value)) {
                                // If the pattern matches, remove any non-numeric characters and truncate to two decimal places
                                input.value = parseFloat(input.value.replace(/[^0-9.]/g, '')).toFixed(2);
                            }
                        }
                    }
                }
            });

            // Use JavaScript to allow only numeric characters and dots in the input fields
            document.addEventListener('input', function (event) {
                if (event.target.matches('input[type="text"][pattern]')) {
                    // Get the input value
                    let inputValue = event.target.value;

                    // Remove any non-numeric characters except dots
                    inputValue = inputValue.replace(/[^0-9.]/g, '');

                    // Update the input value
                    event.target.value = inputValue;
                }
            });
        </script>
    </form>
        @endforeach
    </div>
</div>


<div id="{{'tooltip-default-'. $borinfo->lid}}" role="tooltip" class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-purple-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-purple-700"> View Comaker
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
</x-app-layout>

