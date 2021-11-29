--Bước 1
CREATE VIEW vw_tienPK AS
SELECT ct.Mahoadon,ct.MaSp,ct.SoLuong,SUM((SELECT Gia FROM chitietphukien WHERE Maphukien = ct.MaSp)*SoLuong) AS tien FROM chitiethoadon ct
WHERE ct.MaSp LIKE 'PK%'
GROUP BY ct.Mahoadon;
--Bước 2
CREATE VIEW vw_tienDT AS
SELECT ct.Mahoadon,ct.MaSp,ct.SoLuong,SUM((SELECT Gia FROM sanpham WHERE MaSP = ct.MaSp)*SoLuong) AS tien FROM chitiethoadon ct
WHERE ct.MaSp NOT LIKE 'PK%'
GROUP BY ct.Mahoadon;
--Bước 3
CREATE VIEW vw_tientheothang AS
SELECT DATE_FORMAT(NgayGiaoHang, ' %m - %Y') AS Quyen, hd.Mahoadon,
(SELECT SUM(tien) FROM vw_tienpk as p WHERE p.Mahoadon = p.Mahoadon) AS tienpk,
(SELECT SUM(tien) FROM vw_tiendt as p WHERE p.Mahoadon = p.Mahoadon) AS tiendt
FROM hoadon hd WHERE NgayGiaoHang!= NULL
LIMIT 0,6;
--Bước 4
CREATE VIEW vm_bd AS
SELECT Quyen,
(SELECT SUM(ThanhTien) FROM hoadon WHERE DATE_FORMAT(NgayGiaoHang, ' %m - %Y') = Quyen ) as doanhthu
,SUM(tienpk)AS tienpk,SUM(tiendt) AS tiendt FROM vw_tientheothang
GROUP BY Quyen
ORDER BY Quyen DESC
