var danhsach = [];
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
                iconItem: 'ti-search',
                link: 'Duyet.php'
            },
            {
                indexTotal: '0',
                name: 'Đã hủy',
                iconItem: 'ti-back-right',
                link: 'Huy.php'
            },

            {
                indexTotal: '0',
                name: 'Đang giao',
                iconItem: 'ti-shopping-cart-full',
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
        var HoanThanhAPIs = "HoanThanhAPI.php";
        var HomeAPIs = "HomeAPI.php";
        var HuyAPIs = "HuyAPI.php";
        var DangGiaoAPIs = "DangGiaoAPI.php";
        var Search1 = "Search.php";
        var aa = $('.ct-search').find('input');
        aa.data('key', 'value');
        $('.tab-content').load(data.link, function () {
            if (data.link == 'Duyet.php') {
                document.getElementById('1').onclick = getDataChoXacNhan(duyetAPIs);
                document.getElementById('btnCheck').onclick = chuyenDataSangDangGiao;
                document.getElementById('btnDelete').onclick = chuyenDataSangHuy;
                getDataChoXacNhan(duyetAPIs);
            }
            if (data.link == 'DangGiao.php') {
                document.getElementById('3').onclick = getDataChoDangGiao(DangGiaoAPIs);
                document.getElementById('btnDaGiao').onclick = chuyenDataSangHoanThanh;

            }
            if (data.link == 'Huy.php') {
                document.getElementById('2').onclick = getDataChoHuy(HuyAPIs);
            }
            if (data.link == 'HoanThanh.php') {
                document.getElementById('2').onclick = getDataChoHoanThanh(HoanThanhAPIs);
            }
            if (data.link == 'Home.php') {
                document.getElementById('0').onclick = getDataChoHome(HomeAPIs);
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
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaDH}')"> </td>
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
                    var tableBodyDOM = document.querySelector('.customer-huy');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td>${value.NgayHuy.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
                    var tableBodyDOM = document.querySelector('.customer-dang-giao');
                    $(tableBodyDOM).html('');

                    danhsach.forEach(function (value) {
                        value.checked = false;

                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaDH}')"> </td>
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td>${value.NgayVanChuyen.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
                    var tableBodyDOM = document.querySelector('.customer-hoanthanh');

                    $(tableBodyDOM).html('');
                    danhsach.forEach(function (value) {
                        value.checked = false;
                        var tableRow = document.createElement('tr');
                        tableRow.innerHTML = `
                        <td class='text-cencter'>${value.MaDH}</td>
                        <td>${value.TenDonHang}</td>
                        <td class='text-right size-td'>${value.MaKH}</td>
                        <td class='text-right size-td'>${value.Masanpham}</td>
                        <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                        <td>${value.NgayVanChuyen.split('-').reverse().join('/')}</td>
                        <td>${value.NgayGiaoHang.split('-').reverse().join('/')}</td>
                        <td class='text-right'>${value.soLuongDH}</td>
                        <td>${value.PhuongThucThanhToan}</td>
                        <td>${value.DiaChi}</td>
                        <td class='text-right'>${value.ThanhTien}</td>
                        <td>${value.TrangThai}</td>
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
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaDH}')"> </td>
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
                    value.checked = false;
                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td>${value.NgayVanChuyen.split('-').reverse().join('/')}</td>
                    <td>${value.NgayGiaoHang.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
                    `;
                    tableBodyDOM.appendChild(tableRow);
                });

                $('#4 .total').text()
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
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaDH}')"> </td>
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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

    //lấy data home
    function getDataChoHome(HomeAPIs) {
        $.ajax({
            url: HomeAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho xac nhan
                var tableBodyDOM = document.querySelector('.customer-home');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
    function getDataChoHuy(HuyAPIs) {
        $.ajax({
            url: HuyAPIs,
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (data) {
                danhsach = data;
                // load Table danh sach cho huy
                var tableBodyDOM = document.querySelector('.customer-huy');

                $(tableBodyDOM).html('');
                danhsach.forEach(function (value) {
                    value.checked = false;

                    var tableRow = document.createElement('tr');
                    tableRow.innerHTML = `
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td>${value.NgayHuy.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
                    <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaDH}')"> </td>
                    <td class='text-cencter'>${value.MaDH}</td>
                    <td>${value.TenDonHang}</td>
                    <td class='text-right size-td'>${value.MaKH}</td>
                    <td class='text-right size-td'>${value.Masanpham}</td>
                    

                    <td>${value.ThoiGianDat.split('-').reverse().join('/')}</td>
                    <td>${value.NgayVanChuyen.split('-').reverse().join('/')}</td>
                    <td class='text-right'>${value.soLuongDH}</td>
                    <td>${value.PhuongThucThanhToan}</td>
                    <td>${value.DiaChi}</td>
                    <td class='text-right'>${value.ThanhTien}</td>
                    <td>${value.TrangThai}</td>
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
            $('#2 .total').text(data.Huy)
            $('#3 .total').text(data.DangGiao)
            $('#4 .total').text(data.HoanThanh)
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

    })

    $('.container-content').on('change', 'table .check-box-indexs input', e => {

        let inputs = $(e.currentTarget);
        let countCheckAll = inputs.closest('table').find('.check-box-indexs input:checked').length;
        $('.check-box-index input').prop('checked', countCheckAll);
        danhsach.forEach(x => x.checked = !!countCheckAll);
        $('#btnCheck').prop('disabled', !countCheckAll);
        $('#btnDelete').prop('disabled', !countCheckAll);
        $('#btnDaGiao').prop('disabled', !countCheckAll);

    })

})

function changeCheck(MaDH) {
    var item = danhsach.find(function (value) {
        return value.MaDH == MaDH;
    });
    item.checked = !item.checked;
}
// chuyển data sang đang giao
function chuyenDataSangDangGiao() {
    console.log(1);
    danhsach.forEach(function (value) {
        console.log(value.MaDH + " " + value.checked)
        if (value.checked) {
            var formData = new FormData(document.getElementById('form-data'));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }

            xhttp.open('POST', 'api/DuyetXacNhanAPI.php', false);
            formData.append('MaDH', value.MaDH);
            xhttp.send(formData);
        }
    });
}

// chuyển data sang hoan thanh
function chuyenDataSangHoanThanh() {
    console.log(1);
    danhsach.forEach(function (value) {
        console.log(value.MaDH + " " + value.checked)
        if (value.checked) {
            var formData = new FormData(document.getElementById('form-data'));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }

            xhttp.open('POST', 'api/DuyetDangGiaoAPI.php', false);
            formData.append('MaDH', value.MaDH);
            xhttp.send(formData);
        }
    });
}
// chuyển data sang huy
function chuyenDataSangHuy() {
    console.log(1);
    danhsach.forEach(function (value) {
        console.log(value.MaDH + " " + value.checked)
        if (value.checked) {
            var formData = new FormData(document.getElementById('form-data'));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }

            xhttp.open('POST', 'api/HuyAPI.php', false);
            formData.append('MaDH', value.MaDH);
            xhttp.send(formData);
        }
    });
}

function layDuLieu() {
    txtSearch = document.getElementById('txtSearch').value;
}