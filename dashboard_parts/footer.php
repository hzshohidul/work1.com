			
			</div>
        </div>
		<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank"></a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/work1.com/dashboard_assest/vendor/global/global.min.js"></script>
	<script src="/work1.com/dashboard_assest/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/work1.com/dashboard_assest/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/work1.com/dashboard_assest/js/custom.min.js"></script>
	<script src="/work1.com/dashboard_assest/js/deznav-init.js"></script>
	<script src="/work1.com/dashboard_assest/vendor/owl-carousel/owl.carousel.js"></script>


	<!-- Summernote -->
	<script src="/work1.com/dashboard_assest/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="/work1.com/dashboard_assest/js/plugins-init/summernote-init.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="/work1.com/dashboard_assest/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="/work1.com/dashboard_assest/vendor/apexchart/apexchart.js"></script>

	<!-- Sweetalert2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<!-- Dashboard 1 -->
	<script src="/work1.com/dashboard_assest/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html>
<?php
	unset($_SESSION['name_update']);
	unset($_SESSION['image_message']);
	unset($_SESSION['message']);
	unset($_SESSION['site_link_value']);
?>