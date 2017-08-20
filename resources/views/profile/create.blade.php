@extends('layouts.master')
@section('contents')

    <section class="col-sm-6">
        <form class="form-horizontal" action="controllers/PersonController.php?action=create" method="post" name="addContact">

            <h3>Create a New Contact</h3>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="lastName">Last<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="lastName" type="text" class="form-control" id="lastName"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="firstName">First<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="firstName" type="text" class="form-control" id="firstName"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="middleName">Middle<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="middleName" type="text" class="form-control" id="middleName"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="aliasName">Alias<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="aliasName" type="text" class="form-control" id="aliasName"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="birthMonth">Month</label>
                <div class="col-sm-10">
                    <select name="birthMonth" class="form-control" id="birthMonth">

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

                        <option value="0"> </option>

                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
on>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="birthYear">Year</label>
                <div class="col-sm-10">
                    <select name="birthYear" class="form-control" id="birthYear">

                        <option value="0"> </option>

                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="note">Notes</label>
                <div class="col-sm-10">
                    <textarea name="note" class="form-control" id="note"  ></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input class=" form-control btn btn-primary"  type="submit" name="addNewContact" value="Create"
                           id="create"
                            />
                </div>
            </div>

        </form>

    </section>

@endsection