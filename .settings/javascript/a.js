
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const list = $(".list-option")
			console.log("item")
			console.log(list)
            item.onclick(function(){
                const value = $(this).attr('data-filter');
                if (value == 'all'){
                    $('.col-sm-4').show('1000');
                }
                else{
                    $('.col-sm-4').not('.'+value).hide('1000');
                    $('.col-sm-4').filter('.'+value).show('1000');
                }
            })
            
		function myFunction() {
			location.assign("https://www.google.com/maps/place/Tp.+Qui+Nh%C6%A1n,+B%C3%ACnh+%C4%90%E1%BB%8Bnh,+Vi%E1%BB%87t+Nam/@13.7859159,109.0876157,11z/data=!3m1!4b1!4m5!3m4!1s0x316f6c65736eabd9:0xd362348e5af3d559!8m2!3d13.7829673!4d109.2196634?hl=vi-VN");
		}