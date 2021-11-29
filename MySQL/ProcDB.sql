
CREATE PROCEDURE `Proc_Get_DemDonHang` () 
BEGIN

  DECLARE $Tong int;
  DECLARE $Check int;
  DECLARE $Daxacnhan int;
  DECLARE $Dachuanbi int;
  DECLARE $DangGiao int;
  DECLARE $HoanThanh int;
  SELECT
    COUNT(*) INTO $Tong
  FROM hoadon h;
  SELECT
    COUNT(*) INTO $Check
  FROM hoadon h
  WHERE h.Trangthai LIKE '%Chờ xác nhận%';
  SELECT COUNT(*) INTO $Daxacnhan FROM hoadon h WHERE h.Trangthai LIKE '%Đã xác nhận%';
    SELECT COUNT(*) INTO $Dachuanbi FROM hoadon h WHERE h.Trangthai LIKE '%Đã chuẩn bị%';


  SELECT
    COUNT(*) INTO $DangGiao
 FROM hoadon h
  WHERE h.Trangthai LIKE '%Đang giao%';
  SELECT
    COUNT(*) INTO $HoanThanh
  FROM hoadon h
  WHERE h.Trangthai LIKE '%Giao hàng thành công%';

  SELECT
    $Tong AS Tong,
    $Check AS Checks,
    $Daxacnhan AS Daxacnhan,
    $Dachuanbi AS Dachuanbi,
    $DangGiao AS DangGiao,
    $HoanThanh AS HoanThanh;
END$$

CREATE PROCEDURE `Proc_UpdateTrangThaiDonHang` (IN `$MaDH` NVARCHAR(15))
BEGIN
  DECLARE $Diachi nvarchar(100);
  DECLARE $Trangthai nvarchar(100);

SELECT h.Diachi INTO $Diachi  FROM hoadon h WHERE h.Mahoadon = $MaDH;
SELECT h.Trangthai INTO $Trangthai  FROM hoadon h WHERE h.Mahoadon = $MaDH;
IF  $Trangthai = 'Chờ xác nhận' THEN 
UPDATE hoadon h SET h.Trangthai = 'Đã xác nhận' WHERE h.Mahoadon = $MaDH;
ELSEIF $Diachi = 'Nhận tại cửa hàng' AND $Trangthai = 'Đã xác nhận' THEN 
UPDATE hoadon h SET h.Trangthai = 'Đã chuẩn bị' WHERE h.Mahoadon = $MaDH;
ELSEIF $Diachi = 'Nhận tại cửa hàng' AND $Trangthai = 'Đã chuẩn bị' THEN 
UPDATE hoadon h SET h.Trangthai = 'Giao hàng thành công',h.NgayGiaoHang = CURDATE(),h.NgayVanChuyen = CURDATE() WHERE h.Mahoadon = $MaDH;
ELSEIF $Trangthai = 'Đã xác nhận' AND  $Diachi != 'Nhận tại cửa hàng' THEN 
UPDATE hoadon h SET h.Trangthai = 'Đang Giao' ,h.NgayVanChuyen = CURDATE() WHERE h.Mahoadon = $MaDH;
ELSEIF $Trangthai = 'Đang Giao'  THEN 
UPDATE hoadon h SET h.Trangthai = 'Giao hàng thành công',h.NgayGiaoHang = CURDATE() WHERE h.Mahoadon = $MaDH;
END IF;
END
