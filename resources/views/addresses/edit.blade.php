@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="listcontacts.php">List</a></li>
        <li><a href="profile.php?id=1" >Profile</a></li>
        <li><b>Add Phone Number</b></li>
    </ol>


    <div class="row">

        <section class="col-sm-6">
            <section class="col-sm-6">
                <!-- div 1 Start Avatar -->
                @include('includes.avatar')
            </section>
        </section>
        <section class="col-sm-6">


            <form class="form-horizontal" action="controllers/AddressController.php?action=update" method="post" name="addAddress">

                <h3 style="float: left">Update Address</h3>
                    <span style='float: right'>
            <a class="btn btn-danger"  id="delete" href="controllers/AddressController.php?action=delete&id=1&personId=1">delete</a>
            </span><br />
                <div style="clear: both"></div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="address_type">Type</label>
                    <div class="col-sm-10">
                        <select name="address_type" class="form-control" id="address_type">
                            <option  value="0" >  </option>
                            <option selected  value="1" > Current Street </option>
                            <option   value="2" > Current Mailing </option>
                            <option   value="3" > Previous Street </option>
                            <option   value="4" > Previous Mailing </option>
                            <option   value="5" > Current Crash Pad </option>
                            <option   value="6" > Previous Crash Pad </option>
                            <option   value="7" > Other </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="country">Country</label>
                    <div class="col-sm-10">
                        <select name="country_iso" class="form-control" id="country">
                            <option value= "US ">
                                United States </option>

                            <option value= "1"> </option>
                            <option value="US" > United States </option  >
                            <option value="CA" > Canada </option>
                            <option value="MX" > Mexico </option>

                            <option value="AF" >
                                Afghanistan </option>
                            <option value="AX" >
                                Aland Islands </option>
                            <option value="AL" >
                                Albania </option>
                            <option value="DZ" >
                                Algeria </option>
                            <option value="AS" >
                                American Samoa </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="stateSelect">State</label>
                    <div class="col-sm-10">
                        <select name="state" class="form-control" id="stateSelect">
                            <option value="California">California</option>
                            <option value="">Select Country First</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="city">City</label>
                    <div class="col-sm-10">
                        <input name="city" type="text" class="form-control" id="city"  value="san diego" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="street">Street</label>
                    <div class="col-sm-10">
                        <input name="street" type="text" class="form-control" id="street"  value="4660 Oregon, Apt # 7" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="postal_code">Postal Code</label>
                    <div class="col-sm-10">
                        <input name="postal_code" type="text" class="form-control" id="postal_code"  value="92176" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note"  >Roommate's place</textarea>
                    </div>
                </div>

                <input type="hidden" name="personId" value="1" />
                <input type="hidden" name="id" value="1" />

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="btn btn-default"  type="submit" name="addAddress" value="Update"
                               id="update"
                                />
                    </div>
                </div>

            </form>



        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->
    <hr/>
    <!-- array(4) { ["personId"]=> int(37) ["phoneNumber"]=> string(12) "914-331-8584" ["phoneType"]=> int(2) ["note"]=> string(2) "NY" } -->
    <div class="row">
        <!-- div 2 Start Name and DOB -->
        <div class="col-sm-12">
            @include('includes.nameDOB')
        </div>
    </div>
    <hr />
    <!-- Start Phone Numbers -->
    @include('includes.phoneNumbers')
    <hr />
    <!-- Start Email Address  -->
    @include('includes.email')
    <hr />
    <!-- Start Address -->
    @include('includes.address')

@endsection