<x-app-layout>
    <div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
            <div class="py-12">
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-2xl font-bold dark:text-white">ADD BORROWER`S INFORMATION</h4>
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
                        <!-- /////////////////////// -->

                        

                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="First Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    name</label>
                                <input type="text" name="FirstName" value="{{ old('FirstName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                    <x-input-error :messages="$errors->get('FirstName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Middle Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middlename</label>
                                <input type="text" maxlength="1" name="MiddleName" value="{{ old('MiddleName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Middle Initial e.g A">
                                    <x-input-error :messages="$errors->get('MiddleName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Last Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name
                                </label>
                                <input type="text" name="LastName" value="{{ old('LastName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                    <x-input-error :messages="$errors->get('LastName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Suffix"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suffix </label>
                                <input type="text" name="Suffix" value="{{ old('Suffix') }}"
                                    class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g jr">
                                    <x-input-error :messages="$errors->get('Suffix')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="col-span-2">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="Email" value="{{ old('Email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                                    <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="Gender" value="{{ old('Gender') }}" 
                                required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    
                                    <option selected disabled>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                                <x-input-error :messages="$errors->get('Gender')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Birth Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                                <input type="date" name="BirthDate"  value="{{ old('BirthDate') }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                <x-input-error :messages="$errors->get('BirthDate')" class="mt-2" />
                            </div>

                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="Address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="Address" value="{{ old('Address') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                    <x-input-error :messages="$errors->get('Address')" class="mt-2" />
                            </div>
                            <div>
                                <label for="contact"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                <input type="text" name="Contact" value="{{ old('Contact') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g 09123456789" required>
                                    <x-input-error :messages="$errors->get('Contact')" class="mt-2" />
                            </div>
                            
                        </div>


                        <!-- ////////////// -->
                        <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label for="First Name" class="font-bold">First Name:</label>
                                <input type="text" name="xfirstName" value="{{ old('xfirstName') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Middle Name" class="font-bold">Middle Name:</label>
                                <input type="text" name="xmiddleName" value="{{ old('xmiddleName') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Last Name" class="font-bold">Last Name:</label>
                                <input type="text" name="xlastName" value="{{ old('xlastName') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Suffix" class="font-bold">Suffix:</label>
                                <input type="text" name="xsuffix" value="{{ old('xsuffix') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="contact" class="font-bold">Contact number:</label>
                                <input type="text" name="xcontact" value="{{ old('xcontact') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Email" class="font-bold">Email:</label>
                                <input type="text" name="xemail" value="{{ old('xemail') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Address" class="font-bold">Address:</label>
                                <input type="text" name="xaddress" value="{{ old('xaddress') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Age" class="font-bold">Age:</label>
                                <input type="text" name="xage" value="{{ old('xage') }}"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>

                            <div class="flex flex-col">
                                <label for="Gender" class="font-bold">Gender</label>
                                <select name="xgender"
                                    class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                                    <option class="font-bold" value="Male">Male</option>
                                    <option class="font-bold" value="Female">Female</option>
                                </select>
                            </div>
                        </div> -->
                        <br> <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">Add Borrower</button><br>

                        </a><br />
                    </form>
                </div>
            </div>       
        </div>      
    </div>
</div>
</x-app-layout>