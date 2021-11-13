@extends('layout.template')
@section('container')
<h1>Add User</h1>
<style>
    .uper {
      margin-top: 40px;
    }
    .row {
        padding-bottom: 0.6em;
    }
    form{
        font-size: 0.9em;
    }
    
.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
  </style>
  <div class="card uper">
    <div class="card-header">
      Add Games Data
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('user.store') }}">
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="profil_pic">Upload Photo</label>
                            <input type="file" class="form-control" id="profil_pic" placeholder="Upload" name="profil_pic">
                        
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username"  placeholder="Enter Username" name="username" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik"  placeholder="Enter NIK" name="nik" value="{{ old('nik') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">Full Name<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fullname"  placeholder="Enter Full Name" name="fullname" value="{{ old('fullname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email"  placeholder="Enter Email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone"  placeholder="Enter Phone" name="phone"  value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Bank Name<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bank_name"  placeholder="Enter Bank Name" name="bank_name"  value="{{ old('bank_name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_account" class="col-sm-3 col-form-label">Bank Account<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bank_account"  placeholder="Enter Bank Account" name="bank_account"  value="{{ old('bank_account') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="has_npwp" class="col-sm-3 col-form-label">Has NPWP</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="has_npwp" name="has_npwp" value="1">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postalcode_id" class="col-sm-3 col-form-label">Postal Code</label>
                            <div class="col-sm-9">
                               <!-- <input type="text" class="form-control" id="postalcode_name" autocomplete="off"  data-provide="typeahead">
                                <input type="hidden" id="postalcode_id" name="postalcode_id" />-->
                                <select id="postalcode_id" name="postalcode_id"  class="selectpicker show-tick form-control" data-live-search="true">
                                    @foreach($postalcode as $ps)
                                        
                                        <option value="{{ $ps->id }}" subdistrict="{{ $ps->subdistrict_name }}" district="{{ $ps->district_name }}" city="{{ $ps->city_name }}" province="{{ $ps->province_name }}" title="{{ $ps->postalcode }}" @if(old('postalcode_id')==$ps->id)
                                            selected
                                         @endif>{{ $ps->postalcode.' - '.$ps->subdistrict_name }}</option>
                                    @endforeach
                                </select>
                                <!--<input class="form-control basicAutoComplete" id="postalcode_name" type="text"
                                 autocomplete="off">-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subdistrict" class="col-sm-3 col-form-label">Sub District</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subdistrict_name" name="subdistrict_name" value="{{ old('subdistrict_name') }}"  readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-sm-3 col-form-label">District</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="district_name"  readonly="" name="district_name" value="{{ old('district_name') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city_name"  readonly="" name="city_name" value="{{ old('city_name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-sm-3 col-form-label">Province</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="province_name"  readonly="" name="province_name" value="{{ old('province_name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="address"  placeholder="Enter Address" name="address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-5">
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">Organization<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <select name="organization_id" class="form-control">
                                    @foreach($organization as $or)
                                    <option value="{{ $or->id }}"  @if(old('organization_id')==$or->id)
                                        selected
                                     @endif>{{ $or->organization_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">Role<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <select name="role_id" class="form-control">
                                    @foreach($role as $rl)
                                    <option value="{{ $rl->id }}"  @if(old('role_id')==$rl->id)
                                        selected
                                     @endif>{{ $rl->role_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password"  placeholder="Enter Password" name="password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-3 col-form-label">Re-Password<b class="text-danger">*</b></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_confirmation"  placeholder="Re-Type Password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-sm-3 col-form-label">Active</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cti_usage" class="col-sm-3 col-form-label">CTI Usage</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="cti_usage" name="cti_usage" value="1">
                                    
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group row">
                            <label for="mobile_access" class="col-sm-3 col-form-label">Mobile Login</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="mobile_access" name="mobile_access" value="1">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmm" class="col-sm-3 col-form-label">TMM</label>
                            <div class="col-sm-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="tmm" name="tmm" value="1">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="limit_days" class="col-sm-3 col-form-label">Limit Days</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="limit_days"  placeholder="Enter Limit Days" name="limit_days" value="{{ old('limit_days') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="limit_amount" class="col-sm-3 col-form-label">Limit Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="limit_amount"  placeholder="Enter Limit Amount" name="limit_amount" value="{{ old('limit_amount') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warehouse_id" class="col-sm-3 col-form-label">Warehouse Request</label>
                            <div class="col-sm-9">
                                <select name="warehouse_id" class="form-control">
                                    @foreach($warehouse as $wr)
                                        <option value="{{ $wr->id }}"  @if(old('warehouse_id')==$wr->id)
                                            selected
                                         @endif>{{ $wr->warehouse_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warehouse_id" class="col-sm-3 col-form-label">ERP User ID</label>
                            <div class="col-sm-9">
                                <div class="input-group ">
                                    <input class="form-control py-2 border-right-0 border" type="ERP Id" name="erp_id" id="example-search-input">
                                    <span class="input-group-append">
                                      <button class="btn btn-outline-secondary border-left-0 border" type="button" style="height:100% ">
                                            <i class="fa fa-search"></i>
                                      </button>
                                    </span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <br style="clear:both"/>
            <button type="submit" class="btn btn-primary">Save</button>
            
               
           
            
        </form>
    </div>
  </div>
@endsection