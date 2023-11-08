<div class="statistics page">
    <a href="/dashboard/visits" class="card visits">
        <i class="fas fa-plane-arrival    "></i>
        <h2>Visits</h2>
        <p>How many people visited the portfolio.</p>
        <p class="num">{{ $data['visits'] }}</p>
    </a>

    <a href="/dashboard/admins" class="card admins">
        <i class="fa fa-user-secret"></i>
        <h2>Admins</h2>
        <p>People in control.</p>
        <p class="num">{{ $data['admins'] }}</p>
    </a>

    <a href="/dashboard/projects" class="card projects">
        <i class="fas fa-screwdriver"></i>
        <h2>projects</h2>
        <p>Number of creations you produced.</p>
        <p class="num">{{ $data['projects'] }}</p>
    </a>

    <a href="/dashboard/messages" class="card emails">
        <i class="fa fa-envelope"></i>
        <h2>messages</h2>
        <p>People who have tried to contact you.</p>
        <p class="num">{{ $data['emails'] }}</p>
    </a>

    <a href="/dashboard/subs" class="card subs">
        <i class="fas fa-users"></i>
        <h2>subscribers</h2>
        <p>Who is eager to hear your news.</p>
        <p class="num">{{ $data['subs'] }}</p>
    </a>
</div>
