

<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">
            <div>
                <div class="py-10"></div>
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center flex-wrap">
                       
                        <a href="" class=" flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-gray-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                            </svg>BORROWERS
                        </a>
                        <a href="" class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                           LOANS
                        </a>
                        <a href="" class="flex items-center sm:w-auto text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20"> 
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                            </svg>PAYMENTS
                        </a>
                       
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black-900 dark:text-gray-100 ">
                        <div>
                            <div
                                class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                                <div class="p-6 text-black-900 dark:text-gray-100">
                                    {{ __("Loan Reports") }}
                                </div>

                            </div>

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Borrower Account Number') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Borrower Name') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Address') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Email') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Contact Number') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Comaker') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Comaker') }}</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="Content">
                                        @foreach($loans as $loan)
                                        <tr scope="row" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loan->borrowerinfo->borAccount ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $loan->borrowerinfo->borFname ?? ''}} {{ $loan->borrowerinfo->borLname ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $loan->borrowerinfo->borAddress ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $loan->borrowerinfo->borEmail ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $loan->borrowerinfo->borContact ?? ''}}
                                        </td>
                                       
                                        <td class="px-6 py-4">
                                        {{ $loan->cmName ?? ''}} <br>
                                        {{ $loan->cmContact ?? ''}}<br>
                                        {{ $loan->cmEmail ?? ''}}<br>
                                        {{ $loan->cmAddress ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $loan->borrowerinfo->loanstatus ?? ''}}
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                                    crossorigin="anonymous"></script>
                                <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

                                <script
                                    src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        // value from search parameter
                                        var searchValue = new URLSearchParams(window.location.search).get('search');

                                        // datatabel search value default
                                        $('#example').DataTable().search(searchValue !== null ? searchValue : '').draw();
                                    });
                                </script>

                                <script>
                                    new DataTable('#example', {
                                        order: [[0, 'desc']],
                                        responsive: true
                                    });

                                </script>


                            </div>


                            

                          
                        </div>
                    </div>
                </div>




</x-app-layout>
