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

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="delete_btn" onclick="deleteItem({{ $classes->id }}, 'class');" form="deleteForm_{{ $classes->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $classes->id }}" action="{{ route('classes.destroy', $classes->id) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <div class="class_sections another_form">
            <div class="heading_section">
                <p>Class Sections</p>
                <form action="">
                    <input type="hidden" name="class_id" id="class_id" value="{{ $classes->id }}">
                    
                    <div class="row_input_group_3">
                        <div class="input_group">
                            <input type="text" name="title" id="title" placeholder="Class Section Name">
                        </div>

                        <div class="input_grout">
                            <select name="teacher_id" id="teacher_id">
                                <option value="">Select Class Teacher</option>
                            </select>
                        </div>

                        <button type="submit">New</button>
                    </div>
                </form>
            </div>

            <div class="sections">
                <p>
                    <span>Section - </span>
                    <span>Class teacher</span>
                </p>
            </div>
        </div>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-admin-layout>
