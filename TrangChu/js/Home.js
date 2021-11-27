var danhsach = [];
var danhsachphukien = [];
var DanhsachIMGTinTuc = [];
var DanhsachSale = [];
var randompPromotion = [{
    items : 'Tặng phiếu mua hàng 2.1 triệu đồng và 1 km khác'
},{
    items : 'Giảm 1 triệu khi thanh toán qua ví Moca, thẻ tín dụng ACB, mPos, VIB, BIDV, Shinhan, Standard Charter'
} ,{
    items : '[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ và 1 km khác'
},{
    items:'Nhận gói 6 tháng Apple Music miễn phí và 1 km khác'
} 

,{
    items : 'Tặng Sim Mobifone C90N 4GB/Ngày'
} ,{
    items : 'Mua kèm dịch vụ bảo hành Apple Care giá tốt'
} ,{
    items : 'Nhận gói 6 tháng Apple Music miễn phí'
},
{
    items:'Nhận gói 6 tháng Apple Music miễn phí và 2 km khác'
}  

,{
    items : 'Ưu đãi 15% khi mua kèm điện thoại/Máy tính bảng Samsung từ 6 triệu trở lên'
} ,{
    items : '[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 300.000đ'
} ,{
    items : 'Mua Office Home & Student 2019 kèm Macbook chỉ còn 1,990,000'
} ,
];
var DanhsachGiaCu = [{
    items : '4.490.000 ₫'
},{
    items : '650.000 ₫'
} ,{
    items : '3.690.000 ₫'
},{
    items:'3.690.000 ₫'
} 

,{
    items : '4.690.000 ₫'
} ,{
    items : '9.690.000 ₫'
} ,{
    items : '43.690.000 ₫'
},
{
    items:'5.690.000 ₫'
}  

,{
    items : '6.690.000 ₫'
} ,{
    items : '2.690.000 ₫'
} ,{
    items : '3.690.000 ₫'
} ,
];


function getDataItem() {
    let i = 0;
    var list = $('.list-product-dienthoai');
    

    $.ajax({
        url: "API/DataItemAPI.php",
        method: "POST",
        data: {
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
           
            danhsach = data;
            danhsach.forEach(function (value) {
                var a = '../../Admin/Frontend/'+ value.HinhAnh;
                var $item = $('<div>', {
                    id:'dt'+ i++,
                    class: 'item-product'
                }).appendTo(list);
                var $boxImg = $('<div>', {
                    class: 'item-product__box-img'
                }).appendTo($item);
                var $a = $('<a>', {
                    href: '#'
                }).appendTo($boxImg);
                var $Aimg1 = $('<img>', {
                    id : 'size-img',
                   src :a
                }).appendTo($a);
                
                // var $sticker_percent = $('<div>', {
                //     class: 'item-product__sticker-percent'
                // }).appendTo($item);
                // var iconSticker = $('<p>', {
                //   text : '5%'
                // }).appendTo( $sticker_percent);
        
                var $boxName =  $('<div>', {
                    class: 'item-product__box-name'
                }).appendTo($item);
        
                var $aName = $('<a>', {
                    class : 'lblTenSP',
                    href: '#', text: value.TenSP
                }).appendTo($boxName);
        
                var pName =  $('<p>', {
                }).appendTo($aName);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-price'
                }).appendTo($item);
        
                var pPrice =  $('<p>',  {
                    class : 'special-price',text: new Intl.NumberFormat().format(value.Gia)+'đ'
                }).appendTo($boxprice);
        
                var $boxPromotion =  $('<div>', {
                    class: 'promotion'
                }).appendTo($item);
        
                var pPromotion =  $('<p>',  {
                    class : 'gift-cont',text: ''
                }).appendTo($boxPromotion);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-raiting'
                }).appendTo($item);
                // var box_raiting = $ ('<div>',{
                //     class: 'item-product__box-raiting'
                // }).appendTo($item);
                var icon1 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon2 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                // var icon3 = $('<i>',{
                //     class: 'icon_star ti-star'
                // }).appendTo($boxprice);
                // var icon4 = $('<i>',{
                //     class: 'icon_star ti-star'
                // }).appendTo($boxprice);
                // var icon5 = $('<i>',{
                //     class: 'icon_star ti-star'
                // }).appendTo($boxprice);

             })
             randompPromotion.forEach((x,j) => {
                var item = $('#dt'+j);
               item.find('.promotion p').text(x.items);
            });
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });   
}

