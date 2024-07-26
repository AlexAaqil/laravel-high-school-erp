<x-admin-layout class="Blogs">
    <div class="custom_form">
        <header>
            <p>New User</p>
        </header>

        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input_group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" />
                <span class="inline_alert">{{ $errors->first('image') }}</span>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" :value="old('first_name')">
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" :value="old('last_name')">
                </div>

                <div class="input_group">
                    <label for="last_name">User Name</label>
                    <input type="text" name="username" id="username" :value="old('username')">
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" :value="old('email')">
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number (main)</label>
                    <input type="text" name="phone_main" id="phone_main" :value="old('phone_main')">
                </div>

                <div class="input_group">
                    <label for="phone_other">Phone Number (other)</label>
                    <input type="text" name="phone_other" id="phone_other" :value="old('phone_other')">
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" :value="old('password')">
                </div>

                <div class="input_group">
                    <label for="user_level">User Level</label>
                    <select name="user_level" id="user_level">
                        <option value="">User Level</option>
                        <option value="accountant">Accountant</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="input_group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" :value="old('dob')">
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="gender">Gender</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="gender" id="male" value="M" {{ old('gender', 'M') == 'M' ? 'checked' : '' }}>
                            <span>Male</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="gender" id="female" value="F" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <span>Female</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('gender') }}</span>
                </div>

                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" :value="old('address')">
                </div>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-admin-layout>
