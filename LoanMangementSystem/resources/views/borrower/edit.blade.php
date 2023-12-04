<x-app-layout>
    <div class="p-4 sm:ml-64" id="hide">
        <div class="p-4  mt-5">
            <div>
                <div class="py-12">
                    <div>
                        <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h4 class="text-2xl font-bold dark:text-white">UPDATE BORROWER`S INFORMATION</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-10 text-gray-900 dark:text-gray-100">
                        @foreach ($borrowerinfo as $borinfo)
                        <form method="POST" action="{{ route('borrower-update',['brno' => $borinfo->bno]) }}">
                            @csrf
                            @method('patch')

                            <div class="grid gap-6 mb-6 md:grid-cols-4">
                                <div>
                                    <label for="First Name"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">FIRST NAME</label>
                                    <input type="text" name="FirstName" value="{{$borinfo->borFname}}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                    <x-input-error :messages="$errors->get('FirstName')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="Middle Name"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">MIDDLE INITIAL</label>
                                    <input type="text" name="MiddleName" value="{{ $borinfo->borMname }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John">
                                    <x-input-error :messages="$errors->get('MiddleName')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="Last Name"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">LAST NAME
                                    </label>
                                    <input type="text" name="LastName" value="{{ $borinfo->borLname }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                    <x-input-error :messages="$errors->get('LastName')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="Suffix"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">SUFFIX
                                    </label>
                                    <input type="text" name="Suffix" value="{{ $borinfo->borSuffix }}"
                                        class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="e.g jr">
                                    <x-input-error :messages="$errors->get('Suffix')" class="mt-2" />
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-4">
                                <div class="col-span-2">
                                    <label for="Email"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">EMAIL</label>
                                    <input type="email" name="Email" value="{{ $borinfo->borEmail }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="example@gmail.com" required>
                                    <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="Gender"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">GENDER</label>
                                    <select name="Gender" id="gender" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option selected hidden>{{ $borinfo->borGender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                    <x-input-error :messages="$errors->get('Gender')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="Birth Date"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">BIRTH DATE</label>
                                    <input type="date" name="BirthDate" value="{{ $borinfo->borDob }}"
                                        class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                    <x-input-error :messages="$errors->get('BirthDate')" class="mt-2" />
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div class="col-span-2">
                                    <label for="Address"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">ADDRESS</label>
                                    <input type="text" name="Address" value="{{ $borinfo->borAddress }}"
                                        class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                    <x-input-error :messages="$errors->get('Address')" class="mt-2" />
                                </div>
                                <div class="col-span-1">
                                    <label for="contact"
                                        class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300 font-bold">CONTACT NUMBER</label>
                                    <input type="text" name="Contact" value="{{ $borinfo->borContact }}"
                                        class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="e.g 09123456789" required>
                                    <x-input-error :messages="$errors->get('Contact')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="grid gap-6 m-4 md:grid-cols-2">
                                    <button type="submit"
                                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">
                                        <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                d="M5 3l2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 11l2 2m0 0l2-2m-2 2l-2-2m0 2l2 2"></path>
                                        </svg>
                                        EDIT SAVE
                                    </button>
                            
                            
                                    <a href="{{ route('borrower') }}"
                                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-md dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                        <svg class="w-5 h-5 mr-2 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        CANCEL
                                    </a>
                                </div>
                            </div>
                           
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>