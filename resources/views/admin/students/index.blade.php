<x-admin-layout class="Users">
    <x-admin-header
        header_title="Students"
        :total_count="count($students)"
        route="{{ route('students.create') }}"
    />

    <div class="body">
        <table class="table">
            <thead>
                <th class="center">ID</th>
                <th>Reg No.</th>
                <th>Name</th>
                <th>Phone Number</th>
            </thead>

            <tbody>
                @if(count($students) > 0)
                    @php $id = 1 @endphp
                    @foreach($students as $student)
                    <tr class="searchable">
                        <td class="center">
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                                {{ $id++ }}
                            </a>
                        </td>
                        <td>{{ $user->registration_number }}</td>
                        <td>{{ $user->first_name .' '. Auth::user()->last_name }}</td>
                        <td>+{{ $user->phone_main }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No students yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-admin-layout>
