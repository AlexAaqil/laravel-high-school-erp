<x-admin-layout class="Users">
    <div class="custom_form">
        <header>
            <p>Update Student</p>
        </header>

        <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <input type="hidden" name="gender" value="M">

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number', $student->registration_number) }}">
                    <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $student->first_name) }}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $student->last_name) }}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}">
                    <span class="inline_alert">{{ $errors->first('dob') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number (main)</label>
                    <input type="text" name="phone_main" id="phone_main" value="{{ old('phone_main', $student->phone_main) }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_other">Phone Number (other)</label>
                    <input type="text" name="phone_other" id="phone_other" value="{{ old('phone_other', $student->phone_other) }}">
                    <span class="inline_alert">{{ $errors->first('phone_other') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="class_id">Dorm</label>
                    <select name="dorm_id" id="dorm_id">
                        <option value="">Select Dorm</option>
                        <option value="">xxx</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('dorm_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="dorm_room_number">Dorm Room Number</label>
                    <input type="text" name="dorm_room_number" id="dorm_room_number" value="{{ old('dorm_room_number', $student->dorm_room_number) }}">
                    <span class="inline_alert">{{ $errors->first('dorm_room_number') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="year_admitted">Year Admitted</label>
                    <input type="number" id="year_admitted" name="year_admitted" min="2000" max="2060" step="1" value="{{ old('year_admitted', $student->year_admitted) }}">
                    <span class="inline_alert">{{ $errors->first('year_admitted') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_status">Graduation Status?</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="yes" value="1" {{ old('graduation_status') == '1' ? 'checked' : '' }}>
                            <span>Graduated</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="no" value="0" {{ old('graduation_status', 0) == '0' ? 'checked' : '' }}>
                            <span>Not</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('graduation_status') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_date">Graudation Date</label>
                    <input type="year" id="graduation_date" name="graduation_date" value="{{ old('graduation_date', $student->graduation_date) }}">
                    <span class="inline_alert">{{ $errors->first('graduation_date') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="class_section_id">Class Section</label>
                    <select name="class_section_id" id="class_section_id">
                        <option value="">Select Class</option>
                        @foreach ($class_sections as $class_section)
                            <option value="{{ $class_section->id }}"  {{ old('class_section_id', $student->class_section_id) == $class_section->id ? 'selected' : '' }}>{{ $class_section->title }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_section_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="parent_id">Parent</label>
                    <select name="parent_id" id="parent_id">
                        <option value="">Select Parent</option>
                        <option value="">xxx</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('parent_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $student->address) }}">
                    <span class="inline_alert">{{ $errors->first('address') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="st123456">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-admin-layout>
