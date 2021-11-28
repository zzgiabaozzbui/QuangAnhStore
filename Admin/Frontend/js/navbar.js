var danhsach = [];
var danhsachH = [];
var txtSearch = '';
$(document).ready(() => {

    function renderItem() {

        var arr = [{
                indexTotal: '0',
                name: 'Home',
                iconItem: 'ti-home',
                link: 'Home.php'
            },

            {
                indexTotal: '0',
                name: 'Chờ xét duyệt , xác nhận',
                iconItem: 'ti-bookmark-alt',
                link: 'Duyet.php'
            },
            {
                indexTotal: '0',
                name: 'Đã xác nhận',
                iconItem: 'ti-check-box',
                link: 'Daxacnhan.php'
            },
            {
                indexTotal: '0',
                name: 'Đã chuẩn bị',
                iconItem: 'ti-package',
                link: 'Chuanbi.php'
            },

            {
                indexTotal: '0',
                name: 'Đang giao',
                iconItem: 'fas fa-shipping-fast',
                link: 'DangGiao.php'
            },
            {
                indexTotal: '0',
                name: ' Đã hoàn thành',
                iconItem: 'ti-check',
                link: 'HoanThanh.php'
            },

        ];

        var list = $('.container-header').html('');
        var i = 0;
        arr.forEach((x, i) => {
                var $item = $('<a>', {
                    id: i,
                    class: 'item-navbar',

                }).data('data', x).appendTo(list);

                var $navbarLeft = $('<div>', {
                    class: 'navbar-left'
                }).appendTo($item);
                var $navbarRight = $('<div>', {
                    class: 'navbar-right'
                }).appendTo($item);

                var $total = $('<div>', {
                    class: 'total',
                    text: x.indexTotal
                }).appendTo($navbarLeft);
                var $nametotal = $('<div>', {
                    class: 'name-total',
                    text: x.name
                }).appendTo($navbarLeft);


                var $icon = $('<div>', {
                    class: 'icon-navbar'
                }).appendTo($navbarRight);
                var $ic = $('<i>', {
                    class: x.iconItem
                }).appendTo($icon);
            }


        )

    }




    renderItem();




    //buttum click

    $(document).on('click', '.item-navbar', function (e) {

        let tab = $(e.currentTarget);
        let data = tab.data('data');
        var duyetAPIs = "DuyetAPI.php";
        var ChuanBiAPIs = "ChuanbiAPI.php";
        var HoanThanhAPIs = "HoanThanhAPI.php";
        var HomeAPIs = "HomeAPI.php";
        var DaxacnhanAPIs = "DaxacnhanAPI.php";
        var DangGiaoAPIs = "DangGiaoAPI.php";
        var Search1 = "Search.php";
        var aa = $('.ct-search').find('input');
        aa.data('key', 'value');
        $('.tab-content').load(data.link, function () {
            if (data.link == 'Duyet.php') {
                document.getElementById('1').onclick = getDataChoXacNhan(duyetAPIs);
                document.getElementById('btnCheck').onclick = chuyenData;
                getDataChoXacNhan(duyetAPIs);
            }
            if (data.link == 'DangGiao.php') {
                document.getElementById('4').onclick = getDataChoDangGiao(DangGiaoAPIs);
                document.getElementById('btnDaGiao').onclick = chuyenData;

            }
            if (data.link == 'Daxacnhan.php') {

                document.getElementById('2').onclick = getDataChoDaXacNhan(DaxacnhanAPIs);
                document.getElementById('btnCheck').onclick = chuyenData;
                getDataChoXacNhan(DaxacnhanAPIs);
            }
            if (data.link == 'HoanThanh.php') {
                document.getElementById('5').onclick = getDataChoHoanThanh(HoanThanhAPIs);
                // document.getElementById('btnXuat').onclick = Export;
                // document.getElementById('btnXuat').onclick = darta;
            }
            if (data.link == 'Home.php') {
                document.getElementById('0').onclick = getDataChoHome(HomeAPIs);

            }
            if (data.link == 'Chuanbi.php') {
                document.getElementById('3').onclick = getDataChoDaChuanBi(ChuanBiAPIs);
                document.getElementById('btnDaChuanBi').onclick = chuyenData;
            }
        })

    })


    //Tìm kiếm 
    $('.tab-content').on('keyup', '#txtSearch1', function (e) {
        var Search1 = "Search1.php";
        var counts = setTimeout(function () {

            clearTimeout(counts);
            // getDataChoXacNhan(Search1);

            var searchname = $("#txtSearch1").val();
            $.ajax({
                url: "Search1.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho xac nhan
                    var tableBodyDOM = document.querySelector('.customer-choxacnhan');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })

    $('.tab-content').on('keyup', '#txtSearch2', function (e) {
        var counts = setTimeout(function () {

            clearTimeout(counts);
            var searchname = $("#txtSearch2").val();
            $.ajax({
                url: "Search2.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho xac nhan
                    var tableBodyDOM = document.querySelector('.customer-daxacnhan');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                        <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                        <td class='text-cencter'>${value.Mahoadon}</td>
                        <td>${value.Ten}</td>
                        <td class='text-right size-td'>${value.SDT}</td>
                        <td class='text-right size-td'>${value.Email}</td>
                        <td class='text-right size-td'>${value.Luuy}</td>
                        <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                        <td>${value.Thanhtoan}</td>
                        <td>${value.Diachi}</td>
                        <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                        <td>${value.Trangthai}</td>
                    `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })

    $('.tab-content').on('keyup', '#txtSearch3', function (e) {
        var counts = setTimeout(function () {

            clearTimeout(counts);
            var searchname = $("#txtSearch3").val();
            $.ajax({
                url: "Search3.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho dang giao
                    var tableBodyDOM = document.querySelector('.customer-chuanbi');
                    $(tableBodyDOM).html('');

                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                        <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                        <td class='text-cencter'>${value.Mahoadon}</td>
                        <td>${value.Ten}</td>
                        <td class='text-right size-td'>${value.SDT}</td>
                        <td class='text-right size-td'>${value.Email}</td>
                        <td class='text-right size-td'>${value.Luuy}</td>
                        <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                        <td>${value.Thanhtoan}</td>
                        <td>${value.Diachi}</td>
                        <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                        <td>${value.Trangthai}</td>
                    `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })

    $('.tab-content').on('keyup', '#txtSearch4', function (e) {
        var counts = setTimeout(function () {

            clearTimeout(counts);
            var searchname = $("#txtSearch4").val();
            $.ajax({
                url: "Search4.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho xac nhan
                    var tableBodyDOM = document.querySelector('.customer-dang-giao');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;
                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                        <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.NgayVanChuyen.split(' ')[0].split('-').reverse().join('-')}</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                        `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })

    $('.tab-content').on('keyup', '#txtSearch5', function (e) {
        var counts = setTimeout(function () {

            clearTimeout(counts);
            var searchname = $("#txtSearch5").val();
            $.ajax({
                url: "Search5.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho xac nhan
                    var tableBodyDOM = document.querySelector('.customer-hoanthanh');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;
                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.NgayVanChuyen.split(' ')[0].split('-').reverse().join('-')}</td>
                    <td>${value.NgayGiaoHang.split(' ')[0].split('-').reverse().join('-')}</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                        `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })
    $('.tab-content').on('keyup', '#txtSearchHome', function (e) {
        var counts = setTimeout(function () {

            clearTimeout(counts);


            var searchname = $("#txtSearchHome").val();
            $.ajax({
                url: "SearchHome.php",
                method: "post",
                data: {
                    action: "text",
                    searchname: searchname
                },
                success: function (data) {
                    danhsach = data;
                    // load Table danh sach cho xac nhan
                    var tableBodyDOM = document.querySelector('.customer-home');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                        <td class='text-cencter'>${value.Mahoadon}</td>
                        <td>${value.Ten}</td>
                        <td class='text-right size-td'>${value.SDT}</td>
                        <td class='text-right size-td'>${value.Email}</td>
                        <td class='text-right size-td'>${value.Luuy}</td>
                        <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                        <td>${value.Thanhtoan}</td>
                        <td>${value.Diachi}</td>
                        <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                        <td>${value.Trangthai}</td>
                        <td>Xem</td>

                    `;
                        tableBodyDOM.appendChild(tableRow);
                    });

                }
            });


        }, 500)

    })







    //lấy data hoan thanh don hang
    function getDataChoHoanThanh(HoanThanhAPIs) {
        $.ajax({
            url: HoanThanhAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho xac nhan
                var tableBodyDOM = document.querySelector('.customer-hoanthanh');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.NgayVanChuyen.split(' ')[0].split('-').reverse().join('-')}</td>
                    <td>${value.NgayGiaoHang.split(' ')[0].split('-').reverse().join('-')}</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#5 .total').text()
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }





    //lấy data xác nhận
    function getDataChoXacNhan(duyetAPIs) {
        $.ajax({
            url: duyetAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho xac nhan
                var tableBodyDOM = document.querySelector('.customer-choxacnhan');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#1 .total').text()
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }

    //lấy data đã chuẩn bị
    function getDataChoDaChuanBi(ChuanBiAPIs) {
        $.ajax({
            url: ChuanBiAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho xac nhan
                var tableBodyDOM = document.querySelector('.customer-chuanbi');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                  
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#3 .total').text()
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }

    //lấy data home
    function getDataChoHome(HomeAPIs) {
        $.ajax({
            url: HomeAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsachH = data;
                // load Table danh sach cho xac nhan
                var tableBodyDOM = document.querySelector('.customer-home');

                $(tableBodyDOM).html('');
                danhsachH.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    <td id='btnXem'>Xem</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#0 .total').text()
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }

    //lấy data hủy đơn hàng
    function getDataChoDaXacNhan(DaxacnhanAPIs) {

        $.ajax({
            url: DaxacnhanAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho huy
                var tableBodyDOM = document.querySelector('.customer-daxacnhan');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#2 .total').text()
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }



    //lấy data đang giao
    function getDataChoDangGiao(DangGiaoAPIs) {
        $.ajax({
            url: DangGiaoAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho dang giao
                var tableBodyDOM = document.querySelector('.customer-dang-giao');

                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.Mahoadon}')"> </td>
                    <td class='text-cencter'>${value.Mahoadon}</td>
                    <td>${value.Ten}</td>
                    <td class='text-right size-td'>${value.SDT}</td>
                    <td class='text-right size-td'>${value.Email}</td>
                    <td class='text-right size-td'>${value.Luuy}</td>
                    <td>${value.Ngaydat.split(' ')[0].split('-').reverse().join('-') + ' ' + value.Ngaydat.split(' ')[1].split(':').reverse().join(':') }</td>
                    <td>${value.NgayVanChuyen.split(' ')[0].split('-').reverse().join('-')}</td>
                  
                    <td>${value.Thanhtoan}</td>
                    <td>${value.Diachi}</td>
                    <td class='text-right'>${new Intl.NumberFormat().format(value.ThanhTien)}đ</td>
                    <td>${value.Trangthai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    }



    //chung gian truyen giua ui va api
    $.ajax({
        url: "DonhangApi.php",
        method: "POST",
        data: {},
        headers: "application/json; charset=utf-8",
        success: function (dataJson) {
            let data = JSON.parse(dataJson);
            $('#0 .total').text(data.Tong)
            $('#1 .total').text(data.Checks)
            $('#2 .total').text(data.Daxacnhan)
            $('#3 .total').text(data.Dachuanbi)
            $('#4 .total').text(data.DangGiao)
            $('#5 .total').text(data.HoanThanh)
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });


    // buttom

    $('.container-content').on('change', 'table .check-box-index input', e => {

        let input = $(e.currentTarget);
        let countCheck = input.closest('table').find('.check-box-index input:checked').length;
        $('#btnCheck').prop('disabled', !countCheck);
        $('#btnDelete').prop('disabled', !countCheck);
        $('#btnDaGiao').prop('disabled', !countCheck);
        $('#btnDaChuanBi').prop('disabled', !countCheck);

    })

    $('.container-content').on('change', 'table .check-box-indexs input', e => {

        let inputs = $(e.currentTarget);
        let countCheckAll = inputs.closest('table').find('.check-box-indexs input:checked').length;
        $('.check-box-index input').prop('checked', countCheckAll);
        danhsach.forEach(x => x.checked = !!countCheckAll);
        $('#btnCheck').prop('disabled', !countCheckAll);
        $('#btnDelete').prop('disabled', !countCheckAll);
        $('#btnDaGiao').prop('disabled', !countCheckAll);
        $('#btnDaChuanBi').prop('disabled', !countCheckAll);

    })

})

function changeCheck(Mahoadon) {
    var item = danhsach.find(function (value) {
        return value.Mahoadon == Mahoadon;
    });
    item.checked = !item.checked;
}
// chuyển data sang đang giao
function chuyenData() {
    console.log(1);
    danhsach.forEach(function (value) {
        console.log(value.Mahoadon + " " + value.checked);
        if (value.checked) {
            var formData = new FormData(document.getElementById('form-data'));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }

            xhttp.open('POST', 'TrangthaiAPI.php', false);
            formData.append('Mahoadon', value.Mahoadon);
            xhttp.send(formData);
        }
    });
}



function hienThiId() {
    var DS = danhsach.filter(x => x.checked);
    if (DS.length != 0 ){
        var ma = DS[0].Mahoadon;
        document.getElementById('Form_excel').action = `export.php?Mahoadon=${ma}`;
    }else {
        alert ('Bạn phải chọn 1 khách hàng để xuất hóa đơn.');
    }
}

$(document).on('click', '#btnXem', function (e) {
    let $btn = $(e.currentTarget);
    let row = $btn.closest('tr');
    let index = row.index();
    var ma = danhsachH[index].Mahoadon;

    $.ajax({
        url: "Xem.php",
        method: "POST",
        data: {},
        headers: "application/json; charset=utf-8",
        success: function (dataJson) {
            $.when($(dataJson).dialog({
                width: 1250,
                height: 870,
                modal: true,
                close: function () {
                    $(this).html('');
                }      
            })).then(dlg => {
                getDataChiTiet(ma);
            })
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });
})
function getDataChiTiet(ma) {
    var a = new FormData();

    $.ajax({
        url: "XemAPI.php",
        method: "POST",
       
        data: {
            ma:ma,
         
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
            danhsach = data;
            // load Table danh sach cho dang giao
            var tableBodyDOM = document.querySelector('.customer-DH');

            danhsach.forEach(function (value) {
                var TSP = value.Gia*value.SoLuong;
                var tableRow = document.createElement('tr');
                tableRow.innerHTML = `
                <td class='text-cencter'>${value.Tenphukien}</td>
                <td>${value.SoLuong}</td>
                
                
                <td class='text-right size-td'>${new Intl.NumberFormat().format(value.Gia)}</td>
                <td class='text-right size-td'>${new Intl.NumberFormat().format(TSP)}</td>
                `;
                tableBodyDOM.appendChild(tableRow);
            });

        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });
}