<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">
            <div>
                <div class="py-10"></div>


                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black-900 dark:text-gray-100 ">
                        <div>
                            <div
                                class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                                <div class="p-6 text-black-900 dark:text-gray-100">
                                    {{ __("Acitivity Logs Table") }}
                                </div>

                            </div>

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="example" class="display nowrap text-sm text-left text-black-500 dark:text-gray-400" style="width:100%">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('ID') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Log Name') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Description') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Subject Type') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Event') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Subject ID') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Causer Type') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Causer ID') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Properties') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Batch UUID') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Updated At') }}</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">{{ __('Created At') }}</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="Content">
                                        @foreach($activityLogs as $log)
                                        <tr scope="row" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $log->id }}</td>
                                            <td class="px-6 py-4">{{ $log->log_name }}</td>
                                            <td class="px-6 py-4">{{ $log->description }}</td>
                                            <td class="px-6 py-4">{{ $log->subject_type }}</td>
                                            <td class="px-6 py-4">{{ $log->event }}</td>
                                            <td class="px-6 py-4">{{ $log->subject_id }}</td>
                                            <td class="px-6 py-4">{{ $log->causer_type }}</td>
                                            <td class="px-6 py-4">{{ $log->causer_id }}</td>
                                            <td class="px-6 py-4">{{ $log->properties }}</td>
                                            <td class="px-6 py-4">{{ $log->batch_uuid }}</td>
                                            <td class="px-6 py-4">{{ $log->updated_at }}</td>
                                            <td class="px-6 py-4">{{ $log->created_at }}</td>
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