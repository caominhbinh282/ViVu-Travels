    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const list_item = $$(".slide ul li")
    const list  = $(".slide ul")
    const next = $(".slide .btn-next")
    const prev = $(".slide .btn-prev")

    let moveEnd = 68; //điểm ảnh kết thúc
    let move = 34; //di chuyển 35% khi click
    let num_img = Math.ceil(list_item.length/3);
    let l = 0;
    
   

        // slide move right
        let move_right = () =>{
            l += move;
            if(list_item == 1) l =0;
            for(const i of list_item){
                if(l > moveEnd ) l -= move;
                i.style.left = '-' + l + '%';
            }
        }
    
        // // slide move left
        let move_left = () =>{
            l -= move;
            if(l <= 0) l =0;
            for(const i of list_item)
            {
                if(num_img > 1)
                i.style.left = '-' + l + '%';
            }
        }


    prev.onclick = () => {
        move_left();
    }
    next.onclick = () => {
        move_right();
    }
    