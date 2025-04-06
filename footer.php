



<!------modal------>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
                <div class="header-contact-box aos-init aos-animate h-3-heading" data-aos="zoom-in-up" data-aos-duration="1000">
                    <h3>Make An Enquiry</h3>
                    <div class="space32"></div>
                    <div class="input-area">
                        <input type="text" placeholder="Full Name*">
                    </div>
                    <div class="space24"></div>
                    <div class="input-area">
                        <input type="number" placeholder="Phone Number*">
                    </div>
                    <div class="space24"></div>
                    <div class="input-area">
                        <input type="text" placeholder="Email*">
                    </div>
                    <div class="space24"></div>
                    <div class="input-area">
                        <textarea placeholder="Your Message*"></textarea>
                    </div>
                    
                   
                  
                   
                        <select name="country" class="from-select my-3">
                            <option value="">Select Project</option>
                               <?php 
                                   foreach($connect->query("SELECT * FROM properties") as $list){ 
                                ?>
                            <option value="<?= $list['prop_title']?>"><?= $list['prop_title']?></option>
                            <?php } ?>
                          </select>
                  
                                   
                    <div class="space32"></div>
                    <div class=" text-end">
                       <button type="submit" class="header-btn4">Send Message</button>
                    </div>
                </div>
            
      </div>
      
    </div>
  </div>
</div>



<!-----side---button------>
<div class="side-button">
    <a class="btn book-now desktop open-datepicker-popup" href="#" title="Book Now" type="button" class="btn btn-primary pop-upp" data-bs-toggle="modal" data-bs-target="#exampleModal">Enquire Now</a>
<div class="scroll"></div>
</div>




<!--===== FOOTER AREA STARTS =======-->
<div class="footer3-section-area" style="background: #2f4382;">
  <div class="footer3-bottom-section">
    <div class="container p-0 media">
        <div class="row">
            
            <div class="col-lg-2">
                <div class="ftr-logo">
                    <a href="<?= $baseUrl?>"><img src="<?= $baseUrl?>assets/images/logo/footer-adore_logo.png" alt="" style="margin-bottom: 25px;width: 80%;"></a>
                    <div class="footer-social">
                       <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mob-dis">
                <div class="footer-menu ">
                    <h3>Quick Links</h3>
                    <ul class="prop_tye ftr"> 
                        <li><a href="<?= $baseUrl?>">Home</a></li>
                        <li><a href="<?= $baseUrl?>about-us.php">About Us</a></li>
                        <li><a href="<?= $baseUrl?>career.php">Career</a></li>
                        <li><a href="<?= $baseUrl?>blog.php">News/Media</a></li>
                        <li><a href="<?= $baseUrl?>contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 mob-dis">
                <div class="footer-menu dis-prop">
                    <h3>Property Type</h3>
                    <ul class="prop_tye ftr"> 
                        <?php 
                           foreach($connect->query("SELECT * FROM property_type") as $list){ 
                        ?>
                        <li><a href="<?=$baseUrl?>list/<?=$list['ptype_slug']?>.php"><?=$list['ptype_name']?></a></li>
                        <?php }?>
                        <!--<li><a href="#">Commercial</a></li>-->
                        <!--<li><a href="">Industrial</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-menu2 jst-mpb-pt">
                  <h3>Faridabad Address</h3>
                    <ul class="prop_tye ftr">
                      <li><a href="#"> <span><i class="fa-solid fa-location-dot"></i></span> <span>1F, 22-26, Ozone Centre Sec 12, <br> Faridabad-121007 Haryana, India</span></a></li>
                      
                      <li><a href="tel:918101202020"><span><i class="fa-solid fa-phone"></i></span> <span>+91-8101202020</span></a></li>
                     
                      <li><a href="mailto:info@adorerealtech.com"><span><i class="fa-solid fa-envelope"></i></span> <span>info@adorerealtech.com</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-menu2 contact-input-section  jst-mpb-pt">
                  <h3>Gurgaon Address</h3>
                  <ul class="prop_tye ftr">
                      <li><a href="#"> <span><i class="fa-solid fa-location-dot"></i></span> <span>First Floor, Splendor Tower-II,<br> Sector-58, Gurugram-122001 (Haryana)</span></a></li>
                      
                      <li><a href="tel:+919654868686"><span><i class="fa-solid fa-phone"></i></span> <span>+91-9654868686</span></a></li>
                     
                      <li><a href="mailto:info@adorerealtech.com"><span><i class="fa-solid fa-envelope"></i></span> <span>info@adorerealtech.com</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="space48"></div>-->
                <div class="ftr-bottom copyright-area">
                   <div class=" icons">
                  <ul>
                     <a href="privacy-policy.php"><li>Privacy Policy</li> </a> 
                      <a href="terms-conditions.php"> <li>Terms & Conditions</li></a> 
                       <a href="disclaimer.php"> <li>Disclaimer</li> </a>
                  </ul>
                </div>
                <div class="desk-ftr-line ">
                  <p>© 2024 Adore Real Tech - Developed by - <a> Advert India</a></p>
                </div> 
                </div>
                
              </div>
              
              
        </div>
        
        
                <div class="row">
            <div class="col-lg-12">
                <!--<div class="space48"></div>-->
                <div class="">
                  
                <div class="mobile-ftr-line ">
                  <p>© 2024 Adore Real Tech - Developed by - <a> Advert India</a></p>
                </div> 
                </div>
                
              </div>
              
              
        </div>
    </div>
  </div>
