<div class="single-form-part">

    <div class="single-input" style="background-color:#4B7E55;padding-left:20px;">
        <h5 class="text-white pt-5 pb-2">DELEGATE INFORMATION</h5>
    </div>
    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="type">Are you registering on behalf of someone else?*</label>
                <select name="type" id="type" required>
                    @if (isset($registration->type))
                        <option value="{{ $registration->type }}" class="text-primary h6" selected>
                            {{ $registration->type }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="single-input">

        <div class="single-input-item">
            <div class="form-group">
                <label for="based">Are you based in Angola? *</label>
                <select name="based" id="based" required>
                    @if (isset($registration->based))
                        <option value="{{ $registration->based }}" class="text-primary h6" selected>
                            {{ $registration->based }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="nationality">Nationality*</label>
                <select name="nationality" id="nationality" required>
                    @if (isset($registration->nationality))
                        <option value="{{ $registration->nationality }}" class="text-primary h6" selected>
                            {{ $registration->nationality }}
                        </option>
                    @else
                        <option disabled selected>Select your nationality</option>
                    @endif

                    @include('extra._nacionality.index')
                </select>
            </div>
        </div>
    </div>


    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="title">Title*</label>
                <select name="title" id="title" required>
                    @if (isset($registration->title))
                        <option value="{{ $registration->title }}" class="text-primary h6" selected>
                            {{ $registration->title }}
                        </option>
                    @else
                        <option disabled selected>Select your title</option>
                    @endif
                    <option value="Dr">Dr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                    <option value="Mr">Mr</option>
                    <option value="Prof">Prof</option>
                </select>

            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="fullname">Attendee name*</label>
                <input type="text" id="fullname" name="fullname"
                    value="{{ isset($registration->fullname) ? $registration->fullname : old('fullname') }}"
                    placeholder="Enter Attendee name" required />
            </div>
        </div>

    </div>
    <div class="single-input">
        <div class="single-input-item">
            <label for="phone">Phone (with country code)*</label>
            <input type="tel" id="phone" name="phone"
                value="{{ isset($registration->phone) ? $registration->phone : old('phone') }}"
                placeholder="+244 999 999 999" required />
        </div>
        <div class="single-input-item">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                value="{{ isset($registration->email) ? $registration->email : old('email') }}"
                placeholder="Enter Email Address" />
        </div>
    </div>

    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="org_type">Organization Type*</label>
                <select name="org_type" id="org_type" required>
                    @if (isset($registration->org_type))
                        <option value="{{ $registration->org_type }}" class="text-primary h6" selected>
                            {{ $registration->org_type }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Academia">Academia</option>
                    <option value="Civil society">Civil society</option>
                    <option value="Commercial Bank">Commercial Bank</option>
                    <option value="Continental Organisation">Continental Organisation</option>
                    <option value="Corporate/Private Sector">Corporate/Private Sector</option>
                    <option value="Development Finance Institution">Development Finance Institution</option>
                    <option value="Government">Government</option>
                    <option value="Inter-governmental">Inter-governmental</option>
                    <option value="International Organisation">International Organisation</option>
                    <option value="Institutional Investor">Institutional Investor</option>
                    <option value="Non-profit">Non-profit</option>
                    <option value="Regional Economic Community">Regional Economic Community</option>
                    <option value="Specialised Regional Institution">Specialised Regional Institution</option>
                    <option value="Think Tank">Think Tank</option>
                </select>

            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="org_name">Organization Name*</label>
                <input type="text" id="org_name" name="org_name"
                    value="{{ isset($registration->org_name) ? $registration->org_name : old('org_name') }}"
                    placeholder="Enter Organization Name" required />
            </div>
        </div>
    </div>

    <div class="single-input">

        <div class="single-input-item">
            <label for="position">Position / Role*</label>
            <input type="text" id="position" name="position"
                value="{{ isset($registration->position) ? $registration->position : old('position') }}"
                placeholder="Enter Position" required />
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="head_of_delegation">Are you a head of delegation?*</label>
                <select name="head_of_delegation" id="head_of_delegation" required>
                    @if (isset($registration->head_of_delegation))
                        <option value="{{ $registration->head_of_delegation }}" class="text-primary h6" selected>
                            {{ $registration->head_of_delegation }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

            </div>
        </div>
    </div>



    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="accommodation">Do you require accommodation? *</label>
                <select name="accommodation" id="accommodation" required>
                    @if (isset($registration->accommodation))
                        <option value="{{ $registration->accommodation }}" class="text-primary h6" selected>
                            {{ $registration->accommodation }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="diet">Special Dietary Requirements*</label>
                <select name="diet" id="diet" required>
                    @if (isset($registration->diet))
                        <option value="{{ $registration->diet }}" class="text-primary h6" selected>
                            {{ $registration->diet }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="None">None</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Halal">Halal</option>
                    <option value="Kosher">Kosher</option>
                    <option value="Gluten-Free">Gluten-Free</option>
                    <option value="Lactose-Free">Lactose-Free</option>
                    <option value="Allergies">Allergies (Specify)</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
    </div>

    <div class="single-input" style="background-color:#4B7E55;padding-left:20px;" id="travel-info-header">
        <h5 class="text-white pt-5 pb-2">TRAVEL INFORMATION</h5>
    </div>

    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="passport_number">Passport Number*</label>
                <input type="text" id="passport_number" name="passport_number"
                    value="{{ isset($registration->passport_number) ? $registration->passport_number : old('passport_number') }}"
                    placeholder="Enter Passport Number" required />
                <small>For travel logistics purposes - data will be securely stored</small>
            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="passport_type">Passport Type*</label>
                <select name="passport_type" id="passport_type" required>
                    @if (isset($registration->passport_type))
                        <option value="{{ $registration->passport_type }}" class="text-primary h6" selected>
                            {{ $registration->passport_type }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Ordinary">Ordinary</option>
                    <option value="Diplomatic">Diplomatic</option>
                    <option value="Service">Service/Official</option>
                </select>
            </div>
        </div>
    </div>
    <div class="single-input">
        <div class="single-input-item">
            <div class="form-group">
                <label for="visa_status">Visa Status*</label>
                <select name="visa_status" id="visa_status" required>
                    @if (isset($registration->visa_status))
                        <option value="{{ $registration->visa_status }}" class="text-primary h6" selected>
                            {{ $registration->visa_status }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif
                    <option value="Already Have a Valid Visa">Already Have a Valid Visa</option>
                    <option value="Will Apply Before Travel">Will Apply Before Travel</option>
                    <option value="Visa on Arrival">Visa on Arrival</option>
                    <option value="Visa Exempt">Visa Exempt</option>
                </select>
            </div>
        </div>
        <div class="single-input-item">
            <div class="form-group">
                <label for="country_of_departure">Country of departure*</label>
                <select name="country_of_departure" id="country_of_departure" required>
                    @if (isset($registration->country_of_departure))
                        <option value="{{ $registration->country_of_departure }}" class="text-primary h6" selected>
                            {{ $registration->country_of_departure }}
                        </option>
                    @else
                        <option disabled selected>Select an option</option>
                    @endif

                    @include('extra._nacionality.index')
                </select>
            </div>
        </div>
    </div>

    <div class="single-input">

        <div class="single-input-item">
            <label for="arrival_date">Arrival Date*</label>
            <input type="date" id="arrival_date" name="arrival_date"
                value="{{ isset($registration->arrival_date) ? $registration->arrival_date : old('arrival_date') }}"
                required />
        </div>
        <div class="single-input-item">
            <label for="departure_date">Departure Date*</label>
            <input type="date" id="departure_date" name="departure_date"
                value="{{ isset($registration->departure_date) ? $registration->departure_date : old('departure_date') }}"
                required />
        </div>
    </div>
    <div class="single-input" style="background-color:#4B7E55;padding-left:20px;">
        <h5 class="text-white pt-5 pb-2">MEDIA ACCREDITATION</h5>

    </div>

    <div class="single-input">
        <div class="single-input-item">

            <p class="text-dark">
                <strong>All media personnel</strong> attending the event
                <strong>are required to also register separately for accreditation.&nbsp;</strong>
            </p>
            <p class="text-dark">
                Click
                <a href="https://www.ciam.gov.ao/ao/credenciais" rel="noopener noreferrer" target="_blank">
                    <u>here to complete your media accreditation</u>
                </a>.
            </p>

        </div>
    </div>
</div>
