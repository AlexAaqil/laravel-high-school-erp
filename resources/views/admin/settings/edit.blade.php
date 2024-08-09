<x-admin-layout class="Blogs">
    <div class="custom_form">
        <header>
            <p>Update Settings</p>
        </header>

        <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="school_name">School Name</label>
                <input type="text" name="school_name" value="{{ old('school_name') }}" placeholder="Name of the School">
                <span class="inline_alert">{{ $errors->first('school_name') }}</span>
            </div>

            <div class="input_group">
                <label for="school_acronym">School Acronym</label>
                <input type="text" name="school_acronym" value="{{ old('school_acronym') }}" placeholder="School Acronym">
                <span class="inline_alert">{{ $errors->first('school_acronym') }}</span>
            </div>

            <div class="input_group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                <span class="inline_alert">{{ $errors->first('phone') }}</span>
            </div>

            <div class="input_group">
                <label for="email">Phone Number</label>
                <input type="emil" name="email" value="{{ old('email') }}" placeholder="Phone Number">
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <div class="input_group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ old('address') }}" placeholder="Kiambu Town">
                <span class="inline_alert">{{ $errors->first('address') }}</span>
            </div>

            <div class="input_group">
                <label for="next_term_fees">Next Term Fees</label>
                <input type="text" name="next_term_fees" value="{{ old('next_term_fees') }}" placeholder="Ksh. 50,000.00">
                <span class="inline_alert">{{ $errors->first('next_term_fees') }}</span>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-admin-layout>