</div>
<!--===== FOOTER AREA ENDS =======-->





<script>
    // Fancybox Config
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});

</script>







<!--===== JS SCRIPT LINK =======-->
<script src="<?= $baseUrl?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/fontawesome.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/aos.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/counter.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/sidebar.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/magnific-popup.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/mobilemenu.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/owlcarousel.min.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/nice-select.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/waypoints.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/slick-slider.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/circle-progress.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/gsap.min.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/ScrollTrigger.min.js"></script>
<script src="<?= $baseUrl?>assets/js/plugins/Splitetext.js"></script>
<script src="<?= $baseUrl?>assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>


<script>
    Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
</script>


<!---counter--js---->
<script>
    document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".counter");

  counters.forEach((counter) => {
    const updateCount = (target) => {
      let count = 0;
      const duration = 4000;
      const increment = target / (duration / 100);
      const step = () => {
        count = Math.ceil(count + increment);
        counter.textContent = count;

        if (count < target) {
          requestAnimationFrame(step);
        } else {
          counter.textContent = target;
        }
      };

      requestAnimationFrame(step);
    };

    const targetValue = parseInt(counter.textContent, 10);
    updateCount(targetValue);
  });
});

</script>


<!--popup-->
<script>
    $(document).ready(function () {
  $("#popUpForm").fadeIn(1000);
});
$("#close").click(function () {
  $("#popUpForm").css("display", "none");
});

</script>

<!-----nav--tabs----->
<script>
    // Tab-Pane change function
function tabChange() {
  var tabs = $(".nav-tabs > li");
  var active = tabs.filter(".active");
  var next = active.next("li").length
    ? active.next("li").find("a")
    : tabs.filter(":first-child").find("a");
  next.tab("show");
}

$(".tab-pane").hover(
  function () {
    clearInterval(tabCycle);
  },
  function () {
    tabCycle = setInterval(tabChange, 5000);
  }
);

// Tab Cycle function
var tabCycle = setInterval(tabChange, 5000);

// Tab click event handler
$(function () {
  $(".nav-tabs a").click(function (e) {
    e.preventDefault();
    clearInterval(tabCycle);
    $(this).tab("show");
    tabCycle = setInterval(tabChange, 5000);
  });
});

</script>







</body>

</html>