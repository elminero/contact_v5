<div style="">
    <a href="/names/edit">

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

        DOB: November 27, 2001<br />
        Age: 15<br />

        Note: hottie

    </a>
</div>







