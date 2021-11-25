<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/ThemVaoGioHang.css?version=0">
    <link rel="stylesheet" href="../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../../css/FooterStyle.css">
    <link rel="stylesheet" href="../../font/themify-icons/themify-icons.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Shopping Cart</title>
</head>
<body>
    <?php 
    require_once "../Header.php";
    require_once "../Shared_Element/DB.php";
    $maSP=$_GET['MaSP'];
    $querySelect="select * from sanpham where masp='".$maSP."'";
    $resultSelect=selectItem($querySelect);
    ?>
    <div class="Product_cart">
        <h2>Đặt hàng ngay</h2>
        <div class="Product_cart-header">
            <div class="Product_cart_info-img">
                <img src="../../../Admin/Frontend/<?php echo $resultSelect[0]['HinhAnh'];?>" alt="">
            </div>
            <div class="Product_cart_info">
                <h3><?php echo $resultSelect[0]['TenSP'];?></h3>
                <p id="Gia"><?php echo number_format($resultSelect[0]['Gia']);?> </p> 
                <p class="Tien"> vnđ</p> 
                <div class="Product-promotion">
                <p class="header-sale"><i class="ti-gift"></i> Chương trình khuyến mãi</p>
                <ul>
                    <li><i class="ti-check"></i> Miễn phí vận chuyển</li>
                    <li><i class="ti-check"></i> Tặng kèm phiếu giảm giá cho lần mua tiếp theo</li>
                </ul>
            </div> 
            </div>
            
        </div>
        <form action="" method="post">
        <div class="Product_cart-number">
                <div class="number-chooser">
                    <input onclick="GiamSL()" type="button" value="-" id="btnGiam">
                    <input type="text" value="1" id="txtSoLuong" name="txtSoLuong" readonly>
                    <input onclick="TangSL()" type="button" value="+" id="btnTang">
               
                </div>
                    
        </div>
                <div class="border-bottom"></div>
        <div class="Product-Total">
            <p>- Tổng tiền</p>
            <div id="Product-Total_money">
                <input type="text" name="total" id="total" readonly value="<?php echo number_format($resultSelect[0]['Gia']);?>"> 
                <p> vnđ</p>
            </div>
        </div>
        <div class="border-bottom"></div>
        <div class="info-Customer">
            <h2>Thông tin khách hàng</h2>
            
                <div class="form">
                    <div class="infor-Customer_detail">
                        <div class="infor-Customer_name">
                            <p>Họ và tên (bắt buộc)</p>
                            <input type="text" name="txtHoTen" required>
                        </div>
                        <div class="infor-Customer_numberPhone" >
                            <p>Số điện thoại đặt hàng (bắt buộc)</p>
                            <input type="text" name="txtSDT" required>
                        </div>
                    
                    </div>
                    
                    <div class="infor-Customer_email">
                        <p>Email:</p>
                        <input type="email" name="txtEmail" id="">
                    </div>
                    
                    <div class="infor-Customer_Note">
                        <p>Lưu ý thêm của khách hàng:</p>
                        <input type="text" name="txtLuuY" id="">
                    </div>
                    <div class="infor-Customer_address">
                        <p>Địa chỉ (bắt buộc)</p>
                        <textarea name="txtDiaChi" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <p class="Note">(Vui lòng điền thông tin chính xác)</p>
                    <button type="submit" id="btnDirectly" name="btnDirectly">
                    <i class="fas fa-handshake"></i> 
                     Xác nhận đặt hàng (Trực tiếp)
                    </button>
                    <br>
                    
                </div>
                
            </form>
            <div onclick="OpenModal()" id="btnOnline" name="btnOnline">
            <i class="fas fa-wallet"></i>
             Thanh toán online
        </div>
        </div>
    </div>
    <div id="modal-Cart">
        <div class="Cart-Online js_modal">
        <div class="Cart-Online_title">
                <h3>Cú pháp thanh toán online</h3>
                <i class="ti-close" id="closeModal" onclick="closeModal()"></i>
                </div>
                <div class="Cart-Online_content">
                <h5>Thông tin tài khoản ngân hàng</h5>
                <p>Tên tài khoản: Quang Anh</p>
                <br>
                <table id="Bank" class="table">                   
                    <thead class="thead-light">
                        <tr>
                            <th>Ngân hàng</th>
                            <th>Số tài khoản</th>
                            <th>Chi nhánh</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Agribank</td>
                        <td>912628123423</td>
                        <td>Hà Nội</td>
                    </tr>
                    <tr>
                        <td>Visa</td>
                        <td>323472394821</td>
                        <td>Hà Nội</td>
                    </tr>
                    <tr>
                        <td>Zalo Pay </td>
                        <td>0912742923</td>
                        <td>Hà Nội</td>
                    </tr>
                    <tr>
                        <td>Momo</td>
                        <td>0912742923</td>
                        <td>Hà Nội</td>
                    </tr>
                </table>
                <p>Nội dung chuyển khoản: [Tên tài khoản] + [Họ và tên] + [Số điện thoại nhận hàng] + [Địa chỉ nhận hàng]
                     + [Lưu ý của người mua (nếu có)]
                </p>
        </div>
        </div>
        
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"]=== 'POST' and isset($_POST['btnDirectly']))
        {
            if(isset($_POST['txtHoTen']))
            {
                $hoTen=$_POST['txtHoTen'];
                $soLuong=$_POST['txtSoLuong'];
                $tongTien=str_replace(',','',$_POST['total']);
                $SDT=$_POST['txtSDT'];
                $Email=$_POST['txtEmail'];
                $diaChi=$_POST['txtDiaChi'];
                $LuuY=$_POST['txtLuuY'];
                $ngayDat=date("Y-m-d");
                $ngayVanChuyen=date('Y-m-d',strtotime($ngayDat.' + 1 days'));
                $ngayGiao=date('Y-m-d',strtotime($ngayDat.' + 7 days'));
                // chitiethoadon:Mahoadon, MaSp, SoLuong
                // hoadon: mahoadon,ten,sdt,email,luuy,ngaydat,thanhtoan,trangthai,diachi,thanhtien,ngayvanchuyen,ngaygiaohang 
                $queryInsertHD="insert into hoadon values 
                (' ',N'".$hoTen."','".$SDT."','".$Email."',N'".$LuuY."','".$ngayDat."',N'Trực tiếp',N'Chưa xác nhận',N'".$diaChi."',
                '".$tongTien."','".$ngayVanChuyen."','".$ngayGiao."')";
                $selectHD="select * from hoadon where ten=N'".$hoTen."' and email='".$Email."'and ngaydat='".$ngayDat."' and sdt='".$SDT."' order by Mahoadon desc limit 1"; 

                
                $resuiltHD=ChangeData($queryInsertHD,'đặt hàng');
                $resultSelectHD=selectItem($selectHD);
                $queryInsertCTHD="insert into chitiethoadon values ('".$resultSelectHD[0]['Mahoadon']."','".$maSP."',".$soLuong.")";
                $resuiltCTHD=ChangeDataNoTitle($queryInsertCTHD);
            }       
        }
    ?>
    <?php 
    require_once "../Footer.php";
    ?>
    <script>
        function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function replace_number(num)
{
    return num.toString().replaceAll(",","")
}
        function TangSL()
        {
            var Gia=document.getElementById('Gia');
            var nhap= document.getElementById('txtSoLuong').value;
            var TongTienNhap=document.getElementById('total');
            var Tien=replace_number(Gia.textContent);         
            nhap++;
            document.getElementById('txtSoLuong').value=nhap;
            var TongTien=Tien*nhap
            TongTienNhap.value=formatNumber(TongTien);  
        }
        function GiamSL()
        {
            var Gia=document.getElementById('Gia');
            var nhap= document.getElementById('txtSoLuong').value;
            var TongTienNhap=document.getElementById('total');
            var Tien=replace_number(Gia.textContent); 
            if(nhap>1)
            {
                nhap--;
                document.getElementById('txtSoLuong').value=nhap;
                var TongTien=Tien*nhap
                TongTienNhap.value=formatNumber(TongTien);  
            }
            else{
                alert('Số lượng không thể nhỏ hơn 1');
            }
        }
    </script>
    <script>
        const modalContainer= document.querySelector('.js_modal')
        const modal=document.querySelector('#modal-Cart');
        
        function OpenModal(){
            var showMore=document.getElementById('btnOnline')
            var modal=document.getElementById('modal-Cart');
            modal.style.display='flex'
        }
        function closeModal()
        {
            var modal=document.getElementById('modal-Cart');
            modal.style.display='none'
        }
        modalContainer.addEventListener('click',function(event){
            event.stopPropagation()
        })
        modal.addEventListener('click',closeModal)
        
    </script>
</body>
</html>