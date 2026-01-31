<script>
    // تنظيف localStorage من القيم القديمة - يتم تنفيذه فوراً قبل أي كود آخر
    (function() {
        'use strict';
        // مسح قيم RTL/LTR القديمة
        localStorage.removeItem('ynexrtl');
        localStorage.removeItem('ynexltr');
    })();
</script>
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


            <!-- Start::header-element Cache Clear Button -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a href="javascript:void(0);" class="header-link" title="مسح الذاكرة المؤقتة" onclick="clearCache()">
                    <i class="bx bx-refresh header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <i class="bx bx-bell header-link-icon"></i>
                    <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                        id="notification-icon-badge">0</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none"
                    style="min-width: 360px; max-width: 400px;">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">الإشعارات</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data">0 غير مقروءة</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll"
                        style="max-height: 350px; overflow-y: auto;  display: contents;">
                        <!-- سيتم ملؤها ديناميكياً -->
                    </ul>
                    <div class="p-3 empty-header-item1 border-top">
                        <div class="d-grid gap-2">
                            <button onclick="markAllAsRead()" class="btn btn-sm btn-light border">
                                <i class="ti ti-check-all me-1"></i> تحديد الكل كمقروء
                            </button>
                            <a href="{{ route('central.support.index') }}" class="btn btn-sm btn-light border">
                                <i class="ti ti-headset me-1"></i> الدعم الفني
                            </a>
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
                    <div class="p-5 empty-item1 d-none">
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
                    loadNotifications();
                    // تحديث الإشعارات كل 30 ثانية
                    setInterval(loadNotifications, 30000);
                });

                function loadNotifications() {
                    fetch('{{ route('central.settings.notifications') }}')
                        .then(response => response.json())
                        .then(data => {
                            updateNotificationBadge(data.total_unread);
                            updateNotificationList(data);
                        })
                        .catch(error => console.error('Error loading notifications:', error));
                }

                function updateNotificationBadge(count) {
                    const badge = document.getElementById('notification-icon-badge');
                    const notificationData = document.getElementById('notifiation-data');

                    if (badge) {
                        badge.textContent = count;
                        badge.style.display = count > 0 ? 'inline-block' : 'none';
                    }

                    if (notificationData) {
                        notificationData.textContent = count + ' غير مقروءة';
                    }


                    const emptyItem = document.querySelector('.empty-item1');
                    const headerItem = document.querySelector('.empty-header-item1');

                    if (count === 0) {
                        if (emptyItem) emptyItem.classList.remove('d-none');
                        if (headerItem) headerItem.classList.add('d-none');
                    } else {
                        if (emptyItem) emptyItem.classList.add('d-none');
                        if (headerItem) headerItem.classList.remove('d-none');
                    }
                }

                function updateNotificationList(data) {
                    const notificationList = document.getElementById('header-notification-scroll');
                    if (!notificationList) return;

                    notificationList.innerHTML = '';

                    // إضافة رسائل الدعم الفني
                    if (data.recent_support_chats) {
                        data.recent_support_chats.forEach(chat => {
                            const li = createSupportNotification(chat);
                            notificationList.appendChild(li);
                        });
                    }

                    // إضافة رسائل التواصل
                    data.recent_contacts.forEach(contact => {
                        const li = createContactNotification(contact);
                        notificationList.appendChild(li);
                    });

                    // إضافة طلبات النسخة التجريبية
                    data.recent_trials.forEach(trial => {
                        const li = createTrialNotification(trial);
                        notificationList.appendChild(li);
                    });


                    data.recent_offers.forEach(offer => {
                        const li = createOfferNotification(offer);
                        notificationList.appendChild(li);
                    });
                }

                function createSupportNotification(chat) {
                    const li = document.createElement('li');
                    li.className = 'dropdown-item';
                    li.style.cursor = 'pointer';
                    li.onclick = function() {
                        window.location.href = `/central/support/${chat.id}`;
                    };

                    const tenantName = chat.tenant ? chat.tenant.name : `مستأجر #${chat.tenant_id}`;
                    const unreadCount = chat.unread_messages_count || 0;

                    li.innerHTML = `
                        <div class="d-flex align-items-start">
                            <div class="pe-2">
                                <span class="avatar avatar-md bg-info-transparent avatar-rounded">
                                    <i class="ti ti-headset fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-semibold text-info">
                                    رسالة دعم فني جديدة
                                </p>
                                <span class="text-muted fw-normal fs-12 header-notification-text">
                                    من: ${tenantName} - ${chat.subject}
                                </span>
                            </div>
                        </div>
                    `;
                    return li;
                }

                function createContactNotification(contact) {
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

                function createTrialNotification(trial) {
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

                function createOfferNotification(offer) {
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

                function markAllAsRead() {
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
                                loadNotifications();
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
                            <p class="fw-semibold mb-0 lh-1 mx-2">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex" href="{{ route('central.profile.index') }}"><i
                                class="ti ti-user-circle fs-18 me-2 op-7"></i>الملف الشخصي</a></li>
                    <li><a class="dropdown-item d-flex" href="{{ route('central.settings.index') }}"><i
                                class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i>الإعدادات</a></li>
                    <li><a class="dropdown-item d-flex" href="{{ route('central.support.index') }}"><i
                                class="ti ti-headset fs-18 me-2 op-7"></i>الدعم</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="d-no ne" id="logout-form">
                            @csrf
                        </form>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout fs-18 me-2 op-7"></i>تسجيل الخروج
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|switcher-icon -->
                <a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                    data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

    <script>
        function clearCache() {
            if (confirm('هل تريد مسح جميع الذاكرة المؤقتة؟ سيتم مسح localStorage وcache الخادم.')) {
                // مسح localStorage أولاً
                try {
                    localStorage.clear();
                    console.log('✅ تم مسح localStorage بنجاح');
                } catch (e) {
                    console.error('❌ خطأ في مسح localStorage:', e);
                }

                // مسح cache الخادم
                fetch('{{ route('central.clear-cache') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // مسح localStorage مرة أخرى للتأكد
                            localStorage.clear();
                            alert(
                                '✅ تم مسح الذاكرة المؤقتة بنجاح!\n\n• تم مسح localStorage\n• تم مسح cache الخادم\n\nسيتم تحديث الصفحة الآن...');
                            // تأخير بسيط قبل إعادة التحميل للتأكد من مسح localStorage
                            setTimeout(() => {
                                location.reload(true); // force reload
                            }, 100);
                        } else {
                            alert('❌ حدث خطأ: ' + (data.message || 'غير معروف'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // حتى لو فشل مسح cache الخادم، localStorage تم مسحه
                        alert('⚠️ تم مسح localStorage ولكن حدث خطأ في مسح cache الخادم.\n\nسيتم تحديث الصفحة...');
                        setTimeout(() => {
                            location.reload(true);
                        }, 100);
                    });
            }
        }
    </script>

</header>
