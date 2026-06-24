<?php include('header-top.php'); ?>
<title>Sample Kit | GVI Luxury Hardware That Makes Furniture Feel Premium.</title>
<?php include('header.php'); ?>
<section class="page-header">
   <div class="bg-img" data-background="assets/img/bg-img/sample-kit-header-img-07.webp"></div>
   <div class="overlay"></div>
   <div class="container">
      <div class="page-header-content">
         <h1 class="title">Request a Sample Kit</h1>
         <h4 class="sub-title">
            Explore GVI Italy products with a personalized sample kit
            </h4>
      </div>
   </div>
</section>
<section class="career-form-section pt-60 pb-100">
    <div class="container container-2">
        <div class="row gy-lg-0 gy-4 fade-wrapper">
            <div class="col-lg-12 col-md-12 fade-top">
                <div class="brochure-box">
                    <div class="section-heading text-center mb-40">
                        <h2 class="section-title title-2">
                            Request Your <span>Sample Kit</span>
                        </h2>

                        <p class="sample-kit">
                            Tell us about your requirements and we'll help you choose the right GVI Italy products for your project.
                        </p>
                    </div>
                    <div class="container">
                        <div class="gallary-item-wrap-inner">
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/cabinet-handle1.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/cabinet-handle1.png" alt="img"></a>
                       
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/clip-on-hinges.jpg" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/clip-on-hinges.jpg" alt="img"></a>
                      
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/kids-knob1.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/kids-knob1.png" alt="img"></a>
                        
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/metro-tandom-box.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/metro-tandom-box.png" alt="img"></a>
                            
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/night-latch1.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/night-latch1.png" alt="img"></a>
                  
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/pantry.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/pantry.png" alt="img"></a>
                  
                            </div>
                            <div class="gallary-item-inner">
                                <a href="assets/img/samplekit/quardo-channel.png" class="venobox" data-gall="gallary1"><img src="assets/img/samplekit/quardo-channel.png" alt="img"></a>
                  
                            </div>
                        </div>
                    </div>
                    
                    <form action="sample-kit-submit.php" method="POST">
                        <input type="hidden" name="form_type" value="Sample Kit Request">
                        <div class="mt-5">
                            <h6 class="career-form-label mb-3">
                                Your Profession
                            </h6>
                            <div class="career-radio-wrap">
                                <label class="career-radio">
                                    <input type="radio" name="user_type" value="Architect" required>
                                    <span>Architect</span>
                                </label>

                                <label class="career-radio">
                                    <input type="radio" name="user_type" value="Manufacturer">
                                    <span>Manufacturer</span>
                                </label>

                                <label class="career-radio">
                                    <input type="radio" name="user_type" value="Retailer">
                                    <span>Retailer</span>
                                </label>

                                <label class="career-radio">
                                    <input type="radio" name="user_type" value="End User">
                                    <span>End User</span>
                                </label>

                                <label class="career-radio">
                                    <input type="radio" name="user_type" value="Carpenter">
                                    <span>Carpenter</span>
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
                                >
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
                            Request Sample Kit
                            <span class="icon">
                            <i class="fa-regular fa-arrow-right"></i>
                            </span>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</section>
<?php include('footer.php'); ?>