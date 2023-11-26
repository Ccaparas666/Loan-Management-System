<x-app-layout>
    <div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
            <div class="py-12">
                <div>
                    <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-2xl font-bold text-gray-50 dark:text-white">ADD BORROWER`S INFORMATION</h4>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- @if ($errors)
                        <ul class="bg-white dark:bg-green-400 overflow-hidden shadow-sm sm:rounded-lg">
                            @foreach ($errors->all() as $error)
                                <li></li>
                                <script>
                                    Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "{{ $error }}",
                                    });
                                </script>
                            @endforeach
                        </ul>
                    @endif -->
                    
                    <br /><br>
                    <form method="POST" action="{{ route('borrower-store') }}">
                        @csrf
                    
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="FirstName" class="block mb-2 text-sm  text-blue-700 dark:text-blue-300 font-bold">FIRST NAME</label>
                                <input type="text" name="FirstName" value="{{ old('FirstName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                <x-input-error :messages="$errors->get('FirstName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="MiddleName" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">MIDDLE INITIAL</label>
                                <input type="text" maxlength="1" name="MiddleName" value="{{ old('MiddleName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Middle Initial e.g A">
                                <x-input-error :messages="$errors->get('MiddleName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="LastName" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">LAST NAME</label>
                                <input type="text" name="LastName" value="{{ old('LastName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                <x-input-error :messages="$errors->get('LastName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Suffix" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">SUFFIX</label>
                                <input type="text" name="Suffix" value="{{ old('Suffix') }}"
                                    class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g jr">
                                <x-input-error :messages="$errors->get('Suffix')" class="mt-2" />
                            </div>
                        </div>
                    
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="col-span-2">
                                <label for="Email" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">EMAIL</label>
                                <input type="email" name="Email" value="{{ old('Email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                                <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Gender" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">GENDER</label>
                                <select name="Gender" value="{{ old('Gender') }}" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <x-input-error :messages="$errors->get('Gender')" class="mt-2" />
                            </div>
                            <div>
                                <label for="BirthDate" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">BIRTH DATE</label>
                                <input type="date" name="BirthDate" value="{{ old('BirthDate') }}"
                                    class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <x-input-error :messages="$errors->get('BirthDate')" class="mt-2" />
                            </div>
                        </div>
                    
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="Address" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">ADDRESS</label>
                                <input type="text" name="Address" value="{{ old('Address') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <x-input-error :messages="$errors->get('Address')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Contact" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">CONTACT NUMBER</label>
                                <input type="text" name="Contact" value="{{ old('Contact') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g 09123456789" required>
                                <x-input-error :messages="$errors->get('Contact')" class="mt-2" />
                            </div>
                        </div>
                    
                        <br>
                        <div class="flex justify-center">
                            <div class="grid gap-6 m-4 md:grid-cols-2">
                            <button type="submit"
                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">
                                <svg class="w-5 h-5 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                </svg>
                                ADD BORROWER
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

                </div>
            </div>       
        </div>      
    </div>
</div>
</x-app-layout>