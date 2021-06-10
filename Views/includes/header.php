<!-- Navigation Bar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">CockTails</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarExpand">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarExpand">
        <div class="navbar-nav mr-auto">
        </div>
        <div class="navbar-nav" style="cursor:pointer;">
            <?php if (!isset($session_id) || $session_id == "") { ?>
                <a id="login" class="nav-link float-right" data-toggle="modal" data-target="#loginModal">Login</a>
            <?php } else { ?>
                <a type="button" class="nav-link float-right" href="../../logout.php">Logout</a>
            <?php } ?>
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="modalForm" id="login_form" method="post">
                    <table style="margin-left: 10%">
                        <tr class="form-group">
                            <td style="width: 40%; margin-left: 50px">Email Address</td>
                            <td><input class="form-control" type="text" name="loginEmail" id="loginEmail" required></td>
                        </tr>
                        <tr class="form-group">
                            <td>Password</td>
                            <td><input class="form-control" type="password" name="loginPassword" id="loginPassword"
                                       required></td>
                        </tr>
                    </table>
                    <p><span id="msg"></span></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger float-right" id="login_btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>

