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
            @foreach ($borrowerinfo as $borinfo)
            <div class="flex flex-row space-x-4">
                <div class="basis-2/5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
    <label for="Name" class="font-bold block">{{ $borinfo->borFname }} {{ $borinfo->borMname }} {{ $borinfo->borLname }} {{ $borinfo->borSuffix }}</label>
    <label for="Accountnumber" class="block mt-2">
        Account No. <span class="font-bold text-purple-500">{{ $borinfo->borAccount }}</span>
    </label>
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
                            <div class="grid gap-6 m-4 md:grid-cols-2">
                            <a href="{{route('borrower-edit', ['brno' => $borinfo->bno]) }}" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                                </svg>
                                UPDATE
                            </a>

                            <a href="#"
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
                                Apply Loan
                            </a>


                            
                            </div>
                        </div>
                    </div>
            
                <div class=" basis-3/5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    </div>
                </div>           
        </div> 
        @endforeach
    </div>
</div>


</x-app-layout>