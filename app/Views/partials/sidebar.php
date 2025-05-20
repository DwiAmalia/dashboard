<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="<?= route_to('index') ?>" class="sidebar-logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="site logo" class="light-logo">
            <img src="<?= base_url('assets/images/logo-light.png') ?>" alt="site logo" class="dark-logo">
            <img src="<?= base_url('assets/images/logo-icon.png') ?>" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="<?= route_to('index') ?>">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="<?= route_to('presensiData') ?>">
                    <iconify-icon icon="solar:face-scan-square-outline" class="menu-icon"></iconify-icon>
                    <span>Presensi</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('lapkinData') ?>">
                    <iconify-icon icon="solar:document-add-broken" class="menu-icon"></iconify-icon>
                    <span>Lapkin</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('izinData') ?>">
                    <iconify-icon icon="solar:confounded-square-broken" class="menu-icon"></iconify-icon>
                    <span>Izin</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('asnData') ?>">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Pegawai</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('pengaduanData') ?>">
                    <iconify-icon icon="tabler:message-circle-user" class="menu-icon"></iconify-icon>
                    <span>Pengaduan</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('faq') ?>">
                    <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
                    <span>FAQs</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('termsCondition') ?>">
                    <iconify-icon icon="octicon:info-24" class="menu-icon"></iconify-icon>
                    <span>Terms & Conditions</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('logout') ?>">
                    <iconify-icon icon="solar:logout-2-broken" class="menu-icon"></iconify-icon>
                    <span>Logout</span>
                </a>
            </li>


            <li class="sidebar-menu-group-title">UI Elements</li>
            <li>
                <a href="<?= route_to('calendar') ?>">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Calendar</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('invoiceList') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>
                    </li>
                    <li>
                        <a href="<?= route_to('invoicePreview') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>
                    </li>
                    <li>
                        <a href="<?= route_to('invoiceAdd') ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add new</a>
                    </li>
                    <li>
                        <a href="<?= route_to('invoiceEdit') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Edit</a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
                    <span>Forms</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('form') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Input Forms</a>
                    </li>
                    <li>
                        <a href="<?= route_to('formLayout') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Input Layout</a>
                    </li>
                    <li>
                        <a href="<?= route_to('formValidation') ?>"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Form Validation</a>
                    </li>
                    <li>
                        <a href="<?= route_to('wizard') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Form Wizard</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                    <span>Table</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('tableBasic') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Basic Table</a>
                    </li>
                    <li>
                        <a href="<?= route_to('tableData') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
                    <span>Chart</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('lineChart') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Line Chart</a>
                    </li>
                    <li>
                        <a href="<?= route_to('columnChart') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Column Chart</a>
                    </li>
                    <li>
                        <a href="<?= route_to('pieChart') ?>"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Pie Chart</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= route_to('widgets') ?>">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>Widgets</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('usersList') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
                    </li>
                    <li>
                        <a href="<?= route_to('usersGrid') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Users Grid</a>
                    </li>
                    <li>
                        <a href="<?= route_to('addUser') ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add User</a>
                    </li>
                    <li>
                        <a href="<?= route_to('viewProfile') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> View Profile</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line text-xl me-6 d-flex w-auto"></i>
                    <span>Role & Access</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('roleAaccess') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Role & Access</a>
                    </li>
                    <li>
                        <a href="<?= route_to('assignRole') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Assign Role</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Application</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
                    <span>Authentication</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('signin') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Sign In</a>
                    </li>
                    <li>
                        <a href="<?= route_to('signup') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Sign Up</a>
                    </li>
                    <li>
                        <a href="<?= route_to('forgotPassword') ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Forgot Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= route_to('gallery') ?>">
                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('pricing') ?>">
                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
                    <span>Pricing</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('blog') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Blog</a>
                    </li>
                    <li>
                        <a href="<?= route_to('blogDetails') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Blog Details</a>
                    </li>
                    <li>
                        <a href="<?= route_to('addBlog') ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add Blog</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= route_to('testimonials') ?>">
                    <i class="ri-star-line text-xl me-6 d-flex w-auto"></i>
                    <span>Testimonial</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('faq') ?>">
                    <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
                    <span>FAQs</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('error') ?>">
                    <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>
                    <span>404</span>
                </a>
            </li>

            <li>
                <a href="<?= route_to('comingSoon') ?>">
                    <i class="ri-rocket-line text-xl me-6 d-flex w-auto"></i>
                    <span>Coming Soon</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('maintenance') ?>">
                    <i class="ri-hammer-line text-xl me-6 d-flex w-auto"></i>
                    <span>Maintenance</span>
                </a>
            </li>
            <li>
                <a href="<?= route_to('blankPage') ?>">
                    <i class="ri-checkbox-multiple-blank-line text-xl me-6 d-flex w-auto"></i>
                    <span>Blank Page</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?= route_to('company') ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Company</a>
                    </li>
                    <li>
                        <a href="<?= route_to('notification') ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Notification</a>
                    </li>
                    <li>
                        <a href="<?= route_to('notificationAlert') ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Notification Alert</a>
                    </li>
                    <li>
                        <a href="<?= route_to('theme') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Theme</a>
                    </li>
                    <li>
                        <a href="<?= route_to('currencies') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Currencies</a>
                    </li>
                    <li>
                        <a href="<?= route_to('language') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Languages</a>
                    </li>
                    <li>
                        <a href="<?= route_to('paymentGateway') ?>"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>