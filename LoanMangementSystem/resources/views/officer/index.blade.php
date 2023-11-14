<x-app-layout>

<div class="p-4 sm:ml-64" id="hide">
        <div class="p-4  mt-5">    
            <div>
            <div class="py-12"><div>
            <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">
                <div class="p-6 text-black-900 dark:text-gray-100">
                    {{ __("LOAN OFFICER`S INFORMATION") }}
                </div>
            </div>
        </div>
    </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100 ">
                    <div class="flex flex-row-reverse ">
                    <a href="{{ route('add-officer') }}" class="bg-green-700 dark:bg-green-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-blue-500 group">
                    <svg class="w-6 h-6 text-gray-800 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                    </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">ADD OFFICER</span>
                    </a>
            
                    </div>
                    <br>
                    <!-- ////////////////////// -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Officer ID') }}<a href=""></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Full Name') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Contact Number') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Email') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Address') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Date of Birth') }}<a href="#"></div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Gender') }}<a href="#"></div>
                                    </th>
                                    
                                 
                                    <th scope="col" class="px-6 py-3 flex justify-center">{{ __('ACTION') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="Content">
                                @foreach ($OfficerInfo as $OffInfo)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $OffInfo->offId }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offFname }} {{ $OffInfo->offMname }}
                                            {{ $OffInfo->offLname }} {{ $OffInfo->offSuffix }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offContact }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offEmail }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offAddress }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offDob }}</td>
                                        <td class="px-6 py-4">{{ $OffInfo->offGender }}</td>
                                        <td class="px-6 py-4 flex justify-center">
                                            <a
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700" href= "{{route('officer-edit', ['ofno' => $OffInfo->ono]) }}">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <svg>
                                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                              <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd">
                                              </path>
                                            </svg>
                                          </svg>
                                          Update</a>
                                        
                                        
                                            <form method="POST"
                                                action = "{{ route('officer-delete', ['ofno'=>$OffInfo->ono]) }} "
                                                onclick="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('delete')
                                                <button
                                                  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"></path>
                                                  </svg>
                                                  Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
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
                       
                       
                    </div>
                </div>
            </div>
            </div>      
        </div>
    </div>
    
            


</x-app-layout>

