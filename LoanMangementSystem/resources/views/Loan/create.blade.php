<x-app-layout>
    
    <div class="p-4 sm:ml-64">
        <div class="p-4  mt-14">    
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
            <form method="POST" action="{{ route('Loan-store') }}">
                        @csrf
                        <!-- /////////////////////// -->

                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="First Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Borrower</label>
                                    
                               
                                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Display Borrower1</option>
                                    <option value="">Display Borrower2</option>
                                    <option value="">Display Borrower3</option>
                                    <option value="">Display Borrower4</option>
                                  
                                    </select>
                              
                            </div>

                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="col-span-2">
                                <label for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="xemail" value="{{ old('xemail') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                            </div>
                            <div>
                                <label for="Gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="xgender" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                            <div>
                                <label for="Age"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                                <input type="text" name="xage" value="{{ old('xage') }}"
                                    class=" w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="col-span-2">
                                <label for="Address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="xaddress" value="{{ old('xaddress') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="col-span-2 w-96">
                                <label for="contact"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                <input type="text" name="xcontact" value="{{ old('xcontact') }}"
                                    class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="e.g 09123456789" required>
                            </div>
                        </div>
                        <br> <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Add</button><br>

                        <a class="mt-4 float-left bg-blue-200 text-black font-bold py-2 px-4 mb-5 rounded"> Back
                        </a><br />
                    </form>
            </div>      
        </div>
    </div>

</x-app-layout>