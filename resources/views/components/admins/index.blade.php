<div class="adminsPage page">
    <div class="page-top-herf"><a href="/dashboard/users/register">Create new admin</a></div>
    <table class="adminsTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Last seen</th>
            <th class="options">options</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['last_seen'] ?? 'None' }}</td>
            <td class="options">
                <div>
                    <a class="update" href="/dashboard/users/edit/{{ $user['id'] }}"><i class="fa fa-wrench"
                            aria-description="Update"></i></a>
                    <button class="confirm-call-btn remove" data-title="Delete {{ $user['name'] }} ?"
                        data-message="Are you sure you want to delete ( {{ $user['name'] }} ) from the dashboard?"
                        data-backMessage='Cancel' data-backClass='blue' data-formMessage="DELETE" data-formClass="red"
                        data-formAction="/dashboard/users/{{ $user['id'] }}"><i class="fa fa-trash"
                            aria-description="Delete admin"></i></button>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>