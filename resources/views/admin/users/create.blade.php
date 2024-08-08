<x-admin-layout class="Blogs">
    <div class="custom_form">
        <header>
            <p>New User</p>
        </header>

        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="user_level">User Level</label>
                    <select name="user_level" id="user_level">
                        <option value="">User Level</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="accountant">Accountant</option>
                        <option value="parent">Parent</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
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
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number (main)</label>
                    <input type="text" name="phone_main" id="phone_main" value="{{ old('phone_main') }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
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
