<?php
use Carbon\Carbon;
?>

<div style="">
    <a href="/names/edit/{{$name->id}}">

        <h1>
            @if ($name->first)
                {{ $name->first . " "}}
            @endif
            @if ($name->middle)
                {{ $name->middle . " "}}
            @endif
            @if ($name->last)
                {{ $name->last . " " }}
            @endif
            @if ($name->alias)
                <br />Alias: {{ $name->alias }}
            @endif
        </h1>


        @if ($name->first)
            First Name: {{ $name->first}}<br />
        @endif
        @if ($name->middle)
            Middle Name: {{ $name->middle . " "}}<br />
        @endif
        @if ($name->last)
            Last Name: {{ $name->last . " " }}<br />
        @endif
        @if ($name->alias)
            <br />Alias: {{ $name->alias }}
        @endif

        <br />

        DOB: {{ $dob['dob'] }}<br />
        Age: {{ $dob['age'] }}<br />
        Note: {{ $dob['note'] }}

    </a>
</div>

<!--

Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')->toDateTimeString(); // 1975-05-21 22:00:00

$created_at->format('l j F Y'); // Monday 4 July 2016



if(($contact->nameDOB->birth_year != 0) AND ($contact->nameDOB->birth_month != 0) AND ($contact->nameDOB->birth_day !=0))
{
$nameDOB .= "DOB: " . $contact->getMonthNameByNumber($contact->nameDOB->birth_month)   . " " . $contact->nameDOB->birth_day . ", " . $contact->nameDOB->birth_year . "<br />";
}

if(($contact->nameDOB->birth_year == 0) || ($contact->nameDOB->birth_month == 0) || ($contact->nameDOB->birth_day == 0)) {
if (($contact->nameDOB->birth_year == 0) && ($contact->nameDOB->birth_month == 0) && ($contact->nameDOB->birth_day == 0)) {
$nameDOB .= "DOB: Unknown";
}

if (($contact->nameDOB->birth_year != 0) || ($contact->nameDOB->birth_month != 0) || ($contact->nameDOB->birth_day != 0)) {
    $nameDOB .= "DOB Incomplete: <br /> ";
}

if($contact->nameDOB->birth_year != 0)
{
$nameDOB .= " Year: " . $contact->nameDOB->birth_year;
if($contact->nameDOB->birth_month != 0)
{
    $nameDOB .= ", ";
}
if($contact->nameDOB->birth_day != 0)
{
    $nameDOB .= ", ";
}
}

if($contact->nameDOB->birth_month != 0)
{
$nameDOB .= " Month: " . $contact->getMonthNameByNumber($contact->nameDOB->birth_month);
if($contact->nameDOB->birth_day != 0)
$nameDOB .= ", ";
}

if($contact->nameDOB->birth_day != 0)
{
$nameDOB .= " Day: " . $contact->nameDOB->birth_day;
}

$nameDOB .= "<br />Age Unknown<br />";
}

if(($contact->nameDOB->birth_year != 0) AND ($contact->nameDOB->birth_month != 0) AND ($contact->nameDOB->birth_day !=0))
{
$nameDOB .= "Age: " . $contact->getAge($contact->nameDOB->birth_year, $contact->nameDOB->birth_month,
$contact->nameDOB->birth_day) . "<br />";

}
$nameDOB.="<div style='float: left'>Note: </div> " . "<div style=\" float: left  \">" . $contact->nameDOB->note . "</div>";
?>


-->
