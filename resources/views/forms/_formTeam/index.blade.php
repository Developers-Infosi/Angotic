<div class="col-lg-4 col-md-6 col-12 mt-2">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name"
        value="{{ isset($team->name) ? $team->name : old('name') }}" name="name" placeholder="Enter Name"
        required />
</div>

<div class="col-lg-4 col-md-6 col-12 mt-2">
    <label for="company" class="form-label">Company</label>
    <input type="text" class="form-control" id="company" name="company"
        value="{{ isset($team->company) ? $team->company : old('company') }}" placeholder="Enter Company"
        required />
</div>


<div class="col-lg-4 col-md-6 col-12 mt-2">
    <label for="tel" class="form-label">Phone</label>
    <input type="text" class="form-control" id="tel" name="tel"
        value="{{ isset($team->tel) ? $team->tel : old('tel') }}" placeholder="Enter Phone" required />
</div>

<div class="col-lg-4 col-md-6 col-12 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ isset($team->email) ? $team->email : old('email') }}" placeholder="Enter Email" />
</div>
<div class="col-lg-4 col-md-6 col-12 mt-2">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity"
        value="{{ isset($team->quantity) ? $team->quantity : old('quantity') }}" placeholder="Default 1" />
</div>
<div class="col-12 col-md-4 col-lg-4 mt-2">
    <div class="form-group">
        <label for="type">Category</label>
        <select name="type" id="type" class="form-control" required>

            @if (isset($team->type))
                <option value="{{ $team->type }}" class="text-primary h6" selected>
                    {{ $team->type }}
                </option>
            @else
                <option disabled selected>Select an option</option>
            @endif

            <option value="Press">Press</option>
            <option value="Exhibitor">Exhibitor</option>
            <option value="Security">Security</option>
            <option value="Protocol">Protocol</option>
            <option value="Technical Support">Technical Support</option>
            <option value="Service">Service</option>
            <option value="Organization">Organization</option>
            <option value="Catering">Catering</option>
            <option value="Medical">Medical</option>
        </select>
    </div>
</div>
