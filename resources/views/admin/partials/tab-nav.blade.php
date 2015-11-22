<ul class="nav nav-tabs nav-justified">
  <li role="presentation" class="{{ Helper::setActive(['admin/dashboard/customers', 'admin/dashboard']) }}">
    <a href="{{ route('admin.dashboard.customers') }}">Customers</a>
  </li>
  <li role="presentation" class="{{ Helper::setActive('admin/dashboard/dvds') }}">
    <a href="{{ route('admin.dashboard.dvds') }}">DVDs</a>
  </li>
  <li role="presentation" class="{{ Helper::setActive('admin/dashboard/rentals') }}">
    <a href="{{ route('admin.dashboard.rentals') }}">Rentals</a>
  </li>
</ul>