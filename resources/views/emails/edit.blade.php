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


            <form class="form-horizontal"  action="controllers/EmailAddressController.php?action=update" method="post" name="addEmail">

                <h3 style="float: left">Update E-Mail Address</h3>
                    <span style='float: right'>
                    <a class="btn btn-danger" id="delete"
                       href="controllers/EmailAddressController.php?action=delete&id=5&personId=1 ">delete</a>
                    </span><br />
                <div style="clear: both"></div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option  value="0"> </option>
                            <option  value="1">Business</option>
                            <option selected value="2">Home</option>
                            <option  value="3">Shared</option>
                            <option  value="4">Previous</option>
                            <option  value="5">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="emailAddress">E-Mail</label>
                    <div class="col-sm-10">
                        <input name="emailAddress" type="text" class="form-control" id="emailAddress"  value="elminero@cox.net" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note"  >hi</textarea>
                    </div>
                </div>

                <input type="hidden" name="emailId" value="5" />

                <input type="hidden" name="personId" value="1" />

                <div style="float: left; color: #990000; margin-top: 10px;">
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="form-control btn btn-primary"  type="submit" name="addEmail" value="Update"
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