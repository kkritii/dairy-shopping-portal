
        <!-- MODAL checkRate -->
        <div class="modal modal-checkrate">
            <div class="modal_container">
                <div class="modal--close" id="close-checkrate">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="check-rate">
                    <img src="./imgs/drawkit-server-woman-colour.svg" alt="women using laptop" class="check-rate-img">
                    <div class="right-group">
                        <div class="heading">
                            <span class="heading__primary--main">Check Rates<span class="dot">.</span></span>
                            <span class="heading__secondary--sub-sub">Calculate Delivery Cost to your local
                                address.</span>
                        </div>
                        <form action="" class="form">
                            <div class="u-margin-top-small">
                                <span class="heading__secondary--sub">From</span>
                                <input type="text" class="rate__form--source form__input"
                                     value="Kamalbinayak-10,Bhaktapur" readonly>
                            </div>
                            <div class="u-margin-top-small">
                                <span class="heading__secondary--sub">To</span>
                                <input type="text" class="rate__form--destination form__input"
                                    placeholder="Select the destination" required>
                            </div>
                            <input type="button" class="form-btn btn u-margin-top-mid" value="CHECK RATES"
                                type="submit">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of modal checkrate -->
        
        <!-- Modal contact-us -->
        <div class="modal modal-contactus">
            <div class="modal_container">
                <div class="modal--close" id="close-contactus">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="contactus">
                    <div class="left-group">
                        <div class="heading">
                            <span class="heading__primary--main">Drop us a line<span class="dot">.</span></span>
                        </div>
                        <form action="" class="form">
                            <div class="u-margin-top-small">
                                <input type="text"
                                    class="form--destination form__input form__input__contact"
                                    placeholder="Full Name" required>
                                <label for="text" class="form__label">Full Name</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="email" class="form--destination form__input form__input__contact" placeholder="Email" required>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="tel" class="form--destination form__input form__input__contact" placeholder="Contact Number" required>
                                <label for="tel" class="form__label">Contact Number</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="text" class="form--destination form__input form__input__contact" placeholder="Message" required>
                                <label for="text" class="form__label">Message</label>
                            </div>


                            <input type="submit" class="form-btn btn u-margin-top-small" value="Submit" type="submit"
                                required>
                        </form>
                    </div>
                    <img src="./imgs/rsz_contact-illustration.png" alt="" class="contactus-img">

                </div>

            </div>
        </div>
        <!-- end of modal checkrate -->

        <!-- modal signin -->
        <div class="modal modal-signin" >
            <div class="modal-signin-container">
                <div class="modal--close" id="close-signin">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="signin">
                    <form action="./includes/login.php" class="signin-form" method="POST">
                        <span class="heading__secondary--main">Login to you Account</span>
                        <!-- <span class="heading__secondary--sub-sub">Join us to get exclusive offers.</span> -->
                       
                        <div class="form__group">
                            <input type="email" name="login_email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__group">
                            <input type="password" name="login_password" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__group">
                            <input type="submit" name="login_submit" placeholder="" class=" form-btn u-margin-top-mid" value="Login">
                        </div>

                        <div class="form__group">
                            <a href="">Forgot your Password?</a>
                        </div>   
                        <div class="form__group">
                            <span>Dont have an Account?</span>
                            <a href="#" id="signup" class="badge-blue">Sign up</a>
                        </div>                        
                    </form>
                </div>
            </div>
            
        </div>
        <!-- end of modal checkrate -->

        <div class="modal modal-signup" >
            <div class="modal-signup-container">
                <div class="modal--close" id="close-signup">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="signup">
                    <form id="signup_form" action="./includes/signup.php" class="signup-form" method="POST">
                        <span class="heading__secondary--main">SIGN UP</span>
                        <span class="heading__secondary--sub-sub">Join us to get exclusive offers.</span>
                        <div class="form__group">
                            <input type="text" name="full_name" id="signup_name"  placeholder="" class="form__input u-margin-top-small" required>
                            <label for="text" class="form__label">Full name</label>
                        </div>
                        <div class="form__group">
                            <input type="email" name="email" id="signup_email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__group">
                            <input type="text" name="contact" id="signup_123" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="signup_123" class="form__label">Contact no.</label>
                        </div>
                        <div class="form__group">
                            <input type="text" name="address" id="signup_address" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="signup_address" class="form__label">Address</label>
                        </div>
                        <div class="form__group">
                            <input type="password" name="password" id="signup_password" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__group">
                            <span class="form__message" id="signup_message"></span>
                        </div>
                        <div class="form__group">
                            <input type="submit" name="submit_signup" id="signup_submit" placeholder="" class=" form-btn u-margin-top-mid" value="Sign Up">
                        </div>
                        
                        <div class="form__group">
                            <span>Already have an Account?</span>
                            <a href="#" id="temp">Sign in</a>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>

    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/script.js"></script>
    
    <!-- Validate Email jquery -->
    <script>
        $(document).ready(function(){
            $('#signup_form').submit(function(event){
                event.preventDefault();
                var name = $("#signup_name").val();
                var email = $("#signup_email").val();
                var contact = $('#signup_123').val();
                var address = $("#signup_address").val();
                var password = $("#signup_password").val();
                var submit = $("#signup_submit").val();
                $('#signup_message').load('./includes/signup.php',{
                    name: name,
                    email: email,
                    address: address,
                    contact: contact,
                    password: password,
                    submit: submit
                });
            });
        });
    </script>
    <!--end of Validate Email jquery -->
    
    <!-- Slick slider script -->
     <script>
        $(document).ready(function() {
             $(".slick-slider").slick({
                arrows: true,
                  dots: true,
                  infinite: false,
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  initialSlide:0,
                  rows:1,
                //   autoplay:true,
                //   centerMode:true,
                  responsive: [
                       {
                            breakpoint: 768,
                            settings: {
                                 arrows: false,
                                 centerMode: true,
                                 centerPadding: "40px",
                                 slidesToShow: 3
                            }
                       },
                       {
                            breakpoint: 480,
                            settings: {
                                 arrows: false,
                                 centerMode: true,
                                 centerPadding: "40px",
                                 slidesToShow: 1
                            }
                       }
                  ]
             });
        });
   </script>
   <!-- end of slick slider script -->


    <script>
        document.getElementById('checkRate').addEventListener('click',
            function () {
                document.querySelector('.modal-checkrate').style.display = 'flex';
            })
        document.getElementById('contactus').addEventListener('click',
            function () {
                document.querySelector('.modal-contactus').style.display = 'flex';
            })
            document.getElementById('signin').addEventListener('click',
            function () {
                document.querySelector('.modal-signin').style.display = 'flex';
            })
            document.getElementById('signup').addEventListener('click',
            function () {
                document.querySelector('.modal-signup').style.display = 'flex';
            })
            // document.getElementById('temp').addEventListener('click',
            // function () {
            //     document.querySelector('.modal-signin').style.display = 'flex';
            // })
    </script>