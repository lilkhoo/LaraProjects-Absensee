<x-layouts.login>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="/register" method="POST">

                        @csrf
                        {{-- Username Input --}}
                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="name" class="form-control form-control-lg"
                                placeholder="Username..." />
                            <label class="form-label" for="name">Username</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="Email Address..." />
                            <label class="form-label" for="email">Email address</label>
                        </div>
                        {{-- <div class="form-outline mb-4">
                            <input type="email" name="rombel_id" id="rombel_id" class="form-control form-control-lg"
                                placeholder="" />
                            <label class="form-label" for="rombel_id">Email address</label>
                        </div> --}}

                        {{-- NIS Input --}}
                        {{-- <div class="form-outline mb-4">
                            <input type="text" name="nis" id="nis" class="form-control form-control-lg"
                                placeholder="NIS" />
                            <label class="form-label" for="nis">NIS</label>
                        </div> --}}

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Password..." />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already Have An Account ? <a href="/login"
                                    class="link-danger">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.login>