getDataItem();
function getDataItemSale() {
    let i = 0;
    var list = $('.list-product-Sale');
    

    $.ajax({
        url: "API/DataItemSaleAPI.php",
        method: "POST",
        data: {
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
           
            danhsach = data;
            danhsach.forEach(function (value) {
                var a = '../../Admin/Frontend/'+ value.HinhAnh;
                var $item = $('<div>', {
                    id: 'sales'+i++,
                    class: 'item-product'
                }).appendTo(list);
                var $boxImg = $('<div>', {
                    class: 'item-product__box-img'
                }).appendTo($item);
                var $a = $('<a>', {
                    href: '#'
                }).appendTo($boxImg);
                var $Aimg1 = $('<img>', {
                    id : 'size-img',
                   src :a
                }).appendTo($a);
                var $sticker_percent = $('<div>', {
                    class: 'item-product__sticker-percent'
                }).appendTo($item);
                var iconSticker = $('<p>', {
                  text: '20%'
                }).appendTo($sticker_percent);
        
                var $boxName =  $('<div>', {
                    class: 'item-product__box-name'
                }).appendTo($item);
        
                var $aName = $('<a>', {
                    class : 'lblTenSP',
                    href: '#', text: value.TenSP
                }).appendTo($boxName);
        
                var pName =  $('<p>', {
                    text:''
                }).appendTo($aName);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-price'
                }).appendTo($item);
        
                var pPrice =  $('<p>',  {
                    class : 'special-price',text: new Intl.NumberFormat().format(value.Gia)+'đ'
                }).appendTo($boxprice);
        
                // var $boxPromotion =  $('<div>', {
                //     class: 'promotion'
                // }).appendTo($item);
        
                // var pPromotion =  $('<p>',  {
                //     class : 'gift-cont',text: 'aa'
                // }).appendTo($boxPromotion);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-raiting'
                }).appendTo($item);
                var icon1 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon2 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon3 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon4 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon5 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);

             })
             DanhsachGiaCu.forEach((x,j) => {
                var items = $('#sales'+j).find('.item-product__box-price');
             
               let gCu = $('<p>',{
                class:'special-price-Cu',
                text : x.items
            }).appendTo(items)
            });
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });   
}
randompPromotion.sort(() => Math.random() - Math.random()).slice(0, randompPromotion.length)
getDataItemSale();
function getDataItemPhuKien() {
    let i = 0;
    var list = $('.list-product-phukien');

    $.ajax({
        url: "API/DataItemPhuKienAPI.php",
        method: "POST",
        data: {
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
           
            danhsachphukien = data;
            danhsachphukien.forEach(function (value) {
                var a = '../../Admin/Frontend/'+ value.Hinhanh;
                var $item = $('<div>', {
                    id:'pk'+ i++,
                    class: 'item-product size-item'
                }).appendTo(list);
                var $boxImg = $('<div>', {
                    class: 'item-product__box-img'
                }).appendTo($item);
                var $a = $('<a>', {
                    href: '#'
                }).appendTo($boxImg);
                var $Aimg1 = $('<img>', {
                    id : 'size-img',
                   src :a
                }).appendTo($a);
                // var $sticker_percent = $('<div>', {
                //     class: 'item-product__sticker-percent'
                // }).appendTo($item);
                // var iconSticker = $('<p>', {
                  
                // }).appendTo($sticker_percent);
        
                var $boxName =  $('<div>', {
                    class: 'item-product__box-name'
                }).appendTo($item);
        
                var $aName = $('<a>', {
                    class : 'lblTenSP',
                    href: '#', text: value.Tenphukien
                }).appendTo($boxName);
        
                var pName =  $('<p>', {
                }).appendTo($aName);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-price'
                }).appendTo($item);
        
                var pPrice =  $('<p>',  {
                    class : 'special-price',text: new Intl.NumberFormat().format(value.Gia)+'đ'
                }).appendTo($boxprice);
        
                var $boxPromotion =  $('<div>', {
                    class: 'promotion'
                }).appendTo($item);
        
                var pPromotion =  $('<p>',  {
                    class : 'gift-cont',text: 'aa'
                }).appendTo($boxPromotion);
                var $boxprice =  $('<div>', {
                    class: 'item-product__box-raiting'
                }).appendTo($item);
                // var box_raiting = $ ('<div>',{
                //     class: 'item-product__box-raiting'
                // }).appendTo($item);
                var icon1 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon2 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon3 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon4 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);
                var icon5 = $('<i>',{
                    class: 'icon_star ti-star'
                }).appendTo($boxprice);

             })
             randompPromotion.forEach((x,j) => {
                var item = $('#pk'+j);
               item.find('.promotion p').text(x.items);
            });
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });   
}
getDataItemPhuKien();

