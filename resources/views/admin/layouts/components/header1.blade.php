<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ url('index') }}" class="header-logo">
                        <img src="{{ asset('img/logo.jpeg') }}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('build/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                            class="desktop-dark">
                        <img src="{{ asset('build/assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                            class="toggle-dark">
                        <img src="{{ asset('build/assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                            class="desktop-white">
                        <img src="{{ asset('build/assets/images/brand-logos/toggle-white.png') }}" alt="logo"
                            class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <!-- Start::header-element -->
            <div class="header-element header-search">
                <!-- Start::header-link -->
                <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="bx bx-search-alt-2 header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element country-selector">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('build/assets/images/flags/us_flag.jpg') }}" alt="img"
                        class="rounded-circle header-link-icon">
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/us_flag.jpg') }}" alt="img">
                            </span>
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/spain_flag.jpg') }}" alt="img">
                            </span>
                            Spanish
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/french_flag.jpg') }}" alt="img">
                            </span>
                            French
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/germany_flag.jpg') }}" alt="img">
                            </span>
                            German
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/italy_flag.jpg') }}" alt="img">
                            </span>
                            Italian
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('build/assets/images/flags/russia_flag.jpg') }}" alt="img">
                            </span>
                            Russian
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-moon header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element cart-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                    data-bs-toggle="dropdown">
                    <i class="bx bx-cart header-link-icon"></i>
                    <span class="badge bg-primary rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                            <span class="badge bg-success-transparent" id="cart-data">5 Items</span>
                        </div>
                    </div>
                    <div>
                        <hr class="dropdown-divider">
                    </div>
                    <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('build/assets/images/ecommerce/jpg/1.jpg') }}" alt="img"
                                    class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="javascript:void(0);">SomeThing Phone</a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$1,299.00</span>
                                            <a href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item d-flex">
                                            <li>Metallic Blue</li>
                                            <li>6gb Ram</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('build/assets/images/ecommerce/jpg/3.jpg') }}" alt="img"
                                    class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="javascript:void(0);">Stop Watch</a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$179.29</span>
                                            <a href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item">
                                            <li>Analog</li>
                                            <li><span class="badge bg-pink-transparent fs-10">Free shipping</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('build/assets/images/ecommerce/jpg/5.jpg') }}" alt="img"
                                    class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="javascript:void(0);">Photo Frame</a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$29.00</span>
                                            <a href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item d-flex">
                                            <li>Decorative</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('build/assets/images/ecommerce/jpg/4.jpg') }}" alt="img"
                                    class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="javascript:void(0);">Kikon Camera</a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$4,999.00</span>
                                            <a href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item d-flex">
                                            <li>Black</li>
                                            <li>50MM</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('build/assets/images/ecommerce/jpg/6.jpg') }}" alt="img"
                                    class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="javascript:void(0);">Canvas Shoes</a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$129.00</span>
                                            <a href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item d-flex">
                                            <li>Gray</li>
                                            <li>Sports</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item border-top">
                        <div class="d-grid">
                            <a href="javascript:void(0);" class="btn btn-primary">Proceed to checkout</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-warning-transparent">
                                <i class="ri-shopping-cart-2-line fs-2"></i>
                            </span>
                            <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                            <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                            <a href="javascript:void(0);" class="btn btn-primary btn-wave btn-sm m-1"
                                data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <i class="bx bx-bell header-link-icon"></i>
                    <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                        id="notification-icon-badge-h1">0</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none"
                    style="min-width: 360px; max-width: 400px;">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">الإشعارات</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data-h1">0 غير مقروءة</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll-h1"
                        style="max-height: 350px; overflow-y: auto;">
                        <!-- سيتم ملؤها ديناميكياً -->
                    </ul>
                    <div class="p-3 empty-header-item1-h1 border-top">
                        <div class="d-grid gap-2">
                            <button onclick="markAllAsReadH1()" class="btn btn-sm btn-light border">
                                <i class="ti ti-check-all me-1"></i> تحديد الكل كمقروء
                            </button>
                            <a href="{{ route('central.contact-us.index') }}" class="btn btn-sm btn-light border">
                                <i class="ti ti-mail me-1"></i> رسائل التواصل
                            </a>
                            <a href="{{ route('central.trials.index') }}" class="btn btn-sm btn-light border">
                                <i class="ti ti-user-plus me-1"></i> طلبات النسخة التجريبية
                            </a>
                            <a href="{{ route('central.offers.index') }}" class="btn btn-sm btn-light border">
                                <i class="ti ti-gift me-1"></i> طلبات العروض
                            </a>
                        </div>
                    </div>
                    <div class="p-5 empty-item1-h1 d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                <i class="ri-notification-off-line fs-2"></i>
                            </span>
                            <h6 class="fw-semibold mt-3">لا توجد إشعارات جديدة</h6>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <script>
                // تحميل الإشعارات عند فتح الصفحة
                document.addEventListener('DOMContentLoaded', function() {
                    loadNotificationsH1();
                    // تحديث الإشعارات كل 30 ثانية
                    setInterval(loadNotificationsH1, 30000);
                });

                function loadNotificationsH1() {
                    fetch('{{ route('central.settings.notifications') }}')
                        .then(response => response.json())
                        .then(data => {
                            updateNotificationBadgeH1(data.total_unread);
                            updateNotificationListH1(data);
                        })
                        .catch(error => console.error('Error loading notifications:', error));
                }

                function updateNotificationBadgeH1(count) {
                    const badge = document.getElementById('notification-icon-badge-h1');
                    const notificationData = document.getElementById('notifiation-data-h1');

                    if (badge) {
                        badge.textContent = count;
                        badge.style.display = count > 0 ? 'inline-block' : 'none';
                    }

                    if (notificationData) {
                        notificationData.textContent = count + ' غير مقروءة';
                    }

                    // إظهار/إخفاء رسالة "لا توجد إشعارات"
                    const emptyItem = document.querySelector('.empty-item1-h1');
                    const headerItem = document.querySelector('.empty-header-item1-h1');

                    if (count === 0) {
                        if (emptyItem) emptyItem.classList.remove('d-none');
                        if (headerItem) headerItem.classList.add('d-none');
                    } else {
                        if (emptyItem) emptyItem.classList.add('d-none');
                        if (headerItem) headerItem.classList.remove('d-none');
                    }
                }

                function updateNotificationListH1(data) {
                    const notificationList = document.getElementById('header-notification-scroll-h1');
                    if (!notificationList) return;

                    notificationList.innerHTML = '';

                    // إضافة رسائل التواصل
                    data.recent_contacts.forEach(contact => {
                        const li = createContactNotificationH1(contact);
                        notificationList.appendChild(li);
                    });

                    // إضافة طلبات النسخة التجريبية
                    data.recent_trials.forEach(trial => {
                        const li = createTrialNotificationH1(trial);
                        notificationList.appendChild(li);
                    });

                    // إضافة طلبات العروض
                    data.recent_offers.forEach(offer => {
                        const li = createOfferNotificationH1(offer);
                        notificationList.appendChild(li);
                    });
                }

                function createContactNotificationH1(contact) {
                    const li = document.createElement('li');
                    li.className = 'dropdown-item';
                    li.style.cursor = 'pointer';
                    li.onclick = function() {
                        window.location.href = '{{ route('central.contact-us.index') }}';
                    };
                    li.innerHTML = `
                        <div class="d-flex align-items-start">
                            <div class="pe-2">
                                <span class="avatar avatar-md bg-primary-transparent avatar-rounded">
                                    <i class="ti ti-mail fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-semibold text-primary">
                                    رسالة تواصل جديدة
                                </p>
                                <span class="text-muted fw-normal fs-12 header-notification-text">
                                    من: ${contact.name} - ${contact.email}
                                </span>
                            </div>
                        </div>
                    `;
                    return li;
                }

                function createTrialNotificationH1(trial) {
                    const li = document.createElement('li');
                    li.className = 'dropdown-item';
                    li.style.cursor = 'pointer';
                    li.onclick = function() {
                        window.location.href = '{{ route('central.trials.index') }}';
                    };
                    li.innerHTML = `
                        <div class="d-flex align-items-start">
                            <div class="pe-2">
                                <span class="avatar avatar-md bg-success-transparent avatar-rounded">
                                    <i class="ti ti-user-plus fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-semibold text-success">
                                    طلب نسخة تجريبية جديد
                                </p>
                                <span class="text-muted fw-normal fs-12 header-notification-text">
                                    من: ${trial.company_name} - ${trial.manager_name}
                                </span>
                            </div>
                        </div>
                    `;
                    return li;
                }

                function createOfferNotificationH1(offer) {
                    const li = document.createElement('li');
                    li.className = 'dropdown-item';
                    li.style.cursor = 'pointer';
                    li.onclick = function() {
                        window.location.href = '{{ route('central.offers.index') }}';
                    };
                    li.innerHTML = `
                        <div class="d-flex align-items-start">
                            <div class="pe-2">
                                <span class="avatar avatar-md bg-warning-transparent avatar-rounded">
                                    <i class="ti ti-gift fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-semibold text-warning">
                                    طلب عرض جديد
                                </p>
                                <span class="text-muted fw-normal fs-12 header-notification-text">
                                    من: ${offer.name} - ${offer.business_type || 'غير محدد'}
                                </span>
                            </div>
                        </div>
                    `;
                    return li;
                }

                function markAllAsReadH1() {
                    fetch('{{ route('central.settings.notifications.mark-all-read') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                loadNotificationsH1();
                                // إغلاق الـ dropdown
                                const dropdown = document.getElementById('messageDropdown');
                                if (dropdown) {
                                    const bsDropdown = bootstrap.Dropdown.getInstance(dropdown);
                                    if (bsDropdown) bsDropdown.hide();
                                }
                            }
                        })
                        .catch(error => console.error('Error marking as read:', error));
                }
            </script>


            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                    <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="{{ asset('img/logo.jpeg') }}" alt="img" width="32" height="32"
                                class="rounded-circle">
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex" href="javascript:void(0);"><i
                                class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                    <li><a class="dropdown-item d-flex" href="javascript:void(0);"><i
                                class="ti ti-headset fs-18 me-2 op-7"></i>Support</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form-1">
                            @csrf
                        </form>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"
                            onclick="event.preventDefault(); document.getElementById('logout-form-1').submit();">
                            <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
