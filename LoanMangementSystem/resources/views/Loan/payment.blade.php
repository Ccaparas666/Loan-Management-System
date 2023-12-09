<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div>
            <div>
                <div class="py-10"></div>
                <div
                    class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                    <div class="p-6 text-black-900 dark:text-gray-100">
                        {{ __("LOAN INFORMATION") }}
                    </div>
                </div>
                @if (session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    @elseif (session()->has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "error",
                title: "Not Found",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                
            });
        });
    </script>
@endif


                <div>
                    <form method="POST" action="{{ route('loan-search') }}" class="p-10 w-80% ">
                    @csrf
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Loan Number e.g (LNO-0000X)" required>
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
    
                    </form>
                </div>
                @if(session()->has('data') && $data->count() > 0)
                    @php
                        $data = session('data');
                    @endphp

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 text-black-900 dark:text-gray-100 bg-white dark:bg-gray-800">
                    <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400"
                        style="width:100%">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    <div class="flex items-center">{{ __('Date Loan Started') }}<a href="#">
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 flex justify-center">{{ __('ACTION') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody id="Content">
                            @foreach($data as $loan)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{$loan->loanNumber}}</td>
                                    <td class="px-6 py-4">{{$loan->borFname}} {{$loan->borMname}} {{$loan->borLname}} {{$loan->borSuffix}}</td>
                                    <td class="px-6 py-4">{{$loan->LoanAmount}}</td>
                                    <td class="px-6 py-4">{{$loan->LoanApplication}}</td>
                                    <td class="px-6 py-4 flex justify-center">
                                    <a data-tooltip-target="{{'tooltip-default23-'. $loan->bno}}"  class="approved text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700" href="{{route('borrower-view', ['brno' => $loan->bno]) }}"> View Loan Details
                                            <div id="{{'tooltip-default23-'. $loan->bno}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-blue-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                                                View Loan
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        new DataTable('#example', {
            "order": [[0, 'desc']],
            responsive: true
        });
    </script>

</x-app-layout>