<div class="col-sm-6 col-sm-offset-3">
    <div class="well">
        <div class="formHeader text-center">
        <h3>Not Yet Registered?</h3>
        </div>
        <form  class="form-horizontal" method="post" action="signin">
            <div class="form-group">
                <label class="control-label col-sm-5">Your Name: </label>
                <div class="col-sm-4">
                    <input type="text"  class="form-control" id="name" name="name"
                     placeholder="Your Name" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Email: </label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email"
                     placeholder="Email Address" >
                </div>
            </div>      
            <div class="form-group">
                <label class="control-label col-sm-5">User Name *: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="registerName" name="username"
                     placeholder="User Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Password *: </label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="registerPassword"
                     name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" >Repeat Password *: </label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="repeatPassword"
                      name="repeat" placeholder="Repeat Password" required>
                </div>
            </div>
            <div class="form-group  text-center">
                <input type="submit" name="register" value="Register"/>
            </div>
            <div class="text-center">
                <h5><strong>*Required</strong></h5>
            </div>
        </form>
    </div>
</div>