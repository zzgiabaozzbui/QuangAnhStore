var danhsach = [];

function getData() {
    $.ajax({
        url: 'TinTucAPI.php',
        method: "POST",
        data: {},
        headers: "application/json; charset=utf-8",
        success: function (data) {
            danhsach = data;
            // load Table danh sach cho xac nhan
            var tableBodyDOM = document.querySelector('.customer-tintuc');

            $(tableBodyDOM).html('');
            danhsach.forEach(function (value) {

                value.checked = false;
                var tableRow = document.createElement('tr');
                tableRow.innerHTML = `
        <td class='check-box-index'><input type='checkbox' name='' value='' onclick="changeCheck('${value.MaTinTuc}')"> </td>
        <td class='text-cencter'>${value.MaTinTuc}</td>
        <td class = 'size-img'>  <img class = 'size-img' src='${ value.HinhAnh}' alt=""> </td>
        <td class='text-right size-td'>${value.TieuDe}</td>
        <td class='text-right'>${value.NgayDangTin.split(' ')[0].split('-').reverse().join('-')}</td>
        <td class='text-right size-td'>${value.TomTat}</td>
        <td class='tc'><a><i class='icon ti-pencil-alt'> </i></a></td>
        <td ><a><i class='icon ti-trash'> </i></a></td>
        <td ><a><i class='icon ti-eye'> </i></a></td>
        `;
                tableBodyDOM.appendChild(tableRow);
            });
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });
}
getData();

// document.getElementById('btnXoa').onclick = XoaData;
$(document).on('click', '#btnXoa', function (e) {
    $('<div>', {
        text: 'Bạn thực sự muốn xóa !'
    }).dialog({
        title: 'Cảnh báo',
        modal: true,
        buttons: [{
                text: 'Xóa',
                id: 'btnCheckXoa',
                click: function () {
                    Xoa();
                    $(this).dialog('close');

                }
            },
            {
                text: 'Không',
                id: 'btnCheckKhong',
                click: function (e) {
                    $(this).dialog('close');

                }
            }
        ]
    })
})

function Xoa() {
    var DS = danhsach.filter(x => x.checked);
    var ma = DS.map(x => x.MaTinTuc).join(",");
    $.ajax({
        url: "XoaAPI.php",
        method: "POST",
        data: {
            ma: ma
        },
        headers: "application/json; charset=utf-8",
        success: function (dataJson) {
            getData();
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });

}
// Thêm dữ liệu tin tức
var file;
$(document).on('click', '#btnAdd', function (e) {

    var fileUpload = document.querySelector('.fileUpload').value;
    var TieuDe = $("#txtTieuDe").val();
    var TomTat = $("#txtTomTat").val();
    var NoiDung = $("#txtNoiDung").val();
    var NgayDang = $("#dateNgayDang").val();
    var TacGia = $("#txtTacGia").val();
    if (TieuDe == "" || TomTat == "" || NoiDung == "" || TacGia == "" || fileUpload == "" || NgayDang == null) {
        alert('Bạn nhập thiếu thông tin!');
    } else {
        var a = new FormData();
        a.append('TieuDe', TieuDe)
        a.append('TomTat', TomTat)
        a.append('NoiDung', NoiDung)
        a.append('NgayDang', NgayDang)
        a.append('TacGia', TacGia)
        a.append('fileUpload', file)
        $.ajax({
            url: "ThemMoiAPI.php",
            method: "post",
            dataType: 'text',
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            data: a,
            success: function (data) {
                if (data) {
                    alert('Thêm dữ liệu thành công!');
                } else {
                    alert('Thêm dữ liệu thất bại!');

                }
            }
        });
    }


})

$(document).on('change', '#fileUpload', function (e) {
    file = e.target.files[0]
})
//END

$(document).ready(() => {
    var spanicon = $('.ui-icon').html('');
    var iconThoat = $('<i>', {
        class: 'ti-close'
    }).appendTo(spanicon);

    $('.container-content').on('change', 'table .check-box-index input', e => {

        let input = $(e.currentTarget);
        let countCheck = input.closest('table').find('.check-box-index input:checked').length;
        $('#btnXoa').prop('disabled', !countCheck);


    })

    $('.container-content').on('change', 'table .check-box-indexs input', e => {

        let inputs = $(e.currentTarget);
        let countCheckAll = inputs.closest('table').find('.check-box-indexs input:checked').length;
        $('.check-box-index input').prop('checked', countCheckAll);
        danhsach.forEach(x => x.checked = !!countCheckAll);
        $('#btnXoa').prop('disabled', !countCheckAll);

    })





    $(document).on('click', '#btnThem', function (e) {

        $.ajax({
            url: "ThemMoiTT.php",
            method: "POST",
            data: {},
            headers: "application/json; charset=utf-8",
            success: function (dataJson) {
                $(dataJson).dialog({
                    width: 1250,
                    height: 870,
                    modal: true,
                })
            },
            fail: function () {
                alert('Kết nối thất bại');
            }
        });
    })
})


function changeCheck(MaTinTuc) {
    var item = danhsach.find(function (value) {
        return value.MaTinTuc == MaTinTuc;
    });
    item.checked = !item.checked;
}

function XoaData() {
    console.log(1);
    danhsach.forEach(function (value) {
        console.log(value.MaTinTuc + " " + value.checked);
        if (value.checked) {
            var formData = new FormData(document.getElementById('form-data'));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }

            xhttp.open('POST', 'XoaAPI.php', false);
            formData.append('MaTinTuc', value.MaTinTuc);
            xhttp.send(formData);
        }
    });
}