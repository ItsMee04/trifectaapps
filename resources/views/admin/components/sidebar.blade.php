<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="@if (request()->route()->uri == 'dashboard-admin') active @endif">
                            <a href="/dashboard-admin"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Master Data</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="
                            @if (request()->route()->uri == 'profession' ||
                                    request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'typeproduct' ||
                                    request()->route()->uri == 'role') active subdrop @endif">
                                <i data-feather="server"></i><span>Reference</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="/profession"
                                        class="@if (request()->route()->uri == 'profession') active @endif">Profession</a></li>
                                <li><a href="/categories"
                                        class="@if (request()->route()->uri == 'categories') active @endif">Categories</a>
                                </li>
                                <li><a href="/typeproduct" class="@if (request()->route()->uri == 'typeproduct') active @endif">Type
                                        Product</a>
                                </li>
                                <li><a href="/role" class="@if (request()->route()->uri == 'role') active @endif">Access
                                        Role</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="
                            @if (request()->route()->uri == 'product' ||
                                    request()->route()->uri == 'product/{id}' ||
                                    request()->route()->uri == 'product-details/{id}' ||
                                    request()->route()->uri == 'scanbarcode') active subdrop @endif"><i
                                    data-feather="box"></i><span>Product</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="/product" class="@if (request()->route()->uri == 'product' ||
                                        request()->route()->uri == 'product/{id}' ||
                                        request()->route()->uri == 'product-details/{id}') active @endif">Item
                                        Product</a></li>
                                <li><a href="/scanbarcode" class="@if (request()->route()->uri == 'scanbarcode') active @endif">Scan
                                        Barcode</a></li>
                            </ul>
                        </li>
                        <li><a href="/supplier" class="@if (request()->route()->uri == 'supplier') active @endif"><i
                                    data-feather="codepen"></i><span>Suplier</span></a></li>
                        <li><a href="/customer" class="@if (request()->route()->uri == 'customer' || request()->route()->uri == 'edit-customer/{id}') active @endif"><i
                                    data-feather="users"></i><span>Customer</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="
                            @if (request()->route()->uri == 'employee' ||
                                    request()->route()->uri == 'employee/{id}' ||
                                    request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'edit-users/{id}') active subdrop @endif"><i
                                    data-feather="users"></i><span>Manage Users</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="/employee"
                                        class="@if (request()->route()->uri == 'employee' || request()->route()->uri == 'employee/{id}') active @endif">Employee </a></li>
                                <li><a href="/users" class="@if (request()->route()->uri == 'users') active @endif">Employee
                                        Users</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Sales Transaction</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="@if (request()->route()->uri == 'shopping-cart' ||
                                        request()->route()->uri == 'orders' ||
                                        request()->route()->uri == 'orders/{id}' ||
                                        request()->route()->uri == 'orders-details/{id}') active subdrop @endif"><i
                                    data-feather="shopping-cart"></i><span>Transaction</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="/shopping-cart"
                                        class="@if (request()->route()->uri == 'shopping-cart' || request()->route()->uri == 'shopping-cart/{id}') active @endif">Shopping Cart</a></li>
                                <li><a href="/orders"
                                        class="@if (request()->route()->uri == 'orders' || request()->route()->uri == 'orders-details/{id}') active @endif">Orders</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="@if (request()->route()->uri == 'purchase' ||
                                        request()->route()->uri == 'edit-purchase/{id}' ||
                                        request()->route()->uri == 'purchase-supplier' ||
                                        request()->route()->uri == 'edit-purchase-supplier/{id}') active subdrop @endif"><i
                                    data-feather="credit-card"></i><span>Purchase</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="/purchase"
                                        class="@if (request()->route()->uri == 'purchase' || request()->route()->uri == 'edit-purchase/{id}') active @endif">Purchase</a></li>
                                <li><a href="/purchase-supplier"
                                        class="@if (request()->route()->uri == 'purchase-supplier' || request()->route()->uri == 'edit-purchase-supplier/{id}') active @endif">Purchase
                                        Suplier</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li><a href="salesreport.html"><i data-feather="bar-chart-2"></i><span>Sales Report</span></a>
                        </li>
                        <li><a href="purchaseorderreport.html"><i data-feather="pie-chart"></i><span>Purchase
                                    report</span></a></li>
                        <li><a href="inventoryreport.html"><i data-feather="credit-card"></i><span>Inventory
                                    Report</span></a></li>
                        <li><a href="invoicereport.html"><i data-feather="file"></i><span>Invoice Report</span></a>
                        </li>
                        <li><a href="purchasereport.html"><i data-feather="bar-chart"></i><span>Purchase
                                    Report</span></a></li>
                        <li><a href="supplierreport.html"><i data-feather="database"></i><span>Supplier
                                    Report</span></a></li>
                        <li><a href="customerreport.html"><i data-feather="pie-chart"></i><span>Customer
                                    Report</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
