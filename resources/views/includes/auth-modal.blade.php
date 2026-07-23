<div class="pf-auth-modal" id="pfAuthModal" hidden aria-hidden="true">
    <div class="pf-auth-modal-backdrop" data-auth-close></div>

    <section class="pf-auth-modal-dialog" role="dialog" aria-modal="true" aria-label="Authentication and onboarding" tabindex="-1">
        <button class="pf-auth-modal-close" type="button" data-auth-close aria-label="Close authentication modal">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>

        <div class="pf-auth-modal-view is-active" data-auth-view="sign-in">
            <div class="pf-auth-form-panel">
                <div class="pf-auth-modal-header">
                    <!-- <span class="pf-auth-modal-mark" aria-hidden="true">CI</span> -->
                    <!-- <p class="pf-auth-modal-kicker">Secure account access</p> -->
                    <h2 id="pfAuthModalTitle">Welcome back!</h2>
                    <p>Sign in to continue your tax filing, NTN, GST, or business registration case.</p>
                </div>

                <form class="pf-auth-modal-form" data-auth-form="sign-in" action="#" method="post">
                    @csrf
                    <div class="pf-auth-field">
                        <label for="modalSigninEmail">Email address</label>
                        <div class="pf-auth-input-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <input id="modalSigninEmail" name="signin_email" type="email" autocomplete="email" placeholder="you@example.com" required>
                        </div>
                    </div>

                    <div class="pf-auth-field">
                        <label for="modalSigninPassword">Password</label>
                        <div class="pf-auth-password-row">
                                <div class="pf-auth-input-icon">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <input id="modalSigninPassword" name="signin_password" type="password" autocomplete="current-password" minlength="8" placeholder="Enter your password" required>
                                    <button class="pf-auth-password-toggle" type="button" data-modal-password-toggle aria-controls="modalSigninPassword" aria-label="Show password">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                        </div>
                    </div>

                    <div class="pf-auth-meta-row">
                        <div class="form-check pf-auth-check">
                            <input class="form-check-input" type="checkbox" id="modalRememberMe" name="remember_me">
                            <label class="form-check-label" for="modalRememberMe">Remember me</label>
                        </div>
                        <button class="pf-auth-link-button" type="button" data-auth-switch="forgot-password">Forgot password?</button>
                    </div>

                    <button class="btn pf-auth-primary-button" type="submit">
                        Sign In <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </form>

                <p class="pf-auth-switch-text">
                    New here?
                    <button type="button" data-auth-switch="sign-up">Create your account <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </p>
            </div>
        </div>

        <div class="pf-auth-modal-view" data-auth-view="sign-up" hidden>
            <div class="pf-auth-form-panel">
                <div class="pf-auth-modal-header">
                    <!-- <span class="pf-auth-modal-mark" aria-hidden="true">CI</span> -->
                    <!-- <p class="pf-auth-modal-kicker">Free to start</p> -->
                    <h2>Create your account</h2>
                    <p>Join a guided online filing workflow built for taxpayers and businesses.</p>
                </div>

                <form class="pf-auth-modal-form" data-auth-form="sign-up" action="#" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="pf-auth-field">
                                <label for="modalSignupName">Full name</label>
                                <div class="pf-auth-input-icon">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <input id="modalSignupName" name="signup_name" type="text" autocomplete="name" placeholder="Your full name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pf-auth-field">
                                <label for="modalSignupPhone">Phone number</label>
                                <div class="pf-auth-input-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <input id="modalSignupPhone" name="signup_phone" type="tel" autocomplete="tel" inputmode="tel" placeholder="03xx xxx xxxx" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="pf-auth-field">
                                <label for="modalSignupPassword">Password</label>
                                <div class="pf-auth-password-row">
                                    <div class="pf-auth-input-icon">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                        <input id="modalSignupPassword" name="signup_password" type="password" autocomplete="new-password" minlength="8" placeholder="Create password" required>
                                        <button class="pf-auth-password-toggle" type="button" data-modal-password-toggle aria-controls="modalSignupPassword" aria-label="Show password">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pf-auth-field">
                                <label for="modalSignupPasswordConfirmation">Confirm password</label>
                                <div class="pf-auth-password-row">
                                    <div class="pf-auth-input-icon">
                                        <i class="fa fa-shield" aria-hidden="true"></i>
                                        <input id="modalSignupPasswordConfirmation" name="signup_password_confirmation" type="password" autocomplete="new-password" minlength="8" placeholder="Confirm password" required>
                                        <button class="pf-auth-password-toggle" type="button" data-modal-password-toggle aria-controls="modalSignupPasswordConfirmation" aria-label="Show password">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="pf-auth-field">
                        <label for="modalSignupEmail">Email address</label>
                        <div class="pf-auth-input-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <input id="modalSignupEmail" name="signup_email" type="email" autocomplete="email" placeholder="you@example.com" required>
                        </div>
                    </div>
                    <div class="form-check pf-auth-check pf-auth-terms-check">
                        <input class="form-check-input" type="checkbox" id="modalTerms" name="terms" required>
                        <label class="form-check-label" for="modalTerms">I agree to the Terms &amp; Conditions and Privacy Policy.</label>
                    </div>

                    <button class="btn pf-auth-primary-button" type="submit">
                        Create Account <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </form>

                <p class="pf-auth-switch-text">
                    Already have an account?
                    <button type="button" data-auth-switch="sign-in">Sign in <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </p>
            </div>
        </div>

        <div class="pf-auth-modal-view" data-auth-view="forgot-password" hidden>
            <div class="pf-auth-form-panel pf-auth-compact-panel">
                <div class="pf-auth-modal-header">
                    <!-- <span class="pf-auth-modal-mark" aria-hidden="true">CI</span> -->
                    <p class="pf-auth-modal-kicker">Account recovery</p>
                    <h2>Reset your password</h2>
                    <p>Enter your email address and we will prepare a secure password reset flow.</p>
                </div>

                <form class="pf-auth-modal-form" data-auth-form="forgot-password" action="#" method="post">
                    @csrf
                    <div class="pf-auth-field">
                        <label for="modalForgotEmail">Email address</label>
                        <div class="pf-auth-input-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <input id="modalForgotEmail" name="forgot_email" type="email" autocomplete="email" placeholder="you@example.com" required>
                        </div>
                    </div>

                    <button class="btn pf-auth-primary-button" type="submit">
                        Continue <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </form>

                <p class="pf-auth-switch-text">
                    Remembered it?
                    <button type="button" data-auth-switch="sign-in">Back to sign in</button>
                </p>
            </div>
        </div>

        <div class="pf-auth-modal-view" data-auth-view="get-started" hidden>
            <form class="pf-onboarding" data-onboarding-form action="#" method="post" novalidate>
                @csrf
                <aside class="pf-onboarding-stepper" aria-label="Get started progress">
                    <!-- <span class="pf-auth-modal-mark" aria-hidden="true">CI</span> -->
                    <p class="pf-auth-modal-kicker">Premium onboarding</p>
                    <h2>Get started</h2>
                    <ol class="pf-stepper-list">
                        <li class="is-active" data-step-indicator="0">
                            <span class="pf-stepper-dot"><i class="fa fa-check" aria-hidden="true"></i><b>1</b></span>
                            <span>Choose Service</span>
                        </li>
                        <li data-step-indicator="1">
                            <span class="pf-stepper-dot"><i class="fa fa-check" aria-hidden="true"></i><b>2</b></span>
                            <span>Personal Information</span>
                        </li>
                        <li data-step-indicator="2">
                            <span class="pf-stepper-dot"><i class="fa fa-check" aria-hidden="true"></i><b>3</b></span>
                            <span>Business Information</span>
                        </li>
                        <li data-step-indicator="3">
                            <span class="pf-stepper-dot"><i class="fa fa-check" aria-hidden="true"></i><b>4</b></span>
                            <span>Review &amp; Submit</span>
                        </li>
                    </ol>
                </aside>

                <div class="pf-onboarding-content">
                    <div class="pf-onboarding-progress" aria-hidden="true">
                        <span data-onboarding-progress></span>
                    </div>

                    <section class="pf-onboarding-step is-active" data-onboarding-step="0" aria-labelledby="stepServiceTitle">
                        <div class="pf-onboarding-heading">
                            <p class="pf-auth-modal-kicker">Step 1 of 4</p>
                            <h3 id="stepServiceTitle">Choose a service</h3>
                            <p>Select the service that best fits your current filing need.</p>
                        </div>

                        <input type="hidden" id="selectedService" name="selected_service" data-selected-service required>

                        <div class="pf-service-choice-grid">
                            <button class="pf-service-choice" type="button" data-service-card data-service-title="Individual Tax Filing">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="pf-service-check"><i class="fa fa-check" aria-hidden="true"></i>  </span>
                              <strong>Individual Tax Filing</strong>
                                <small>Salary, freelancer, property, or mixed income return support.</small>
                            </button>
                            <button class="pf-service-choice" type="button" data-service-card data-service-title="Business Registration">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <span class="pf-service-check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <strong>Business Registration</strong>
                                <small>Sole proprietor, partnership, or company setup guidance.</small>
                            </button>
                            <button class="pf-service-choice" type="button" data-service-card data-service-title="Sales Tax Registration">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                <span class="pf-service-check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <strong>Sales Tax Registration</strong>
                                <small>GST registration and compliance onboarding for businesses.</small>
                            </button>
                            <button class="pf-service-choice" type="button" data-service-card data-service-title="NTN Registration">
                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                <span class="pf-service-check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <strong>NTN Registration</strong>
                                <small>Get registered with FBR and start your active filer journey.</small>
                            </button>
                        </div>
                    </section>

                    <section class="pf-onboarding-step" data-onboarding-step="1" aria-labelledby="stepPersonalTitle" hidden>
                        <div class="pf-onboarding-heading">
                            <p class="pf-auth-modal-kicker">Step 2 of 4</p>
                            <h3 id="stepPersonalTitle">Personal information</h3>
                            <p>We use these details to identify your case and contact you with updates.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardFullName">Full name</label>
                                    <input id="onboardFullName" name="full_name" type="text" autocomplete="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardEmail">Email address</label>
                                    <input id="onboardEmail" name="email" type="email" autocomplete="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardPhone">Phone number</label>
                                    <input id="onboardPhone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardCnic">CNIC / National ID <span>Optional</span></label>
                                    <input id="onboardCnic" name="cnic" type="text" inputmode="numeric">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pf-auth-field">
                                    <label for="onboardCity">City</label>
                                    <input id="onboardCity" name="city" type="text" autocomplete="address-level2" required>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="pf-onboarding-step" data-onboarding-step="2" aria-labelledby="stepBusinessTitle" hidden>
                        <div class="pf-onboarding-heading">
                            <p class="pf-auth-modal-kicker">Step 3 of 4</p>
                            <h3 id="stepBusinessTitle">Business information</h3>
                            <p>Share the business context so our team can route your request correctly.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardBusinessName">Business name</label>
                                    <input id="onboardBusinessName" name="business_name" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardBusinessType">Business type</label>
                                    <select id="onboardBusinessType" name="business_type" required>
                                        <option value="">Select type</option>
                                        <option>Sole Proprietorship</option>
                                        <option>Partnership</option>
                                        <option>Private Limited Company</option>
                                        <option>Freelance / Self Employed</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardIndustry">Industry</label>
                                    <input id="onboardIndustry" name="industry" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pf-auth-field">
                                    <label for="onboardRevenue">Annual revenue <span>Optional</span></label>
                                    <input id="onboardRevenue" name="annual_revenue" type="number" min="0" inputmode="numeric">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pf-auth-field">
                                    <label for="onboardBusinessAddress">Business address</label>
                                    <textarea id="onboardBusinessAddress" name="business_address" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="pf-onboarding-step" data-onboarding-step="3" aria-labelledby="stepReviewTitle" hidden>
                        <div class="pf-onboarding-heading">
                            <p class="pf-auth-modal-kicker">Step 4 of 4</p>
                            <h3 id="stepReviewTitle">Review &amp; submit</h3>
                            <p>Confirm your information before reserving your onboarding request.</p>
                        </div>

                        <div class="pf-review-grid">
                            <article>
                                <h4>Selected Service</h4>
                                <p data-review="selected_service">Not selected</p>
                            </article>
                            <article>
                                <h4>Personal Information</h4>
                                <dl>
                                    <div><dt>Name</dt><dd data-review="full_name">-</dd></div>
                                    <div><dt>Email</dt><dd data-review="email">-</dd></div>
                                    <div><dt>Phone</dt><dd data-review="phone">-</dd></div>
                                    <div><dt>CNIC / ID</dt><dd data-review="cnic">-</dd></div>
                                    <div><dt>City</dt><dd data-review="city">-</dd></div>
                                </dl>
                            </article>
                            <article>
                                <h4>Business Information</h4>
                                <dl>
                                    <div><dt>Business</dt><dd data-review="business_name">-</dd></div>
                                    <div><dt>Type</dt><dd data-review="business_type">-</dd></div>
                                    <div><dt>Industry</dt><dd data-review="industry">-</dd></div>
                                    <div><dt>Revenue</dt><dd data-review="annual_revenue">-</dd></div>
                                    <div><dt>Address</dt><dd data-review="business_address">-</dd></div>
                                </dl>
                            </article>
                        </div>

                        <div class="form-check pf-auth-check pf-auth-terms-check">
                            <input class="form-check-input" type="checkbox" id="onboardConfirm" name="confirm_information" required>
                            <label class="form-check-label" for="onboardConfirm">I confirm that the information provided is correct.</label>
                        </div>
                    </section>

                    <section class="pf-onboarding-complete" data-onboarding-complete hidden>
                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                        <h3>Request received</h3>
                        <p>Your onboarding request is ready. Our team can now follow up with the next filing steps.</p>
                        <button class="btn pf-auth-primary-button" type="button" data-auth-close>Close</button>
                    </section>

                    <div class="pf-onboarding-actions" data-onboarding-actions>
                        <button class="btn pf-auth-secondary-button" type="button" data-onboarding-prev>Previous</button>
                        <button class="btn pf-auth-primary-button" type="button" data-onboarding-next disabled>
                            Continue <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                        <button class="btn pf-auth-primary-button" type="submit" data-onboarding-submit hidden disabled>
                            Finish / Submit <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </section>
</div>
