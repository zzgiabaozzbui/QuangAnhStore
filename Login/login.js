$(function () {
    // Use strict  có nghĩa là sử dụng sự nghiêm ngặt.
    // tất cả các dòng code ở phía dưới dòng khai báo use strict sẽ được quản lý một cách nghiêm ngặt hơn về cú pháp 
    "use strict";

    
    $(".login__btnLogin").click(function () {
        //300: là thời gian animation chạy
        //Quy đổi: 1000 = 1s
        $(".main").animate({
            "height": "3px",
            "top": "50vh",
            "padding": "0"
        }, 3000)
        
        .animate({
            "width": "2px",
            "left": "50%"
        }, 900)

    });

});
