<x-app-layout>

<div class="p-4 sm:ml-64" id="hide">
        <div >    
            <div>
            <div class="py-10"></div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100 ">
                <div >
            <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                <div class="p-6 text-black-900 dark:text-gray-100">
                    {{ __("Interest Rate Settings") }}
                </div>
            </div>
        </div>
                    <br><br>
                    <div class="container-xl px-4 mt-n4">
                            @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "{{session('success')}}",

                                });
                            </script>
                             @elseif (session()->has('error'))
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "Borrower Registered in Loan",
                                text: "{{session('error')}}",
                                });
                            </script>
                           
                            @endif
                    </div>
                    <!-- ////////////////////// -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex justify-center">{{ __('Interest Rate') }}</div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 flex justify-center">{{ __('ACTION') }}</th>   
                                </tr>
                                
                            </thead>
                            
                            <tbody id="Content">
                            @foreach ($loansettings as $settings)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <td scope="row" class="text-center px-6 py-4 font-bold text-3xl text-gray-900 whitespace-nowrap dark:text-white ">{{ $settings->interest }} % </td>
                                <td class="px-6 py-4 flex justify-center">
                                        <a data-tooltip-target="{{'tooltip-default-'. $settings->lsid}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700" href= "#">
                                                <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />       
                                                </svg>
                                            <div id="{{'tooltip-default-'. $settings->lsid}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                                                Update Interest Rate
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            </a>
                                            <form data-tooltip-target="{{'tooltip-default1-'. $settings->lsid}}"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700"
                                                method="POST" action="{{ route('interest-delete', ['int' => $settings->lsid]) }}"
                                                onsubmit="return submitForm(this);">
                                                @csrf
                                                @method('delete')
                                            
                                                <button>
                                                    <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                    </svg>
                                                    <div id="{{'tooltip-default1-'. $settings->lsid}}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-800">
                                                        Delete Interest Rate
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </button>
                                            
                                            
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
                                            </form>
                                        </td>
                            </tr>
                            
                            
                            @endforeach
                            </tbody>

                           
                                        
                                        
                           
                        </table>
                        


                        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                        
                        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                        
                        <script>
                            new DataTable('#example', {
                                "order": [[0, 'desc']],
                                responsive: true
                            });

                        </script>
                        @if (Session::has('message'))
                        <script>
                            toastr.success("{{ Session::get('message') }}");
                        </script>
                        @endif
                       
                    </div>
                </div>
            </div>
            </div>      
        </div>
    </div>
    
            


    




</x-app-layout>

