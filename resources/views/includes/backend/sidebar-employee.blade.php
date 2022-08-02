<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title">
          <span>Main</span>
        </li>
        <li class="{{ route_is('employees.logged.dashboard') ? 'active' : '' }}">
          <a href="{{route('employees.logged.dashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
        </li>
        <li class="menu-title">
          <span>Employees</span>
        </li>
        <li class="{{ route_is('employees.logged.clients.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.clients.index')}}"><i class="la la-users"></i> <span>Clients</span></a>
        </li>
        <li class="{{ route_is('employees.logged.clients.types.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.clients.types.index')}}"><i class="la la-gift"></i>
            <span>Client Types</span></a>
        </li>
        <li class="{{ route_is('employees.logged.labels.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.labels.index')}}"><i class="la la-tags"></i> <span>Public Labels</span></a>
        </li>
        <li class="{{ route_is('employees.logged.flags.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.flags.index')}}"><i class="la la-flag"></i> <span>Flags</span></a>
        </li>
        <li class="{{ route_is('employees.logged.document.types.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.document.types.index')}}"><i class="la la-file-archive-o"></i>
            <span>Document Types</span></a>
        </li>
        <li class="menu-title">
          <span>Tasks</span>
        </li>
        <li class="{{ route_is('employees.logged.tasks.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.tasks.index')}}"><i class="la la-tasks"></i> <span>Tasks</span></a>
        </li>
        <li class="{{ route_is('employees.logged.tasks.types.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.tasks.types.index')}}"><i class="la la-stumbleupon"></i>
            <span>Task Types</span></a>
        </li>
        <li class="menu-title">
          <span>Files Details</span>
        </li>
        <li class="{{ route_is('employees.logged.files.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.files.index')}}"><i class="la la-folder-open"></i>
            <span>Files</span></a>
        </li>
        <li class="{{ route_is('employees.logged.files.types.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.files.types.index')}}"><i class="la la-file-text-o"></i>
            <span>File Types</span></a>
        </li>
        <li class="{{ route_is('employees.logged.files.status.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.files.status.index')}}"><i class="la la-tachometer"></i>
            <span>File Status</span></a>
        </li>
        <li class="{{ route_is('employees.logged.files.type') ? 'active' : '' }}">
          <a href="{{route('employees.logged.files.labels.index')}}"><i class="la la-tag"></i>
            <span>File Labels</span></a>
        </li>
        <li class="menu-title">
          <span>Marketing</span>
        </li>
        <li class="submenu">
          <a href="#"><i class="la la-rocket"></i> <span> Campaigns </span> <span
              class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li>
              <a class="{{ route_is(['projects','project-list']) ? 'active' : '' }}"
                 href="{{route('employees.logged.projects')}}">Campaigns</a>
            </li>
          </ul>
        </li>

        <li class="{{route_is('leads.index') ? 'active' : '' }}">
          <a href="{{route('employees.logged.leads.index')}}"><i class="la la-user-secret"></i> <span>Leads</span></a>
        </li>

        <li class="{{route_is('tickets') ? 'active' : '' }}">
          <a href="{{route('employees.logged.tickets')}}"><i class="la la-ticket"></i> <span>Tickets</span></a>
        </li>

        <li class="menu-title">
          <span>HR</span>
        </li>
        <li class="submenu">
          <a href="#" class="{{ route_is(['employees','employees-list']) ? 'active' : '' }} noti-dot"><i
              class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">


            <li><a class="{{ route_is('employees.logged.holidays') ? 'active' : '' }}"
                   href="{{route('employees.logged.holidays')}}">Holidays</a></li>

            <li><a class="{{ route_is('employees.logged.employees.attendance') ? 'active' : '' }}"
                   href="{{route('employees.logged.employees.attendance')}}">Attendance</a></li>


            <li><a class="{{ route_is('employees.logged.departments') ? 'active' : '' }}"
                   href="{{route('employees.logged.departments')}}">Departments</a>
            </li>
            <li><a class="{{ route_is('employees.logged.overtime') ? 'active' : '' }}"
                   href="{{route('employees.logged.overtime')}}">Overtime</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span
              class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a class="{{ route_is('employees.logged.invoices.*') ? 'active' : '' }}"
                   href="{{route('employees.logged.invoices.index')}}">Invoices</a>
            </li>
            <li><a class="{{ route_is('employees.logged.expenses') ? 'active' : '' }}"
                   href="{{route('employees.logged.expenses')}}">Expenses</a></li>
            <li><a class="{{ route_is('employees.logged.provident-fund') ? 'active' : '' }}"
                   href="{{route('employees.logged.provident-fund')}}">Provident Fund</a></li>
            <li><a class="{{ route_is('employees.logged.taxes') ? 'active' : '' }}"
                   href="{{route('employees.logged.taxes')}}">Taxes</a></li>
          </ul>
        </li>

        <li class="{{ route_is('employees.logged.policies') ? 'active' : '' }}">
          <a href="{{route('employees.logged.policies')}}"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
        </li>

        <li class="submenu">
          <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a class="{{ route_is('employees.logged.jobs') ? 'active' : '' }}"
                   href="{{route('employees.logged.jobs')}}"> Manage Jobs </a>
            </li>
            <li><a class="{{ route_is('employees.logged.job-applicants') ? 'active' : '' }}"
                   href="{{route('employees.logged.job-applicants')}}"> Applied Candidates </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span
              class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a class="{{ route_is('employees.logged.goal-tracking') ? 'active' : '' }}"
                   href="{{route('employees.logged.goal-tracking')}}"> Goal List </a></li>
            <li><a class="{{ route_is('employees.logged.goal-type') ? 'active' : '' }}"
                   href="{{route('employees.logged.goal-type')}}"> Goal
                Type </a></li>
          </ul>
        </li>
        <li class="{{ route_is('employees.logged.assets') ? 'active' : '' }}">
          <a href="{{route('employees.logged.assets')}}"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
        </li>


      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->
