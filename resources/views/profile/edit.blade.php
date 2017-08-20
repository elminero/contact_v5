@extends('layouts.master')
@section('contents')


<ol class="breadcrumb">
<li><a href="listcontacts.php">List</a></li>
<li><a href="profile.php?id=1">Profile</a></li>
<li><b>Update</b></li>
</ol>

<div class="row">
    <section class="col-sm-6">
        <!-- div 1 Start Avatar -->
        @include('includes.avatar')
        <hr />

        <!-- div 2 Start Name and DOB -->
        @include('includes.nameDOB')

        <hr />

        <!-- Start Phone Numbers -->
        @include('includes.phoneNumbers')
        <hr />

        <!-- Start Email Address  -->
        @include('includes.email')
        <hr />

        <!-- Start Address -->
        @include('includes.address')


    </section>

    <section class="col-sm-6">

        <form class="form-horizontal" action="controllers/PersonController.php?action=update" method="post" name="addContact">

            <h3 style="float: left">Update Contact</h3>
            <span style='float: right'>
                <a class="btn btn-danger" id="delete" href="controllers/PersonController.php?action=delete&id=1">delete</a>
            </span><br />
            <div style="clear: both"></div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="lastName">Last<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="lastName" type="text" class="form-control" id="lastName"  value="Farber" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="firstName">First<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="firstName" type="text" class="form-control" id="firstName"  value="Robert" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="middleName">Middle<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="middleName" type="text" class="form-control" id="middleName"  value="Ian" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="aliasName">Alias<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="aliasName" type="text" class="form-control" id="aliasName"  value="Rob" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="birthMonth">Month</label>
                <div class="col-sm-10">
                    <select name="birthMonth" class="form-control" id="birthMonth">
                        <option value="11">November</option>

                        <option value="0"> </option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="birthDay">Day</label>
                <div class="col-sm-10">
                    <select name="birthDay" class="form-control" id="birthDay">
                        <option value="27">27</option>
                        <option value="0"> </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="birthYear">Year</label>
                <div class="col-sm-10">
                    <select name="birthYear" class="form-control" id="birthYear">
                        <option value="2001">2001</option>
                        <option value="0"> </option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="note">Notes</label>
                <div class="col-sm-10">
                    <textarea name="note" class="form-control" id="note"  >hottie</textarea>
                </div>
            </div>

            <input type="hidden" name="personId" value="1" />

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input class="form-control btn btn-primary"  type="submit" name="addNewContact" value="Update" id="update" />
                </div>
            </div>

        </form>

    </section>

</div>









































@endsection