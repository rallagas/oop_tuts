<?php require_once 'core/init_head.php'; ?>
<body>
   <div class="container">
       <div class="row pt-5">
           <div class="col-lg-4 col-md-12 col-sm-12">
               <div class="card shadow">
                  <div class="card-header bg-success">
                      <h3 class="display-6 text-light">Login</h3>
                  </div>
                  <div class="card-body">

                  
                  <?php 

                if(Input::exists()){
                    if(Token::check(Input::get('token'))){
                        $validate = new Validate();
                        $validation = $validate->check(array( $_POST,
                            'username' => array('required' => true),
                            'password' => array('required' => true)
                        ));
                    if($validation->passed()){
                        //login user.
                        echo "Logged in";
                    }
                    else{
                        foreach($validation->errors() as $error){
                            echo "<div class='alert bg-danger'>.$error.</div>";
                        }
                    }
                    }
                }

                  if(Session::exists('home')){
                    echo "<div class='alert alert-success'>" . Session::flash('home') . "</div>"; 
                  }
                  ?>
                  
                  
                    <form action="">
                      <div class="mb-3">
                          <input type="text" name="username" placeholder="Username" class="form-control">
                      </div>
                       <div class="mb-3">
                           <input type="password" name="password" placeholder="Password" class="form-control">
                       </div>
                       <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                       <button class="btn btn-success form-btn"> <i class="bi bi-key"></i> Login </button>

                   </form>
                  </div>
                  <div class="card-footer border-success bg-white">
                      <a href="register.php" class="btn btn-outline-success"> <i class="bi bi-person-plus"></i> Create an Account</a>
                      <a href="forgotpassword.php" class="btn btn-outline-success"> <i class="bi bi-question-circle"></i> Forgot Password</a>
                  </div>
               </div>
           </div>
           
       </div>
   </div>
</body>
<?php require_once 'core/init_foot.php'; ?>