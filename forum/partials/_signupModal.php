<!-- Modal -->
<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">SignUp to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/_handlesignup.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User name</label>
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="signupPassword" class="form-control" id="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="signupcPassword" class="form-control" id="cpassword">
                        <small>Re-type the password</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>

        </div>
    </div>
</div>