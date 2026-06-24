<?php include('header-top.php'); ?>
<title>Talk To Expert | GVI Luxury Hardware That Makes Furniture Feel Premium.</title>
<?php include('header.php'); ?>
<section class="page-header">
   <div class="bg-img" data-background="assets/img/bg-img/talk-to-an-expert-header-img.webp"></div>
   <div class="overlay"></div>
   <div class="container">
      <div class="page-header-content">
         <h1 class="title">Talk To An Expert</h1>
         <h4 class="sub-title">Get Personalized Guidance From Our Hardware Specialists</a>
         </h4>
      </div>
   </div>
</section>
<section class="career-form-section pt-60 pb-100">
    <div class="container container-2">
        <div class="row gy-lg-0 gy-4 fade-wrapper">
            <div class="col-lg-7 col-md-12 fade-top">
                <div class="brochure-box">
                    <div class="section-heading text-center mb-40">
                        <h2 class="section-title title-2">
                            Your Project. <span>Our Expertise.</span>
                        </h2>

                        <p>
                            Behind every successful project stands the GVI team that genuinely cares.
                        </p>
                    </div>
                    <form action="talk-to-expert-submit.php" method="POST">
                        <input type="hidden" name="form_type" value="Talk To Expert">
                        <div class="mt-5">
                            <h6 class="career-form-label mb-3">
                                I Would Like To Speak With An Expert For
                            </h6>
                            <div class="career-radio-wrap">
                            <label class="career-radio">
                            <input type="radio" name="category" value="Modular Kitchen Fittings" required>
                            <span>Modular Kitchen Fittings</span>
                            </label>
                            <label class="career-radio">
                            <input type="radio" name="category" value="Modular Wardrobe Fittings">
                            <span>Modular Wardrobe Fittings</span>
                            </label>
                            <label class="career-radio">
                            <input type="radio" name="category" value="Architectural Furniture">
                            <span>Architectural Furniture</span>
                            </label>
                            <label class="career-radio">
                            <input type="radio" name="category" value="Drawer locks">
                            <span>Drawer locks</span>
                            </label>
                            <label class="career-radio">
                            <input type="radio" name="category" value="Aluminium Profiles">
                            <span>Aluminium Profiles</span>
                            </label>
                            </div>
                        </div>
                         <div class="row g-3 mt-4">
                            <h6 class="career-form-label">
                                Your Contact Information
                            </h6>
                            <div class="col-lg-6">
                            <input type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name"
                                required>
                            </div>
                            <div class="col-lg-6">
                            <input type="text"
                                class="form-control"
                                name="company"
                                placeholder="Company"
                                required>
                            </div>
                            <div class="col-lg-6">
                            <input type="tel"
                                class="form-control number-input"
                                name="mobile"
                                placeholder="Mobile Number"
                                pattern="[0-9]{10}"
                                maxlength="10"
                                minlength="10"
                                title="Please enter a valid 10-digit mobile number"
                                required>
                            </div>
                            <div class="col-lg-6">
                            <input type="email"
                                class="form-control"
                                name="email"
                                placeholder="Email Address"
                                required>
                            </div>
                        </div>
                        <div class="row g-3 mt-4">
                            <h6 class="career-form-label">
                                Your Message
                            </h6>
                            <div class="col-lg-12">
                                <textarea
                                    class="form-control message-box"
                                    name="message"
                                    rows="5"
                                    placeholder="Write here..."
                                    required></textarea>
                            </div>
                        </div>
            
                        <div class="col-12 mt-5">
                            <div class="text-center">
                            <button type="submit" class="brochure-btn tl-primary-btn">
                            Connect With An Expert
                            <span class="icon">
                            <i class="fa-regular fa-arrow-right"></i>
                            </span>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 fade-top">
                <div class="comments-area">
                    <div class="section-heading mt-2">
                        <h6 class="section-title">
                            Meet Our <span>Experts</span>
                        </h6>
                    </div>
                    <p class="expert-desc">
                        Connect with experts in product selection and hardware solutions.
                    </p>
                    <div class="comment-item mt-4">
                        <div class="comment-thumb">
                            <img src="assets/img/reena-sukhi.png" alt="author">
                        </div>
                        <div class="comment-info">
                            <div class="comment-top">
                                <h3 class="author">Reena Sukhi</h3>

                                
                            </div>
                            <div class="comments-meta">
                                    <span>Kitchen & Wardrobe Fittings Specialist</span>
                                </div>
                            <p class="expert-desc">
                                Guided 400+ manufacturers and helped solve 3000+ hardware and installation challenges across India.
                            </p>
                
                        </div>
                    </div>
                 
                    <div class="comment-item">
                        <div class="comment-thumb">
                            <img src="assets/img/neha-mehta.png" alt="author">
                        </div>
                        <div class="comment-info">
                            <div class="comment-top">
                                <h3 class="author">Neha Mehta</h3>
                            </div>
                            <div class="comments-meta">
                                    <span>Drawer Lock Specialist Guided</span>
                                </div>
                            <p class="expert-desc">
                                Trusted by manufacturers for practical product recommendations and reliable hardware guidance.
                            </p>
                        </div>
                    </div>

                    <div class="comment-item">
                        <div class="comment-thumb">
                            <img src="assets/img/rahul-arora.png" alt="author">
                        </div>
                        <div class="comment-info">
                            <div class="comment-top">
                                <h3 class="author">Rahul Arora</h3>
                            </div>
                            <div class="comments-meta">
                                    <span>Architectural & Aluminium Solutions Specialist</span>
                                </div>
                            <p class="expert-desc">
                                Trusted for practical product advice and technical expertise across architectural and aluminium solutions.
                            </p>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>