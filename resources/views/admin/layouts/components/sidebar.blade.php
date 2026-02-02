<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="header-logo">
            <div class="logo-icon">
                <span class="logo-text-primary text-xl font-bold"
                    style="font-family: 'Montserrat', sans-serif;">ΛMN</span>
                <span class="logo-text-secondary text-[0.65rem]">GLOBAL LAW FIRM</span>
            </div>
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">الرئيسية</span></li>
                <!-- End::slide__category -->

                <!-- لوحة التحكم -->
                <li class="slide">
                    <a href="{{ route('admin.dashboard') }}"
                        class="side-menu__item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">لوحة التحكم</span>
                    </a>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">إدارة القضايا</span></li>
                <!-- End::slide__category -->

                <!-- طلبات الاستشارة -->
                <li class="slide">
                    <a href="{{ route('admin.consultations.index') }}" class="side-menu__item">
                        <i class="bx bx-conversation side-menu__icon"></i>
                        <span class="side-menu__label">طلبات الاستشارة</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.requests.index') }}" class="side-menu__item">
                        <i class="bx bx-conversation side-menu__icon"></i>
                        <span class="side-menu__label">طلبات الخدمات</span>
                    </a>
                </li>






                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">الشؤون المالية والإدارية</span></li>
                <!-- End::slide__category -->

                <!-- المالية -->
                <li class="slide">
                    <a href="#" class="side-menu__item">
                        <i class="bx bx-dollar-circle side-menu__icon"></i>
                        <span class="side-menu__label">الفواتير والمدفوعات</span>
                    </a>
                </li>

                <!-- التقارير -->
                <li class="slide">
                    <a href="#" class="side-menu__item">
                        <i class="bx bx-bar-chart-alt-2 side-menu__icon"></i>
                        <span class="side-menu__label">التقارير</span>
                    </a>
                </li>

                <!-- الإعدادات -->
                <li class="slide">
                    <a href="#" class="side-menu__item">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">الإعدادات العامة</span>
                    </a>
                </li>

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.contacts.index') }}" class="side-menu__item">
                        <i class="bx bx-envelope side-menu__icon"></i>
                        <span class="side-menu__label">رسائل التواصل</span>
                    </a>
                </li>
                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

    <!-- Start::sidebar-footer -->
    <div class="sidebar-footer text-center p-3 border-top mt-auto">
        <span class="text-muted d-block" style="font-size: 0.75rem;">
            © {{ date('Y') }} AMN Global Law Firm
        </span>
    </div>
    <!-- End::sidebar-footer -->

    <script>
        // Ensure sidebar has flex column layout to push footer to bottom
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.style.display = 'flex';
                sidebar.style.flexDirection = 'column';

                var mainSidebar = document.querySelector('.main-sidebar');
                if (mainSidebar) {
                    mainSidebar.style.flex = '1';
                    mainSidebar.style.overflowY = 'auto';
                }
            }
        });
    </script>

    <script>
        // Remove broken support badge logic for now
    </script>

</aside>
