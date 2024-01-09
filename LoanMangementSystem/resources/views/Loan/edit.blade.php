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
                                    {{ __('Loan Edit') }}
                                </div>

                            </div>
                            <div>
                            <div class="container-xl px-4 mt-n4">
                            @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "{{session('success')}}",
                                showConfirmButton: false,
                                timer: 1500

                                });

                           
                            </script>
                            @elseif (session()->has('error'))
                           <script>
                                Swal.fire({
                                icon: "error",
                                title: "Borrower Not Found",
                                text: "{{session('error')}}",
                                });                               
                            </script>
                            @elseif (session()->has('CreateSuccess'))
                           <script>
                                Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "{{session('CreateSuccess')}}",
                                });                               
                            </script>
                            @elseif (session()->has('errorFound'))
                           <script>
                                Swal.fire({
                                icon: "error",
                                title: "Borrower Already Registered",
                                text: "{{session('errorFound')}}",
                                });                               
                            </script>
                            @endif

                            
                    </div>
                  
                        
                       
                                       


                                    
                    @foreach ($loanInfo as $loanInfo)          
                            <form method="POST" action="{{ route('loan-update',['lid' => $loanInfo->lid]) }}" id="vedformid">
                            @csrf
                            @method('patch')
                                <!-- /////////////////////// -->

                               

                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                    <div>
                                        <label for="Loan no."
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan
                                            No.</label>
                                        <input type="text" name="xLoanNumber" value="{{$loanInfo->loanNumber}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" disabled>
                                    </div>
                                    <div>
                                        <label for="Interest Rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest Rate</label>
                                            <select id="default" name="xInterest" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                
                                                <option selected hidden>{{ number_format($loanInfo->InterestRate, 0) }}%</option>
                                                @foreach ($loansettings as $setting)
                                                <option value="{{ $setting->interest }}">{{ $setting->interest }}%</option>
                                                @endforeach
                                            </select>
                                            
                                    </div>
                                    <div>
                                        <label for="LoanDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                        <input type="date" name="xLoanDate"
                                            class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{$loanInfo->LoanApplication}}" required />
                                    </div>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                    <div>
                                        <label for="Loan Amount" 
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan Amount</label>
                                        <input type="text" name="xLoanAmount" value="{{$loanInfo->LoanAmount}}"
                                            class=" w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                            <x-input-error :messages="$errors->get('xLoanAmount')" class="mt-2" />
                                            
                                    </div>
                                </div>

                               
                                <div
                                    class="shadow-lg shadow-gray-500/50 border-b text-xl my-6 py-6 text-black-900 dark:text-gray-100">
                                    <h1>BORROWER INFORMATION</h1>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-4">
                               
                                    <div>
                                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                    <input type="text"  name="xFullname" value="{{ $loanInfo->borrowerinfo->borFname }} {{ $loanInfo->borrowerinfo->borMname }} {{ $loanInfo->borrowerinfo->borLname }} {{ $loanInfo->borrowerinfo->borSuffix }}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                           
                                        
                                    </div>
                                    <div>
                                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                        
                                            <input type="text"  name="xContact" value="{{$loanInfo->borrowerinfo->borContact}}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                       
                                    </div>
                                    <div>
                                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                       
                                            <input type="text"   name="xemail1" value="{{$loanInfo->borrowerinfo->borEmail}}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                       
                            
                                    </div>
                                    <div>
                                        <label for="xBirth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                                        
                                            <input type="date"  name="xBirth" value = "{{$loanInfo->borrowerinfo->borDob}}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                                      
                                    </div>
                                    <div class="col-span-4">
                                        <label for="Address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                      
                                            <input type="text"  name="xAddress" value="{{$loanInfo->borrowerinfo->borAddress}}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                       
                                    </div>
                                   
                                </div>


                                <div
                                    class="shadow-lg shadow-gray-500/50 border-b text-xl my-6 py-6 text-black-900 dark:text-gray-100">
                                    <h1>CO-MAKER INFO</h1>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-4">
                                    <div>
                                        <label for="Cname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                        <input type="text" name="xcFullname" value="{{$loanInfo->cmName}}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                            <x-input-error :messages="$errors->get('xcFullname')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="ccontact"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                            Number</label>
                                        <input type="text" maxlength="11" name="xcContact" value="{{$loanInfo->cmContact}}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="e.g 09123456789" required>
                                            <x-input-error :messages="$errors->get('xcContact')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="cemail"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="xcEmail" value="{{$loanInfo->cmEmail}}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="e.g 09123456789" required>
                                            <x-input-error :messages="$errors->get('xcEmail')" class="mt-2" />
                                    </div>
                                    <div class="">
                                        <label for="caddress"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <input type="text" name="xcAddress" value="{{$loanInfo->cmAddress}}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                            <x-input-error :messages="$errors->get('xcAddress')" class="mt-2" />
                                    </div>
                                </div>

                                <br> <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">Apply
                                    Loan</button><br>

                                </a><br />
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
               









</x-app-layout>
