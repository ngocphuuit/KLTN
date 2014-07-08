var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeft = document.getElementById( 'showLeft' ),
				body = document.body;

			showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
                classie.toggle( menuLeft, 'change-width' );
				disableOther( 'showLeft' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
                if(body.onclick){
                    classie.toggle( showLeft, 'disabled' );
                }
			}
            