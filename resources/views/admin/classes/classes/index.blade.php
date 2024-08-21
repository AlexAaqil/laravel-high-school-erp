<x-admin-layout class="Classes">
    <x-admin-header
        header_title="Classes"
        :total_count="count($classes)"
        route="{{ route('classes.create') }}"
    />

    <div class="body">
        <table class="table">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>Class Name</th>
                </tr>
            </thead>

            <tbody>
                @if(count($classes) > 0)
                    @php $id = 1 @endphp
                    @foreach($classes as $class)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('classes.show', ['class' => $class->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $class->class_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No classes have been added yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-admin-layout>
