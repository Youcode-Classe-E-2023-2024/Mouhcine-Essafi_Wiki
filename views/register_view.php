<section class="min-vh-100 d-flex justify-content-center align-items-center bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h5 class="text-white text-center mt-5 mb-4">Create Your Account</h5>
                <form id="register_Form">
                    <div class="form-group mb-3" style="display: flex;">
                        <input class="form-control py-4" type="text" placeholder="First Name" name="first_name" required />
                        <input class="form-control py-4" type="text" placeholder="Last Name" name="last_name" required />
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control py-4 w-100" type="email" placeholder="Email Address" name="email" required />
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control py-4 w-100" type="password" placeholder="Password" name="password" required />
                    </div>
                    <div class="form-group mb-4">
                        <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="text-center">
                        <span class="text-white-50">Already have an account?</span>
                        <a href="index.php?page=login" class="text-primary font-weight-bold">Login here <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>