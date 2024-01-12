<nav x-data="{ open: false }"  class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        
      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>
         
        <a href="#" class="flex ml-2 md:mr-24">
          <img src="data:image/png;base64,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" class="h-8 mr-3" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">LendWise</span>
        </a>
      
      </div>
      <div class="flex items-center">
      <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                <div>
                <svg class="sun cursor-pointer w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3V1m0 18v-2M5.05 5.05 3.636 3.636m12.728 12.728L14.95 14.95M3 10H1m18 0h-2M5.05 14.95l-1.414 1.414M16.364 3.636 14.95 5.05M14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                </svg>
                <svg class="moon cursor-pointer w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.509 5.75c0-1.493.394-2.96 1.144-4.25h-.081a8.5 8.5 0 1 0 7.356 12.746A8.5 8.5 0 0 1 8.509 5.75Z"/>
                </svg>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
  </div>
   <!-- Responsive Navigation Menu -->
   <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    
</nav>

<aside  id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <br>
    <ul class="py-4 my-4 space-y-2 font-medium border-y border-gray-200 dark:border-gray-700">
    <li>
            <a  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
            </svg>   
            @if (auth()->user()->is_admin)
                <span class="ml-3">ADMINISTRATOR</span>
            @else    
               <span class="ml-3">LOAN OFFICER</span>
            @endif
            </a>
         </li>
    </ul>
    
    


    <ul class="pt-4 mt-4 space-y-2 font-medium">
         <li>
            <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li> 
            <!-- LOAN OFFICERS NAVIGATION -->
            @if (auth()->user()->is_admin)
            <button id="dropdownDefaultButton" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('officer', 'add-officer') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}" aria-controls="Officer-Dropdown" data-collapse-toggle="Officer-Dropdown">
    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
    </svg>
    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">User Management</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>

<ul aria-labelledby="dropdownDefaultButton" id="Officer-Dropdown" class="{{ request()->routeIs('officer', 'add-officer') ? '' : 'hidden' }} py-2 space-y-2">
    <li>
        <a href="{{ route('add-officer') }}" class="nav-link {{ request()->routeIs('add-officer') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
            </svg>
            <span class="ml-2 whitespace-nowrap">Add New Account</span>
        </a>
    </li>
    <li>
        <a href="{{ route('officer') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
            </svg>
            <span class="ml-2 whitespace-nowrap">Manage Account</span>
        </a>
    </li>
</ul>

           
         </li>

         <!-- INTEREST RATE NAVIGATION -->
         <li>
         <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('interest') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}" aria-controls="dropdown-example" data-collapse-toggle="Interest-dropdown">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M17.5049 21.0029C15.5719 21.0029 14.0049 19.4359 14.0049 17.5029C14.0049 15.5699 15.5719 14.0029 17.5049 14.0029C19.4379 14.0029 21.0049 15.5699 21.0049 17.5029C21.0049 19.4359 19.4379 21.0029 17.5049 21.0029ZM17.5049 19.0029C18.3333 19.0029 19.0049 18.3314 19.0049 17.5029C19.0049 16.6745 18.3333 16.0029 17.5049 16.0029C16.6765 16.0029 16.0049 16.6745 16.0049 17.5029C16.0049 18.3314 16.6765 19.0029 17.5049 19.0029ZM6.50488 10.0029C4.57189 10.0029 3.00488 8.43593 3.00488 6.50293C3.00488 4.56993 4.57189 3.00293 6.50488 3.00293C8.43788 3.00293 10.0049 4.56993 10.0049 6.50293C10.0049 8.43593 8.43788 10.0029 6.50488 10.0029ZM6.50488 8.00293C7.33331 8.00293 8.00488 7.33136 8.00488 6.50293C8.00488 5.6745 7.33331 5.00293 6.50488 5.00293C5.67646 5.00293 5.00488 5.6745 5.00488 6.50293C5.00488 7.33136 5.67646 8.00293 6.50488 8.00293ZM19.076 3.51765L20.4902 4.93186L4.93382 20.4882L3.5196 19.074L19.076 3.51765Z">
                </path>
            </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Interest Rate</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="Interest-dropdown" class="py-2 space-y-2 {{ request()->routeIs('interest') ? '' : 'hidden' }}" >
                <li>
                    <a 
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg><span class="ml-2 whitespace-nowrap">Add New Interest</span></a>
                </li>
                <li>
                    <a href="{{ route('interest') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg><span class="ml-2 whitespace-nowrap">Manage Interest</span></a>
                </li>
            </ul>
            
         </li>
         @endif
    </ul>
         <ul class="pt-2 mt-10 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
         <button  id="dropdownDefaultButton1" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('borrower', 'add-borrower') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}" aria-controls="Borrower-Dropdown" data-collapse-toggle="Borrower-Dropdown">
         <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Borrowers</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
        <ul aria-labelledby="dropdownDefaultButton1" id="Borrower-Dropdown" class=" py-2 space-y-2"> 
         <li>
            <a href="{{ route('add-borrower') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Add New Borrowers</span>
            </a>
         </li>
         <li>
            <a href="{{ route('borrower') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z"/>
            </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Manage Borrowers</span>
            </a>
         </li>
         </ul>
<br>
         <li>
        <a href="{{ route('Loan') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('Loan') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Loan</span>
        </a>
         </li>
         <li>
            <a href="{{ route('payment') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('payment') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 9h2m3 0h5M1 5h18M2 1h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
            </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Payment</span>
            </a>
         </li>
<br><br><br>
         <li>
            <a href="{{ route('activity') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('activity') ? 'bg-gradient-to-r from-cyan-800 to-blue-800 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-800 text-white' : '' }}">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
  </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Activity Logs</span>
            </a>
         </li>
         
    </ul>

      

   </div>
   
</aside>





