<x-admin-layout class="Classes">
    <div class="custom_form">
        <header>
            <p>Edit Class</p>
        </header>

        <form action="{{ route('classes.update', $classes->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="class_name">Name of the class</label>
                <input type="text" name="class_name" id="class_name" placeholder="1 North" value="{{ old('class_name', $classes->class_name) }}">
                <span class="inline_alert">{{ $errors->first('class_name') }}</span>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="another_form">
            <form id="deleteForm_{{ $classes->id }}" action="{{ route('classes.destroy', $classes->id) }}" method="post">
                @csrf
                @method('DELETE')

                <p>Delete this Class</p>
                <button type="button" class="delete_btn" onclick="deleteItem({{ $classes->id }}, 'class');">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </form>
        </div>

        <div class="container">

        </div>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-admin-layout>
