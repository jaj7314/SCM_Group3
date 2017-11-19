"use strict";

$(document).ready(function () {
/* ============================================================ Slider ============================================================ */
    var $slider = $(".slider");   //Slider
    var $slideContainer = $slider.find(".slides"); // Get the slide container
    var $slides = $slider.find(".slide");          // Create objecy to hold all slides
    var bulletArray = [];                          // Creates an array to hold bullets
    var currentIndex = 0;                          // Index of the current slide
    var timeout;                                   // Pause between sliding


    function move(newIndex) {         // Creates the slide from current to new
        var animateLeft, slideLeft;   // Variables

        startSlider();                // Call this function everytime slide moves

        // If the slide-container is animated or current slide equals new slide - do nothing
        if ($slideContainer.is(":animated") || currentIndex === newIndex) {
            return;

        }

        bulletArray[currentIndex].removeClass("active"); // Remove class from current
        bulletArray[newIndex].addClass("active");        // Add class to new slide

        if (newIndex > currentIndex) {   // If new item > current
            slideLeft = '100%';            // Sit the new slide to the right
            animateLeft = '-100%';         // Animate the current group to the left
        } else {                         // Otherwise
            slideLeft = '-100%';           // Sit the new slide to the left
            animateLeft = '100%';          // Animate the current group to the right
        }
        // Position new slide to left (if less) or right (if more) of current
        $slides.eq(newIndex).css({ left: slideLeft, display: 'block' });

        $slideContainer.animate({ left: animateLeft }, function () {    // Animate slides and
            $slides.eq(currentIndex).css({ display: 'none' }); // Hide previous slide
            $slides.eq(newIndex).css({ left: 0 });             // Set position of the new slide
            $slideContainer.css({ left: 0 });                  // Set position of slide-container of slides
            currentIndex = newIndex;                           // Set currentIndex to the new image
        });


    }

    function startSlider() {                     // Starts auto-sliding
        clearTimeout(timeout);                     // Clear previous timeout
        timeout = setTimeout(function () {          // Set new timer
            if (currentIndex < ($slides.length - 1)) { // If slide < total slides
                move(currentIndex + 1);                // Move to next slide
            } else {                                 // Otherwise
                move(0);                               // Move to the first slide
            }
        }, 3000);                             // Milliseconds timer will wait

    }

    function pauseSlider() {             // Pause slider
        clearTimeout(timeout);

    }

    //Bullets:

    $.each($slides, function (index) {
        // Create a bullet element for the bullet
        var $bullet = $('<button type="button" class="bullet";</button>');
        if (index === currentIndex) {    // If index is the current item
            $bullet.addClass("active");    // Add the active class
        }
        $bullet.on("click", function () { // Create event handler for the bullet
            move(index);                  // It calls the move() function
            clearInterval(timeout);
        }).appendTo(".bullets");   // Add to the bullets holder
        bulletArray.push($bullet);       // Add it to the bullet array
    });

    $slider.on("mouseenter", pauseSlider).on("mouseleave", startSlider); // Pauses and starts slider on mouse event

    startSlider();

    // Controllers:

    $slider.hover( showControllers, hideControllers); // Show and hide controllers

    // Animates the controllers on mouseenter

    function showControllers() {
        $(".next").animate({ "right": "0%" }, 300);
        $(".prev").animate({ "left": "0%" }, 300);


    }

    // Hides controllers on mouseleave

    function hideControllers() {
        $(".next").animate({ "right": "-999%" }, 300);
        $(".prev").animate({ "left": "-999%" }, 300);

    }

    // Moves the slidesx`

    $(".next").click(function () {
        if (currentIndex < ($slides.length - 1)) {
            move(currentIndex + 1);

        } else {
            move(0);
        }
        clearInterval(timeout);   // Clears previous timeout


    })

    $(".prev").click(function () {
        if (currentIndex > 0) {
            move(currentIndex - 1);

        } else {
            move($slides.length - 1);
        }

        clearTimeout(timeout);    // Clears previous timeout


    }
    )
    

/* ============================================================ Login ============================================================ */
	var $form_modal = $('.cd-user-modal'),
		$form_login = $form_modal.find('#cd-login'),
		$form_signup = $form_modal.find('#cd-signup'),
		$form_forgot_password = $form_modal.find('#cd-reset-password'),
		$form_modal_tab = $('.cd-switcher'),
		$tab_login = $form_modal_tab.children('li').eq(0).children('a'),
		$tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
		$forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
		$back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
		$main_nav = $('.main-nav');

	//open modal
	$main_nav.on('click', function(event){

        event.preventDefault();
		if( $(event.target).is($main_nav) ) {
			// on mobile open the submenu
			$(this).children('ul').toggleClass('is-visible');
		} else {
			// on mobile close submenu
			$main_nav.children('ul').removeClass('is-visible');
			//show modal layer
			$form_modal.addClass('is-visible');	
			//show the selected form
			( $(event.target).is('.cd-signup') ) ? signup_selected() : login_selected();
		}

	});

	//close modal
	$('.cd-user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.cd-close-form') ) {
            $form_modal.removeClass('is-visible');
            clear_textbox($form_modal);
		}	
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
            $form_modal.removeClass('is-visible');
            clear_textbox($form_modal);
	    }
    });

	//switch from a tab to another
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
	});

	//show forgot-password form 
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
		$('#loginerror').removeClass('is-visible');	
		clear_textbox($form_modal);
	}

	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
		$('#registererror').removeClass('is-visible');	
		clear_textbox($form_modal);
	}

	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
    }

    function clear_textbox($form) {
        $form.find('input[type=text]').val('');
        $form.find('input[type=email]').val('');
        $form.find('input[type=password]').val('');
    }
	$("#registerform").submit(function (e) {
		var data = $("#registerform :input" ).serializeArray();
		e.preventDefault();
		$.post('register.php',data, function(info){
			if(info == 'success'){
				$('#registererror').removeClass('is-visible');	
<<<<<<< HEAD
				window.location = "index.php";
=======
				window.location = "sentemail.php";
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
			}
			else if (info == 'username'){
				$('#registererror').html('The username already exists!!');
				$('#registererror').addClass('is-visible');				
			}
			else if (info == 'password'){
				$('#registererror').html('Please enter the same password.');
				$('#registererror').addClass('is-visible');
			}
		});
		
	})

	$("#loginform").submit(function (e) {
		var data = $("#loginform :input" ).serializeArray();
		e.preventDefault();
		$.post('login.php',data, function(info){
			if(info == 'success'){
				window.location = "index.php";
			} 
			else {
				$('#loginerror').html('Wrong username or password.');
				$('#loginerror').addClass('is-visible');
			}
			
		});
		
	})

	$('.menupanel').submit(function (e) {
		var data = $(".menupanel :input").serializeArray();
		e.preventDefault();
		var code = $(this).find('#code').val();
		$.post('addtocart.php?action=add&code=' + code ,data, function(info){
			if(info == 'success'){
				alert("Added into cart successfully!");
				$("#cart_price").load("pasta.php #cart_price div");
			}
		})
	})
	
	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}
/* ============================================================ Redirect ============================================================ */





}) //End of DOM



//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};