var j=0;
function getDataIMGTinTuc() {
    let i = 0;
    var listIMG = $('.c-3');

    $.ajax({
        url: "API/DataIMGTinTucAPI.php",
        method: "POST",
        data: {
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
           
            DanhsachIMGTinTuc = data;
            DanhsachIMGTinTuc.forEach(function (value) {
                var a = '../../Admin/Frontend/'+ value.HinhAnh;
                var $item = $('<div>', {
                    id:'TT'+ i++,
                    class: 'slide__ads__wrapper tablet__disable'
                }).appendTo(listIMG);
                var $a = $('<a>', {
                    href: '#'
                }).appendTo($item);
                var $img = $('<img>', {
                     src :a
                }).appendTo($a);
             })
            
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });   
}
getDataIMGTinTuc();


var NextBtn = document.querySelector('.slider__top__next__btn')
var PrevtBtn = document.querySelector('.slider__top__prev__btn')
var SlideWrapper = document.querySelector('.slider__top__wrapper')
var l = 684.98
var index = 0
var positionX = 0
// Automatic Slider
var randomNumber
setInterval(function () {
    randomNumber = Math.floor(Math.random() * 5)
    switch (randomNumber) {
        case 0:
            index = 0
            break
        case 1:
            index = 1
            positionX = -l
            SlideWrapper.style = `transform: translateX(${positionX}px);`
            break
        case 2:
            index = 2
            positionX = -l * 2
            SlideWrapper.style = `transform: translateX(${positionX}px);`
            break
        case 3:
            index = 3
            positionX = -l * 3
            SlideWrapper.style = `transform: translateX(${positionX}px);`
            break
        case 4:
            index = 4
            positionX = -l * 4
            SlideWrapper.style = `transform: translateX(${positionX}px);`
            break
        case 5:
            index = 5
            positionX = -l * 4
            SlideWrapper.style = `transform: translateX(${positionX}px);`
            break
    }
}, 3000)
// Button Slider
NextBtn.addEventListener('click', function () {
    Handle(1)
})
PrevtBtn.addEventListener('click', function () {
    Handle(-1)
})

function Handle($number) {
    if ($number == 1) {
        if (index >= 5) return
        positionX = positionX - l
        SlideWrapper.style = `transform: translateX(${positionX}px);`
            ++index
        console.log('index', index)
    } else if ($number == -1) {
        if (index <= 0) return
        positionX = positionX + l
        SlideWrapper.style = `transform: translateX(${positionX}px);`
            --index
    }
}
// // Flash Sale Slider
var FPrdoductList = document.querySelector('.list-product')
var FPrdoductIem = document.querySelectorAll('.list-product')
var Fl = 239;
var Findex = 0
var FPositionX = 721
$(document).on('click', '.flash__sale__next__btn', function (e) { 

    FHandle(1);

})
$(document).on('click', '.flash__sale__prev__btn', function (e) { 

    FHandle(-1);

})


function FHandle(Fnumber) {
    if (Fnumber == 1) {
        if (Findex > 10) return
        console.log('Next')
        FPositionX = FPositionX - Fl
        FPrdoductList.style = `transform: translateX(${FPositionX}px)`;
        Findex++;
        console.log('Findex', Findex);
    }
    if (Fnumber == -1) {
        if (Findex <= 0) return
        console.log('Prev')
        FPositionX = FPositionX + Fl
        FPrdoductList.style = `transform: translateX(${FPositionX}px)`;
        Findex--;
        console.log('Findex', Findex);
    }
}

// Count down
var days = document.querySelector('#day')
var hours = document.querySelector('#hour')
var minutes = document.querySelector('#minutes')
var seconds = document.querySelector('#sec')
var CurrentYear = new Date().getFullYear()
var CurrentMonth = new Date().getMonth()
var CurrentDay = new Date().getDate()
console.log(CurrentYear)
console.log(CurrentMonth)
console.log(CurrentDay)
var currentTime = new Date(CurrentYear,CurrentMonth,CurrentDay)
var EndFlashSaleDay = new Date(CurrentYear,CurrentMonth,CurrentDay+2)
setInterval(function(){
    var currentTime = new Date()
    var SecondNow = Math.floor((EndFlashSaleDay - currentTime)/1000)
    var s = Math.floor((EndFlashSaleDay - currentTime)/1000%60)
    var m = Math.floor((EndFlashSaleDay - currentTime)/1000/60%60)
    var h =  Math.floor((EndFlashSaleDay - currentTime)/1000/60/60%24)
    var d =  Math.floor((EndFlashSaleDay - currentTime)/1000/60/60/24)
    days.innerHTML = d < 10 ? '0'+ d : d
    hours.innerHTML = h < 10 ? '0'+ h : h
    minutes.innerHTML = m < 10 ? '0'+ m : m
    seconds.innerHTML = s < 10 ? '0'+ s : s
},1000)


