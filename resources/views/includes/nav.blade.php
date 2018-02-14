
<nav class="navbar navbar-default " style="background-color: #1b6d85;" >

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Online Contacts</span>

            @if (Auth::check())
                <span class="navbar-brand">Hello {{Auth::user()->name}}</span>
            @endif

        </div>

        @if (Auth::check())

            <div class="navbar-collapse collapse" id="searchbar">

                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::user()->is_admin)
                        <li class=""><a href="/dashboard">admin</a></li>
                    @endif

                    <li class=""><a href="/names/list">List</a></li>

                    <li class=""><a href="/names/create">New</a></li>

                    <li><a href="/logout"><span id="timer">Logout 5:00</span></a></li>
                </ul>

                <form class="navbar-form navbar-right" role="search" id="searchForm" action="/names/find" method="post" name="search">

                    {{csrf_field()}}

                    <div class="form-group" style="display:inline;">
                        <div class="input-group" style="display:table;">
                            <span class="input-group-addon" style="width:1%;"></span>

                            <input type="text" id="search" class="form-control home-search" placeholder="Search For Name" name="name" autocomplete="off" >

                            <input name="value" type="hidden" id="tagValue" />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" value="Profile" id ="SearchName" name="SearchName">Go</button>
                                </span>

                        </div>
                    </div>
                </form>

            </div>

        @endif

</nav>


<div id="test"></div>

<script type="text/javascript">
    var path = '{{ route('autocomplete') }}';

    $('#search').focus().typeahead({

        minLength: 2,
        highlight: true,

        //    name: 'dataset',

        source: function(query, process) {

            return $.get(path, {query: query}, function(data){
                return process(data);

            });

        }

    });
</script>