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
        <td>${value.NgayDangTin.split(' ')[0].split('-').reverse().join('-')}</td>
        <td class='text-right size-td'>${value.TomTat}</td>
        <td ><a><i class='icon ti-pencil-alt'> </i></a></td>
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

    $(document).ready(() => { 



        $('.container-content').on('change', 'table .check-box-index input', e => {

            let input = $(e.currentTarget);
            let countCheck = input.closest('table').find('.check-box-index input:checked').length;
         
    
        })
    
        $('.container-content').on('change', 'table .check-box-indexs input', e => {
    
            let inputs = $(e.currentTarget);
            let countCheckAll = inputs.closest('table').find('.check-box-indexs input:checked').length;
            $('.check-box-index input').prop('checked', countCheckAll);
            danhsach.forEach(x => x.checked = !!countCheckAll);
    
        })
    })


    function changeCheck(MaTinTuc) {
        var item = danhsach.find(function (value) {
            return value.MaTinTuc == MaTinTuc;
        });
        item.checked = !item.checked;
    }
