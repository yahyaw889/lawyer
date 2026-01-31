<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('central.dashboard') }}" class="header-logo">
            <div class="logo-icon">
                <span class="logo-text-primary">إدارة</span>
                <span class="logo-text-secondary">HR</span>
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
                <li class="slide__category"><span class="category-name">القائمة الرئيسية</span></li>
                <!-- End::slide__category -->

                <!-- لوحة التحكم -->
                <li class="slide">
                    <a href="{{ route('central.dashboard') }}"
                        class="side-menu__item {{ request()->routeIs('central.dashboard') ? 'active' : '' }}">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">لوحة التحكم</span>
                    </a>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">الموارد البشرية</span></li>
                <!-- End::slide__category -->

                <!-- إدارة الموظفين -->
                <li class="slide has-sub {{ request()->routeIs('central.users.*') ? 'open' : '' }}">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-user-pin side-menu__icon"></i>
                        <span class="side-menu__label">الموظفين</span>
                        <i class="fe fe-chevron-left side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">الموظفين</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">قائمة الموظفين</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">إضافة موظف</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">الأقسام والمسميات</a>
                        </li>
                    </ul>
                </li>

                <!-- إدارة الشيفتات -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-time-five side-menu__icon"></i>
                        <span class="side-menu__label">إدارة الشيفتات</span>
                        <i class="fe fe-chevron-left side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">الشيفتات</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">جدول الشيفتات</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">أنواع الشيفتات</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">طلبات التبديل</a>
                        </li>
                    </ul>
                </li>

                <!-- الحضور والانصراف -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-fingerprint side-menu__icon"></i>
                        <span class="side-menu__label">الحضور والانصراف</span>
                        <i class="fe fe-chevron-left side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">الحضور</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">سجل الحضور اليومي</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">تقارير التأخير</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">المغادرات والأذونات</a>
                        </li>
                    </ul>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">الإدارة والتقارير</span></li>
                <!-- End::slide__category -->

                <!-- التقارير -->
                <li class="slide">
                    <a href="#" class="side-menu__item">
                        <i class="bx bx-bar-chart-alt-2 side-menu__icon"></i>
                        <span class="side-menu__label">التقارير والإحصائيات</span>
                    </a>
                </li>

                <!-- الإعدادات -->
                <li class="slide">
                    <a href="{{ route('central.settings.index') }}" class="side-menu__item">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">إعدادات النظام</span>
                    </a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

    <script>
        // Update support unread count
        function updateSupportBadge() {
            fetch('{{ route('central.settings.notifications') }}')
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById('support-unread-badge');
                    if (badge && data.support_unread !== undefined) {
                        badge.textContent = data.support_unread;
                        badge.style.display = data.support_unread > 0 ? 'inline-block' : 'none';
                    }
                })
                .catch(error => console.error('Error updating support badge:', error));
        }

        // Update on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateSupportBadge();
            // Update every 30 seconds
            setInterval(updateSupportBadge, 30000);
        });
    </script>

</aside>
