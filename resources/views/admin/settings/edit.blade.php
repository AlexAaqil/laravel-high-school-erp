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
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+254 746 055 487">
                <span class="inline_alert">{{ $errors->first('phone') }}</span>
            </div>

            <div class="input_group">
                <label for="email">Email</label>
                <input type="emil" name="email" value="{{ old('email') }}" placeholder="aaqilhighschool@gmail.com">
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <div class="input_group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ old('address') }}" placeholder="Kiambu Town">
                <span class="inline_alert">{{ $errors->first('address') }}</span>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="this_terms_begins">This Term Begins</label>
                    <input type="date" name="this_terms_begins" value="{{ old('this_terms_begins') }}">
                    <span class="inline_alert">{{ $errors->first('this_terms_begins') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="this_terms_ends">This Term Begins</label>
                    <input type="date" name="this_terms_ends" value="{{ old('this_terms_ends') }}">
                    <span class="inline_alert">{{ $errors->first('this_terms_ends') }}</span>
                </div>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-admin-layout>
