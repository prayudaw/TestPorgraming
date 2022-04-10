<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.index')}}">
                  <span data-feather="file"></span>
                  Companies
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.index')}}">
                  <span data-feather="file"></span>
                  Employees
                </a>
            </li>
        </ul>
    </div>
</nav>