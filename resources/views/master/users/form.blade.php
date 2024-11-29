
<div class="form-group row">
    <label class="col-lg-3 col-form-label ">User Type<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <select class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}" type="text"  name="user_type" id="user_type">
            <option selected
                value="Player" {{ !empty($user->user_type) && $user->user_type== 'Player' ? 'selected':''}} {{ ((old('user_type')== 'Player')?'selected': '') }}>
                Player
            </option>
        </select>
        @if ($errors->has('user_type'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('user_type') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">User Name<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input type="text" name="name" placeholder="User Name"
               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{(isset($user->name))?$user->name:old('name')}}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label ">User ID</label>
    <div class="col-lg-6">
        <input type="text" readonly name="user_id" placeholder="User ID"
               class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
               value="{{(isset($user->user_id))?$user->user_id:old('user_id')}}">
        @if ($errors->has('user_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Role ID</span></label>
    <div class="col-lg-6">
        <input type="text" readonly name="role_id" placeholder="User ID"
               class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
               value="{{(isset($user->role_id))?$user->role_id:old('role_id')}}">
        @if ($errors->has('role_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('role_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Reports to Role ID</label>
    <div class="col-lg-6">
        <input type="text" readonly name="report_to_role_id" placeholder="User ID"
               class="form-control {{ $errors->has('report_to_role_id') ? ' is-invalid' : '' }}"
               value="{{(isset($user->report_to_role_id))?$user->report_to_role_id:old('report_to_role_id')}}">
        @if ($errors->has('report_to_role_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('report_to_role_id') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Email<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input type="text" name="email" placeholder="Email"
               class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
               value="{{(isset($user->email))?$user->email:old('email')}}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

@if(empty($user->password))
<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Password<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input type="password" name="password" placeholder="Password"
               class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
               value="{{(isset($user->password))?$user->password:old('password')}}">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
@endif
<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Phone No<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input type="text" name="phone_no"  placeholder="Phone No"
               class="form-control {{ $errors->has('phone_no') ? ' is-invalid' : '' }}"
               value="{{(isset($user->phone_no))?$user->phone_no:old('phone_no')}}">
        @if ($errors->has('phone_no'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone_no') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">State<span class="text-danger">*</span></label>
    <div class="col-lg-6">
            <select
                class="form-control state-select2 {{ $errors->has('state_id') ? 'is-invalid' : '' }}"
                type="text" name="state_id" id="state_id">
                <option value="0">Select State</option>
                @if(!empty($user))
                    @foreach($state as $value)
                        <option
                            value="{{$value->state_id}}" {{ !empty($user->state_id) && $user->state_id==$value->state_id ? 'selected':''}} {{ ((old('state_id')==$value->state_id)?'selected': '') }}>{{$value->state_name}}</option>
                    @endforeach
                @endif

            </select>
            @if ($errors->has('state_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('state_id') }}</strong>
                </div>
            @endif
        </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">District<span
            class="text-danger">*</span></label>
        <div class="col-lg-6">
            <select
                class="form-control district-select2 {{ $errors->has('district_id') ? 'is-invalid' : '' }}"
                type="text" name="district_id" id="district_id">
                <option value="">Select District</option>
                @if(!empty($user))
                    @foreach($district as $value)
                        <option
                            value="{{$value->district_id}}"{{ !empty($user->district_id) && $user->district_id==$value->district_id ? 'selected':''}} {{ ((old('district_id')==$value->district_id)?'selected': '') }}>{{$value->district_name}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('district_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('district_id') }}</strong>
                </div>
            @endif
        </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">City<span
            class="text-danger">*</span></label>
        <div class="col-lg-6">
            <select
                class="form-control city-select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                type="text" name="city_id" id="city_id">
                <option value="">Select City</option>
                @if(!empty($user))
                    @foreach($city as $value)
                        <option
                            value="{{$value->city_id}}"{{ !empty($user->city_id) && $user->city_id==$value->city_id ? 'selected':''}} {{ ((old('city_id')==$value->city_id)?'selected': '') }}>{{$value->city_name}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('city_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('city_id') }}</strong>
                </div>
            @endif
        </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Pincode<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <select
            class="form-control pincode-select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
            type="text" name="pincode" id="pincode">
            <option value="">Select City</option>
            @if(!empty($user))
                @foreach($city as $value)
                    <option
                        value="{{$value->pincode}}"{{ !empty($user->pincode) && $user->pincode==$value->pincode ? 'selected':''}} {{ ((old('pincode')==$value->pincode)?'selected': '') }}>{{$value->pincode}}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('pincode'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('pincode') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label ">Status<span
            class="text-danger">*</span></label>
    <div class="col-lg-6">
        <select
            class="form-control{{ $errors->has('status') ? 'is-invalid' : '' }}"
            type="text" name="status" id="status">
            <option value="">Select Status</option>

            <option
                value="1"{{ !empty($user->status) && $user->status== '1' ? 'selected':''}} {{ ((old('status')== '1')?'selected': '') }}>
                Active
            </option>
            <option
                value="0"{{ !empty($user->status) && $user->status== '0' ? 'selected':''}} {{ ((old('status')== '0')?'selected': '') }}>
                DeActive
            </option>
        </select>
        @if ($errors->has('status'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </div>
        @endif
    </div>
</div>



