<x-admin-layout class="Users">
    <div class="custom_form">
        <header>
            <p>New Student</p>
        </header>

        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number') }}">
                    <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
                    <span class="inline_alert">{{ $errors->first('dob') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number (main)</label>
                    <input type="text" name="phone_main" id="phone_main" value="{{ old('phone_main') }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number (other)</label>
                    <input type="text" name="phone_main" id="phone_main" value="{{ old('phone_main') }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="st123456">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-admin-layout>
