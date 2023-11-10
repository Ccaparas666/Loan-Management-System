<x-app-layout> <div class="p-4 sm:ml-64"> <div class="p-4  mt-14">
    <div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="flex justify-center ">
        <a href="{{ route('add-borrower') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4
        rounded mb-4 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
        dark:hover:bg-gray-700 group">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3
            3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">BORROWERS</span>
            </a>

    </div>
    <!-- ////////////////////// -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="search">
        <label for="search" class="sr-only">Search</label>
        <div class="relative mb-5">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19
            19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            </div>
            <input type="search" id="search" name="search" class="block p-2 pl-10 text-sm text-gray-900 border
            border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
            dark:focus:border-blue-500" placeholder="Search for items">
        </div>
        </div>
        <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"> <tr> ?th
            scope="col" class="px-6 py-3"> <x-column-header column-name="borEmail" :sort-column="$sortColumn"
            :sort-direction="$sortDirection">ID NO.</x-column-header> </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn" :sort-direction="$sortDirection">Full
            Name</x-column-header>
            </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn" :sort-direction="$sortDirection">Contact
            Number</x-column-header>
            </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn"
            :sort-direction="$sortDirection">Address</x-column-header>
            </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn"
            :sort-direction="$sortDirection">Email</x-column-header>
            </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn"
            :sort-direction="$sortDirection">Age</x-column-header>
            </th>
            <th scope="col" class="px-6 py-3">
            <x-column-header column-name="borEmail" :sort-column="$sortColumn"
            :sort-direction="$sortDirection">Gender</x-column-header>
            </th>
            <th class="mr-2"></th>
            <th scope="col" class="px-6 py-3"></th>
            <th scope="col" class="px-6 py-3">{{ __('ACTION') }}</th>
            <th scope="col" class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody id="Content">
            @foreach ($borrowerinfo as $borinfo)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $borinfo->bno }}</td>
                <td class="px-6 py-4">{{ $borinfo->borFname }} {{ $borinfo->borMname }}
                    {{ $borinfo->borLname }} {{ $borinfo->borSuffix }}</td>
                <td class="px-6 py-4">{{ $borinfo->borContact }}</td>
                <td class="px-6 py-4">{{ $borinfo->borEmail }}</td>
                <td class="px-6 py-4">{{ $borinfo->borAddress }}</td>
                <td class="px-6 py-4">{{ $borinfo->borAge }}</td>
                <td class="px-6 py-4">{{ $borinfo->borGender }}</td>
                <th class="mr-2"></th>
                <td class="px-6 py-4">
                    <a
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{
                        __('View') }}</a>
                </td>
                <td class="px-6 py-4">
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="{{route('borrower-edit', ['brno' => $borinfo->bno]) }}">{{ __('Edit') }}</a>
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('borrower-delete', ['brno' => $borinfo->bno]) }}"
                        onclick="return confirm('Are you sure you want to delete this record?')">
                        @csrf
                        @method('delete')
                        <button
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{
                            __('Delete') }}</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

        </table>


        {{ $borrowerinfo->onEachSide(5)->links() }}




    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var query = $(this).val();


                $.ajax({
                    type: 'GET',
                    url: "search",
                    data: { 'search': query },

                    success: function (data) {
                        console.log(data);
                        $('#Content').html(data);
                    }
                });
            });
        });


    </script>
    </x-app-layout>