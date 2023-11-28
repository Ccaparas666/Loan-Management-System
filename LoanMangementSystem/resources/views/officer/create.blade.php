<x-app-layout>
    <div class="p-4 sm:ml-64" id="hide">
    <div class="p-4  mt-5">    
        <div>
            <div class="py-12">
                <div>
                    <div class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-2xl font-bold text-gray-200 dark:text-white">ADD ACCOUNT INFORMATION</h4>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                    <br /><br>
                    <h3 class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">Loan Account Information</h3>
                    <br><br>
                    <form method="POST" action="{{ route('Officer-store') }}">
                        @csrf
                        <!-- /////////////////////// -->

                        
                       
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="First Name"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">FIRST NAME</label>
                                <input type="text" name="xfirstName" value="{{ old('xfirstName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                    <x-input-error :messages="$errors->get('xfirstName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Middle Name"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">MIDDLE INITIAL</label>
                                <input type="text" maxlength="1" name="xmiddleName" value="{{ old('xmiddleName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John">
                                    <x-input-error :messages="$errors->get('xmiddleName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Last Name"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">LAST NAME</label>
                                <input type="text" name="xlastName" value="{{ old('xlastName') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                                    <x-input-error :messages="$errors->get('xlastName')" class="mt-2" />
                            </div>
                            <div>
                                <label for="Suffix"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">SUFFIX</label>
                                <input type="text" name="xsuffix" value="{{ old('xsuffix') }}"
                                    class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g jr">
                                    <x-input-error :messages="$errors->get('xsuffix')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="Address"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">ADDRESS</label>
                                <input type="text" name="xaddress" value="{{ old('xaddress') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                    <x-input-error :messages="$errors->get('xaddress')" class="mt-2" />
                            </div>
                            <div>
                                <label for="contact"
                                    class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">CONTACT NUMBER</label>
                                <input type="text" name="xcontact" value="{{ old('xcontact') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g 09123456789" required>
                                    <x-input-error :messages="$errors->get('xcontact')" class="mt-2" />
                            </div>
                            <div>
                            <label for="Gender" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">GENDER</label>
                            <select name="xgender" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ old('xgender') ? '' : 'selected' }} disabled>Choose Gender</option>
                                <option value="Male" {{ old('xgender')=='Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('xgender')=='Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('xgender')" class="mt-2" />
                            </div>
                           
                            <div>
                                <label for="Birth Date" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">BIRTH DATE</label>
                                <input type="date" name="xbirthDate"  value="{{ old('xbirthDate') }}"  class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                <x-input-error :messages="$errors->get('xbirthDate')" class="mt-2" />
                            </div>

                        </div>
                        <br>
                        <h3 class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 text-2xl font-bold dark:text-white">CREATE ACCOUNT</h3>
                        <br>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <!-- <div class="">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAIL</label>
                                <input type="email" name="xemail" value="{{ old('xemail') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                            </div>
                            <div class="">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PASSWORD</label>
                                <input type="password" name="xpassword" value="{{ old('xpassword') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CONFIRM PASSWORD</label>
                                <input type="password" id="password_confirmation"  name="password_confirmation"  placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="new-password">
                            </div> -->
                             <!-- Email -->
    <div class="mb-4">
        <label for="xemail" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">EMAIL</label>
        <input id="xemail" type="email" name="xemail" value="{{ old('xemail') }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="example@gmail.com" required>
        
            <x-input-error :messages="$errors->get('xemail')" class="mt-2" />
       
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="xpassword" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">PASSWORD</label>
        <input id="xpassword" type="password" name="xpassword" value="{{ old('xpassword') }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="••••••••" required>
               <x-input-error :messages="$errors->get('xpassword')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <label for="xpassword_confirmation" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">CONFIRM PASSWORD</label>
        <input id="xpassword_confirmation" type="password" name="xpassword_confirmation" placeholder="••••••••"
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required autocomplete="new-password">
               <x-input-error :messages="$errors->get('xpassword_confirmation')" class="mt-2" />
    </div>
                            <div class="">
                                </select>
                                <label for="default" class="block mb-2 text-sm font-bold text-blue-700 dark:text-blue-300">ACCOUNT</label>
                                <select id="default" name="Role" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" {{ old('Role') ? '' : 'selected' }} disabled>Choose Role Account</option>
                                    <option value="0" {{ old('Role')=='0' ? 'selected' : '' }}>Loan Officer</option>
                                    <option value="1" {{ old('Role')=='1' ? 'selected' : '' }}>Loan Manager</option>
                                </select>
                                <x-input-error :messages="$errors->get('Role')" class="mt-2" />
                            </div>
                            
                  
                        </div>
                        <br> <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">Create Account</button><br>

                        </a><br />
                    </form>
                </div>
            </div> 
                  
        </div>      
    </div>
</div>


</x-app-layout>