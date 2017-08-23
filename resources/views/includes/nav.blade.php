 <nav class="navbar navbar-default " style="background-color: #1b6d85;" >

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Online Contacts</span>
        </div>

        <div class="navbar-collapse collapse" id="searchbar">

            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="/profiles/list">List</a></li>

                <li class=""><a href="/profiles/create">New</a></li>

                <li><a href="controllers/LoginController.php?action=logout"><span id="timer">Logout 5:00</span></a></li>
            </ul>

            <form class="navbar-form navbar-right" role="search" id="searchForm" action="search.php" method="post" name="search">
                <div class="form-group" style="display:inline;">
                    <div class="input-group" style="display:table;">
                        <span class="input-group-addon" style="width:1%;"></span>
                        <input type="text" id="tags" class="form-control home-search" placeholder="Search For Name" name="name" >
                        <input name="value" type="hidden" id="tagValue" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" value="Profile" id ="SearchName" name="SearchName">Go</button>
                            </span>
                    </div>
                </div>
            </form>

        </div>


    </nav>
