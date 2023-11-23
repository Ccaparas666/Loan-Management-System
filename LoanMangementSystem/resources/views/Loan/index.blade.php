<x-app-layout>

    <div class="p-4 sm:ml-64" id="hide">
        <div class="  mt-2">
            <div>
                <div class="py-10"></div>
                <div class="flex">
                    <div class="flex items-center me-4">
                        <a href="{{ route('Loan') }}" class="dark:bg-blue-500 bg-blue-500 flex items-center text-gray-200 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"> 
                            <svg class="w-[20px] h-[20px] mx-2 text-gray-800 dark:text-white" aria-hidden=?true? xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 1v16M1 9h16" />
                            </svg>CREATE NEW LOAN 
                        </a>
                        <a href="{{ route('new-loan') }}" class="flex items-center text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-gray-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                            </svg>NEW LOAN
                        </a>
                        <a href="{{ route('rejected-loan') }}" class="flex items-center text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            REJECTED LOANS
                        </a>
                        <a href="{{ route('approved-loan') }}" class="flex items-center text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20"> 
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z" />
                            </svg>APPROVED LOANS
                        </a>
                        <a href="{{ route('paid-loan') }}" class="flex items-center text-gray-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-gray-50 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                            </svg>PAID LOANS
                        </a>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black-900 dark:text-gray-100 ">
                        <div>
                            <div
                                class="text-gray-50 bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 dark:focus:ring-cyan-800 overflow-hidden shadow-sm sm:rounded-lg text-center py-2 mb-5 text-2xl font-bold dark:text-white">
                                <div class="p-6 text-black-900 dark:text-gray-100">
                                    {{ __('Loan Application Form') }}
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
                            
                            
                            @endif
                    </div>
                    @foreach ($data as $borinfo)   @endforeach  
                        <div class="input-group no-border mb-5">
                           
                            <form action="{{ route('search', ['brno' => $borinfo->bno]) }}" method="GET">  
                                @if(isset($search))
                                    <label for="Birth Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Borrower Account No.</label>    
                                    <div class="relative w-full"> 
                                    
                                        <input type="search" name="search" id="location-search" value="{{$borinfo->borAccount}}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <button type="submit" value="search" class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                                <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                @else
                                <label for="Birth Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Borrower Account No.</label>    
                                    <div class="relative w-full"> 
                                        <input type="search" name="search" id="location-search"  class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search For Borrower Account Number e.g BAC-XXXXX" required>
                                        <button type="submit" value="search" class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                                <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                @endif 
                                
                            </form>
                        </div>
                       
                                       


                                    
                                       
                            <form method="POST" action="{{ route('Loan-store') }}" id="vedformid">
                                @csrf
                                <!-- /////////////////////// -->

                               

                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                    <div>
                                        <label for="Loan no."
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan
                                            No.</label>
                                        <input type="text" name="xLoanNumber" value="{{$genId}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{$genId}}" disabled>
                                    </div>
                                    <div>
                                        <label for="Interest Rate"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest
                                            Rate</label>
                                        <select id="default" name="xInterest"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="1">0.5%</option>
                                            <option value="1">01%</option>
                                            <option value="5">05%</option>
                                            <option value="10">10%</option>
                                            <option value="10">{{$genId}}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="Loan Term"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan
                                            Term</label>
                                        <select id="default" name="xLoanTerm"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">12 Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                 
                                    <div>
                                        <label for="Loan Amount" 
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan
                                            Amount</label>
                                        <input type="text" name="xLoanAmount" value="{{ old('xLoan') }}"
                                            class=" w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                            <input type="hidden" name="xbno" value="{{ $borinfo->bno }}" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                                    </div>

                                    <div>
                                        <label for="LoanDate" 
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                        <input type="date" name="xLoanDate"
                                            class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required />
                                    </div>

                                </div>

                               
                                <div
                                    class="shadow-lg shadow-gray-500/50 border-b text-xl my-6 py-6 text-black-900 dark:text-gray-100">
                                    <h1>BORROWER INFORMATION</h1>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-4">
                               
                                    <div>
                                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                            @if(isset($search))
                                                <input type="text"  name="xFullname" value="{{ $borinfo->borFname }} {{ $borinfo->borMname }} {{ $borinfo->borLname }} {{ $borinfo->borSuffix }}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                            @else
                                                <input type="text"  value="" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                            @endif
                                        
                                    </div>
                                    <div>
                                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                        @if(isset($search))
                                            <input type="text"  name="xContact" value="{{ $borinfo->borContact }}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @else
                                            <input type="text"  value="" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        @if(isset($search))
                                            <input type="text"   name="xemail" value="{{ $borinfo->borEmail }}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @else
                                            <input type="text"  value="" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="Birth Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                                        @if(isset($search))
                                            <input type="date"  name="xBirth" value = "{{ $borinfo->borDob }}" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                                        @else
                                            <input type="text"  value="" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @endif
                                    </div>
                                    <div class="col-span-4">
                                        <label for="Address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        @if(isset($search))
                                            <input type="text"  name="xAddress" value="{{ $borinfo->borAddress }}" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        @else
                                            <input type="text"  value="" class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled required>
                                        @endif
                                    </div>
                                   
                                </div>


                                <div
                                    class="shadow-lg shadow-gray-500/50 border-b text-xl my-6 py-6 text-black-900 dark:text-gray-100">
                                    <h1>CO-MAKER INFO</h1>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-4">
                                    <div>
                                        <label for="C name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                        <input type="text" name="xcFullname" value="{{ old('xaddress') }}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="c contact"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                            Number</label>
                                        <input type="text" name="xcContact" value="{{ old('xcontact') }}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="e.g 09123456789" required>
                                    </div>
                                    <div>
                                        <label for="c email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" name="xcEmail" value="{{ old('xcontact') }}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="e.g 09123456789" required>
                                    </div>
                                    <div class="">
                                        <label for="c address"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <input type="text" name="xcAddress" value="{{ old('xaddress') }}"
                                            class="w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                </div>

                                <br> <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-500">Apply
                                    Loan</button><br>

                                </a><br />
                            </form>
                        </div>
                    </div>
                </div>


<!-- <script>
    
$(document).ready(function () {
    $('#searchdata').click(function (e){
        e.preventDefault();

        var id = $('input[name-id]').val();

        $.ajax({
            type:"POST",
            url:"fetchintextbox.php",
            data: {
                "search_post_btn": 1,
                "id": id,
            },
            dataType: "text",
            success: function (response){
                $("#vedformid").html(response);
            }
        });

    });
});

</script> -->

</x-app-layout>
