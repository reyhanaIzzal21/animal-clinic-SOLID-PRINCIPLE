<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[0] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">
        <div class="text-nowrap flex justify-center items-center">
            <img src="{{ asset('assets/images/profile/logo.png') }}" alt="Logo-Dark" class="w-[5rem]" />
            <h2 class="text-black text-2xl font-semibold">PetCare</h2>
        </div>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-gray-600 text-sm [&>li]:mb-2">
                    <li class="text-xs font-bold pb-4">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>MASTER</span>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-[#FBA518]"
                            href="{{ route('customers.index') }}">
                            <i class="ti ti-layout-dashboard  text-xl"></i> <span>Customers</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-white hover:bg-[#FBA518]"
                            href="{{ route('pets.index') }}">
                            <i class="ti ti-cat  text-xl"></i> <span>Pets</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-white hover:bg-[#FBA518]"
                            href="{{ route('services.index') }}">
                            <i class="ti ti-server  text-xl"></i> <span>Services</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-white hover:bg-[#FBA518]"
                            href="{{ route('doctors.index') }}">
                            <i class="ti ti-nurse  text-xl"></i> <span>Doctors</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-white hover:bg-[#FBA518]"
                            href="{{ route('transactions.index') }}">
                            <i class="ti ti-credit-card-pay  text-xl"></i> <span>Transactions</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- </aside> -->
</aside>
