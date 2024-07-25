<x-admin-layout class="Blogs">
    <div class="custom_form">
        <header>
            <p>New User</p>
        </header>

        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-admin-layout>
