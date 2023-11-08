<section>
    <h1><i class="fas fa-chart-line"></i> DashBoard</h1>
    <ul>
        <li>
            <a href="/dashboard" id="statistics" class="{{ request()->is('dashboard') ? 'active' : '' }}"><i
                    class="fas fa-chart-column"></i>
                Statistics</a>
        </li>
        <li>
            <a href="/dashboard/visits" id="statistics"
                class="{{ request()->is('dashboard/visits') || request()->is('dashboard/visits/getDetails') ? 'active' : '' }}"><i
                    class="fas fa-plane-arrival    "></i>
                Visitors</a>
        </li>
        <li>
            <a href="/dashboard/admins" id="admins"
                class="{{ request()->is('dashboard/admins') || request()->is('dashboard/users/register') || str_contains(request()->path(), 'dashboard/users/edit') ? 'active' : '' }}"><i
                    class="fa fa-user-secret" aria-hidden="true"></i>
                Admins</a>
        </li>
        <li>
            <a href="/dashboard/projects" id="projects"
                class="{{ request()->is('dashboard/projects') || str_contains(request()->path(), 'dashboard/projects/create') || str_contains(request()->path(), 'dashboard/projects/edit') ? 'active' : '' }}"><i
                    class="fas fa-screwdriver    "></i>
                Projects</a>
        </li>
        <li>
            <a href="/dashboard/messages" id="messages"
                class="{{ request()->is('dashboard/messages') || request()->is('dashboard/messagesByCountry') || str_contains(request()->path(), 'dashboard/messages/send') || str_contains(request()->path(), 'dashboard/messages/answers')? 'active' : '' }}"><i
                    class="fa fa-envelope" aria-hidden="true"></i>
                Messages</a>
        </li>
        <li>
            <a href="/dashboard/subs" id="subs"
                class="{{ request()->is('dashboard/subs') || request()->is('dashboard/subs/getDetails') ? 'active' : '' }}">
                <i class="fas fa-users    "></i>
                subscribers</a>
        </li>
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" id="logout"><i class="fa fa-power-off" style="color: red;"></i>
                    Logout</a>
            </form>
        </li>
    </ul>
</section>