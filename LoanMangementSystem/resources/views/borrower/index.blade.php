<x-app-layout>
<div class="p-4 sm:ml-64">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Borrower Information') }}
        </h2>
    </x-slot>
    <div class="py-12 flex justify-center items-center">
        <div class="max-w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"
                            href="{{ route('add-borrower') }}">Add Borrower Information</a>
                    </div>
                    <!-- ////////////////////// -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="pb-4 bg-white dark:bg-gray-900">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </div>
                        <table class="w-full  text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('ID NO.') }}<a href="">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Full Name') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Contact Number') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Email') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Address') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Age') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">{{ __('Gender') }}<a href="#">
                                            <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg></a>
                                        </div>
                                    </th>
                                    <th class="mr-2"></th>
                                    <th scope="col" class="px-6 py-3"></th>
                                    <th scope="col" class="px-6 py-3">{{ __('ACTION') }}</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowerinfo as $borinfo)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('View') }}</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href= "{{route('borrower-edit', ['brno' => $borinfo->bno]) }}">{{ __('Edit') }}</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form method="POST"
                                                action = "{{ route('borrower-delete', ['brno' => $borinfo->bno]) }}"
                                                onclick="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __('Delete') }}</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /////////////////////// -->
                    <!-- <h6 class="mt-4 text-2xl font-bold">{{ __('List of Borrowers') }}</h6><br>
                <table class="table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="border border-gray-500 px-4 py-2">{{ __('ID No.') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Full Name') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Contact Number') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Email') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Address') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Age') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Gender') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('View') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Edit') }}</th>
                            <th class="border border-gray-500 px-4 py-2">{{ __('Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowerinfo as $borinfo)
<tr>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->bno }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borFname }}  {{ $borinfo->borMname }} {{ $borinfo->borLname }} {{ $borinfo->borSuffix }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borContact }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borEmail }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borAddress }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borAge }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $borinfo->borGender }}</td>
                                <td class="border border-gray-500 px-4 py-2">
                                    <a class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mr-2" >{{ __('View') }}</a>
                                </td>
                                <td class="border border-gray-500 px-4 py-2">
                                <a class="bg-violet-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">{{ __('Edit') }}</a>
                                </td>
                                <td class="border border-gray-500 px-4 py-2">
                                <form method="POST" action = "{{ route('borrower-delete', ['brno' => $borinfo->bno]) }}" onclick="return confirm('Are you sure you want to delete this record?')">@csrf
                                    @method('delete')
                                <button class=" bg-red-200 hover:bg-red-300 text-white font-bold py-2 px-4 rounded mr-2" type="submit" >{{ __('Delete') }}</button>
                                </form>
                                </td>
                            </tr>
@endforeach
                    </tbody>
                </table> -->
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
