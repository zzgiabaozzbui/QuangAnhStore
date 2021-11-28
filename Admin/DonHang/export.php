<?php
    require "../Shared_Element/DB.php";
    require "../Shared_Element/PHPExcel-1.8/Classes/PHPExcel.php";
        $Mahoadon = $_GET['Mahoadon'];
        echo $Mahoadon;

        if(isset($_POST['btnExcel']))
        {
            $row=3;
            $objExcel= new PHPExcel;
            $objExcel->setActiveSheetIndex(0);
            $sheet=$objExcel->getActiveSheet()->setTitle('Hóa đơn khách hàng');
            $selectDT=" SELECT h.Mahoadon,h.Ten,h.SDT,pk.Tenphukien,c.SoLuong, 1 AS Type,
            h.Ngaydat,h.NgayGiaoHang,h.Diachi,pk.Gia FROM hoadon h INNER JOIN chitiethoadon c ON h.Mahoadon = c.Mahoadon
              INNER JOIN chitietphukien pk ON c.MaSP = pk.Maphukien WHERE h.Mahoadon = '". $Mahoadon ."' UNION 
            
             SELECT h.Mahoadon,h.Ten,h.SDT,s.TenSP,c.SoLuong, 2 AS Type,
            h.Ngaydat,h.NgayGiaoHang,h.Diachi, s.Gia FROM hoadon h INNER JOIN chitiethoadon c ON h.Mahoadon = c.Mahoadon
             INNER JOIN sanpham s ON c.MaSP = s.MaSP WHERE h.Mahoadon = '". $Mahoadon ."'";
             echo $selectDT;
            $result=selectListItems($selectDT);
            $sheet->setCellValue('A1',"HÓA ĐƠN KHÁCH HÀNG");
            $sheet->setCellValue('A3',"Mã hóa đơn");
            $sheet->setCellValue('B3',"Tên khách hàng");
            $sheet->setCellValue('C3',"Số điện thoại");
            $sheet->setCellValue('D3',"Địa chỉ");
            $sheet->setCellValue('E3',"Ngày đặt hàng");
            $sheet->setCellValue('F3',"Ngày nhận hàng");
            $sheet->setCellValue('G3',"Tên sản phẩm,phụ kiện");
            $sheet->setCellValue('H3',"Loại hàng");
            $sheet->setCellValue('I3',"Số lượng đặt");
            $sheet->setCellValue('J3',"Giá sản phẩm");
            $sheet->setCellValue('K3',"Thành tiền");
            $sheet->mergeCells('A1:K2');
            $sheet->getColumnDimension("A")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("B")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("C")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("D")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("E")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("F")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("G")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("H")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("I")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("J")->setAutoSize(true);// set auto kich cp
            $sheet->getColumnDimension("K")->setAutoSize(true);// set auto kich cp
            
           
            $sheet->getStyle('A3:K3')->getFill()->setFillType(\PHPExcel_Style_Fill:: FILL_SOLID)
            ->getStartColor()->setARGB('00ffff00');
           
    
    
            $sheet->getStyle('A3:K3')->getFont()->setBold(true);
    
            $sheet->getStyle('A1')->getAlignment()->applyFromArray(
                array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
            );
    
            $r= 4;
    
            foreach ($result as $dt) {
                $row++;
                $sp= "";
                if($dt['Type']==2){
                    $sp= "Điện thoại";

                }else {
                    $sp= "Phụ kiện";
                }                
                $sheet->setCellValue('G'.$row,$dt['Tenphukien']);
                $sheet->setCellValue('I'.$row,$dt['SoLuong']);
                $sheet->setCellValue('H'.$row,$sp);
                $sheet->setCellValue('J'.$row, number_format($dt['Gia']));
               
                $sheet->setCellValue('K'.$row,$dt['SoLuong']*$dt['Gia']);
               
            }
            $sheet->setCellValue('A4',$dt['Mahoadon']);
            $sheet->setCellValue('B4',$dt['Ten']);
            $sheet->setCellValue('C4',$dt['SDT']);
            $sheet->setCellValue('D4',$dt['Diachi']);
            $sheet->setCellValue('E4',date(" d-m-Y s:i:H", strtotime($dt['Ngaydat'])));
            $sheet->setCellValue('F4',date("d-m-Y", strtotime($dt['NgayGiaoHang'])));
            $sheet->setCellValue('K'.($row+1),"=SUM(K4:K$row)");
            $sheet->setCellValue('J'.($row+1),"Tổng tiền:");
            // $sheet->setCellValue('L2',date("d-m-Y", strtotime()));
            $sheet->getStyle('K'.($row+1))->getFill()->setFillType(\PHPExcel_Style_Fill:: FILL_SOLID)
            ->getStartColor()->setARGB('00ffff00');
            $styleArray=array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A3:K4')->applyFromArray($styleArray);
            $sheet->getStyle('A3:K'.($row+1))->applyFromArray($styleArray);
            $sheet->getStyle('A3:K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objWriter= new PHPExcel_Writer_Excel2007($objExcel);
            $fileName='HDKhachHang.xlsx';
            $objWriter->save($fileName);
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename='.basename($fileName));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileName));
            ob_clean();
            flush();
            readfile($fileName);
            return;
        }
?>