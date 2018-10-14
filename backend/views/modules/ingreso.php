<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <form method="POST" action="">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" name="emailIngreso" type="email" placeholder="Email">
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" type="password" name="passwordIngreso" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-right">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div>
                  </div>
                </form>
                <?php 
                  // echo "email ".$_POST["emailIngreso"]." pass ".$_POST["passwordIngreso"];
                  $login = new Ingreso();
                  $login -> login();
                  
                ?>
              </div>
            </div>
            
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Arturo Cogollo</h2>
                  <p>Platform developed for the publication of the projects of architect Arturo Cogollo.</p>
                  <p>The platform was developed under the latest technologies of the market by the company Platsmoo.</p>
                  <!-- <button class="btn btn-primary active mt-3" type="button">Register Now!</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

            