<x-app-layout>
<div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
            <div class="py-12">
                <div>
                    <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-50 dark:text-gray-100">
                            <h4 class="text-2xl font-bold dark:text-white">UPDATE OFFICER INFORMATION</h4>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if($errors)
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <br /><br>
                    <h3 class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">Loan Officer Information</h3>
                    <br><br>
                    @foreach ($OfficerInfo as $OffInfo)
                    <form method="POST" action="{{ route('officer-update',['ofno' => $OffInfo->ono]) }}" >
                        @csrf
                        @method('patch')
                        
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="First Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    name</label>
                                <input type="text" name="xfirstName" value="{{ $OffInfo->offFname }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="Middle Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle name</label>
                                <input type="text" name="xmiddleName" value="{{ $OffInfo->offMname }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John">
                            </div>
                            <div>
                                <label for="Last Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name
                                </label>
                                <input type="text" name="xlastName" value="{{ $OffInfo->offLname }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="Suffix"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suffix </label>
                                <input type="text" name="xsuffix" value="{{ $OffInfo->offSuffix }}"
                                    class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g jr">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="Address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="xaddress" value="{{ $OffInfo->offAddress }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="contact"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                <input type="text" name="xcontact" value="{{ $OffInfo->offContact }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g 09123456789" required>
                            </div>
                            <div>
                                <label for="Gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="xgender" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected hidden>{{ $OffInfo->offGender }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                           
                            <div>
                                <label for="Birth Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                                <input type="date" name="xbirthDate" value="{{ $OffInfo->offDob }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>

                        </div>
                        <br>
                        <h3 class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">Officer Account Information</h3>
                        <br>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAIL</label>
                                <input type="email" name="xemail" value="{{ $OffInfo->offEmail }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                            </div>
                            <div class="">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PASSWORD</label>
                                <input type="text" name="xpassword" value="{{ $OffInfo->offpassword }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                            </div>
                            <div>
                  </div>

                  
                        </div>
                        <br> <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">Create Account</button><br>

                        </a><br />
                    </form>
                    @endforeach
                </div>
            </div>        
        </div>      
    </div>
</div>


</x-app-layout>