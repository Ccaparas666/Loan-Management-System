<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div>
            <div>
                <div class="py-10"></div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($test === 'test2')
                    <div class="p-6 text-black-900 dark:text-gray-100 ">
                        <div
                            class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                            <div class="p-6 text-black-900 dark:text-gray-100">
                                {{ __("LOAN INFORMATION") }}
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row-reverse ">
                                <button data-modal-target="large-modal" data-modal-toggle="large-modal"
                                    class="bg-green-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded my-4 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-blue-500 group">
                                    <svg class="w-[19px] h-[19px] test" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 384 512">
                                        <style>
                                            .test {
                                                fill: #fffff2
                                            }
                                        </style>
                                        <path
                                            d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z" />
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">PAY LOAN</span>
                                </button>

                            </div>

                            
                            <form class="py-5">
                                <div class="grid gap-6 mb-5 md:grid-cols-3">
                                    <div>
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">ACCOUNT NUMBER</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->borAccount }}"
                                            class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="BAC-00001 366224" required>
                                    </div>
                                    <div>
                                        <label for="Middle Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">LOAN NUMBER</label>
                                        <input type="text" name="xmiddleName" value="{{$borrowerinfo->loans->first()->loanNumber}}"
                                            class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="LNO-00001">
                                    </div>
                                    <div>
                                        <label for="Last Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">DATE LOAN</label>
                                        <input disabled type="text" name="xlastName" value="12/21/2000"
                                            class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                </div>

                                <div class="grid gap-6 mb-5 md:grid-cols-3">
                                    <div class="col-span-2">
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Borrower`s Name</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->borFname }} {{ $borrowerinfo->borMname }}. {{ $borrowerinfo->borLname }} {{ $borrowerinfo->borSuffix }}"
                                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="Carmelo A. Caparas" readonly>
                                    </div>
                                    <div>
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Contact Number</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->borContact }}"
                                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="0912312312" readonly>
                                    </div>
                                </div>

                                <div class="grid gap-6 mb-5 md:grid-cols-1">
                                    <div>
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Current Address</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->borAddress }}"
                                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="Lourdes Capistrano Cagayan Manila" readonly>
                                    </div>
                                </div>

                                <div class="grid gap-6 mb-5 md:grid-cols-2">
                                    <div>
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Loan Amount</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->loans->first()->payments->last()->Remaining_Balance ?? '' }}"
                                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="10000" readonly>
                                    </div>
                                    <div>
                                        <label for="First Name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Due Date</label>
                                        <input type="text" name="xfirstName" value="{{ $borrowerinfo->loans->first()->payments->last()->due_date ?? '' }}"
                                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled placeholder="10/30/2023" readonly>
                                    </div>

                                </div>


                            </form>

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>


    <form method="POST" action="{{ route('Route-Payment', ['bno' => $borrowerinfo->bno]) }}">
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
                                <label for="Balance"
                                    class="text-center mb-2 text-base font-bold text-rose-400">REMAINING
                                    BALANCE</label>
                                <input type="text" name="Balance" value="{{ $borrowerinfo->loans->first()->payments->last()->Remaining_Balance ?? '' }}"
                                    class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                                    readonly>
                            </div>
                            <div class="flex flex-col">
                                <label for="PayAmount" class="text-center mb-2 text-base font-bold text-sky-400">Pay
                                    Amount</label>
                                <input type="text" name="PayAmount" value="{{ old('Pay Amount') }}"
                                    class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                                    required>
                            </div>
                            <div class="flex flex-col">
                                <label for="Money" class="text-center mb-2 text-base font-bold text-green-400">Money
                                    Given</label>
                                <input type="text" name="Money" value="{{ old('Money') }}"
                                    class="font-bold text-center bg-gray-200 border border-blue-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                                    required>
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

    </form>
  
    @else    
                <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                    <div class="p-6 text-black-900 dark:text-gray-100">
                        {{ __("LOAN INFORMATION") }}
                    </div>
                </div>    


                <div class="flex justify-center items-center">
<form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
</div>

                
    @endif
    
   
</x-app-layout>