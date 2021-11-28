var danhsach = [];
var danhsachSua = [];

var index = 1;
$(document).on('click', '.page-item', function (e) {
    var h = $(e.currentTarget).data('index');
    let item = $(e.currentTarget);
    index = h;
    getData(index, per_page)
    if (index < 2) {
        $('.page-item-first').hide();
    } else {
        $('.page-item-first').show();
    }
    if (h == sumTrang) {
        $('.page-item-last').hide();
    } else {
        $('.page-item-last').show();
    }

$('.page-item').removeClass('active')
item.addClass('active')


})
$(document).on('click', '.page-item-first', function (e) { 
    getData(1, per_page);
    
$('.page-item').removeClass('active')
    $('.page-item').first().addClass('active')

})
$(document).on('click', '.page-item-last', function (e) { 
    getData(sumTrang, per_page);
    $('.page-item').removeClass('active')
    $('.page-item').last().addClass('active')
})
$(document).on('click', '.page-item-next', function (e) { 
    if (index== sumTrang){
        alert ('Bạn đã ở trang cuối');
    }
    else {
        ++index;
      getData(index, per_page);
       let $item =  $('.page-item.active').next()
       $item.hasClass('page-item') && $item.trigger('click')

    }
  
})
$(document).on('click', '.page-item-prev', function (e) { 
     
    if (index== 1){
        alert ('Bạn đã ở trang đầu');
    }
    else {
        index-= 1;
    getData(index, per_page);
    let $item =  $('.page-item.active').prev()
    $item.hasClass('page-item') && $item.trigger('click')
    }

})



function getData(index, per_page) {

    $.ajax({
        url: 'TinTucAPI.php',
        method: "POST",
        data: {
            index: index,
            per_page: per_page
        },
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
        <td class='tc'  id='btnUpdate'><a><i class='icon ti-pencil-alt'> </i></a></td>
        <td ><a id='btnDelete'><i class='icon ti-trash'> </i></a></td>
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

var sumTrang;
var per_page = 2;
getData(index, per_page);

function loaw(per_page) {
    $.ajax({
        url: 'CoutRowTT.php',
        method: "POST",
        data: {
            per_page: per_page
        },
        headers: "application/json; charset=utf-8",
        success: function (data) {
            sumTrang = data;
            console.log(data);
            if (data <= 1) {
                $('#pagination').hide();
            } else {
                $('#pagination').show();
                $('#pagination').empty();
                var tr = $('#pagination');
                var First = $('<li>', {
                    class: 'page-item-first'
                }).appendTo(tr);
                var aItems = $('<a>', {
                    class: 'page-link',
                    text: 'First'
                    
                }).appendTo(First);
                var Prev = $('<li>', {
                    class: 'page-item-prev'
                }).appendTo(tr);
                var aItems = $('<a>', {
                    class: 'page-link',
                    text: 'Prev'
                    
                }).appendTo(Prev);
                for (let k = 1; k <= data; k++) {
                    var liItem = $('<li>', {
                        class: 'page-item'
                    }).appendTo(tr);
                    var aItem = $('<a>', {
                        class: 'page-link',
                        text: k
                    }).appendTo(liItem);
                    liItem.attr('data-index', k).appendTo($('#pagination'))
                }
                var Next = $('<li>', {
                    class: 'page-item-next'
                }).appendTo(tr);
                var aItems = $('<a>', {
                    class: 'page-link',
                    text: 'Next'
                    
                }).appendTo(Next);
                var Last = $('<li>', {
                    class: 'page-item-last'
                }).appendTo(tr);
                var aItems = $('<a>', {
                    class: 'page-link',
                    text: 'Last'
                }).appendTo(Last);


                $('.page-item-first').hide()
                $('.page-item').first().addClass('active')
            }
        }
    });



}
loaw(per_page);

function getDataSua(ma) {

    $.ajax({
        url: "DataAPI.php",
        method: "POST",
        data: {
            ma: ma,
        },
        headers: "application/json; charset=utf-8",
        success: function (dataJson) {
            danhsachSua.data = [];
            let data = JSON.parse(dataJson);
            let item = data[0];

            $('#txtTieuDe').val(item.TieuDe);
            $('#txtTomTat').val(item.TomTat);
            $('#txtNoiDung').val(item.NoiDung);
            $('#dateNgayDang').val(item.NgayDangTin);
            $('#txtTacGia').val(item.TacGia);

        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });

}

$(document).on('click', '#btnUpdate', function (e) {
    let $btn = $(e.currentTarget);
    let row = $btn.closest('tr');
    let index = row.index();
    var ma = danhsach[index].MaTinTuc;

    $.ajax({
        url: "SuaTT.php",
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
                getDataSua(ma);
            })
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });
    $(document).on('click', '#btnLuu', function (e) {
        $('<div>', {
            text: 'Bạn thực sự muốn sửa !'
        }).dialog({
            title: 'Cảnh báo',
            modal: true,
            buttons: [{
                    text: 'Xóa',
                    id: 'btnCheckXoa',
                    click: function () {
                        SuaDuLieu(index);
                        $(this).dialog('close');
                        $('#container-Sua').dialog('close');


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

})



$(document).on('click', '#btnDelete', function (e) {
    let $btn = $(e.currentTarget);
    let row = $btn.closest('tr');
    let index = row.index();
    $('<div>', {
        text: 'Bạn thực sự muốn xóa !'
    }).dialog({
        title: 'Cảnh báo',
        modal: true,
        buttons: [{
                text: 'Xóa',
                id: 'btnCheckXoa',
                click: function () {
                    Xoa1Dong(index);
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

function SuaDuLieu(index) {
    var ma = danhsach[index].MaTinTuc;
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
        a.append('ma', ma)
        a.append('TieuDe', TieuDe)
        a.append('TomTat', TomTat)
        a.append('NoiDung', NoiDung)
        a.append('NgayDang', NgayDang)
        a.append('TacGia', TacGia)
        a.append('fileUpload', file)
        $.ajax({
            url: "SuaAPI.php",
            method: "post",
            dataType: 'text',
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            data: a,
            success: function (data) {
                if (data) {
                    getData(index, per_page);
                    alert('Sửa dữ liệu thành công!');

                } else {
                    alert('Sửa dữ liệu thất bại!');

                }
            }
        });
    }

}

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

function Xoa1Dong(index) {
    var ma = danhsach[index].MaTinTuc;
    $.ajax({
        url: "XoaAPI.php",
        method: "POST",
        data: {
            ma: ma
        },
        headers: "application/json; charset=utf-8",
        success: function (dataJson) {
            getData(index, per_page);
        },
        fail: function () {
            alert('Kết nối thất bại');
        }
    });

}
// Sua dữ liệu tin tức


$(document).on('change', '#fileUpload', function (e) {
    file = e.target.files[0]
})
//END

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
            getData(index, per_page);
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