<?php
    require "../Shared_Element/DB.php";
    require "../Shared_Element/PHPExcel-1.8/Classes/PHPExcel.php";
    if(isset($_POST['btnexcel']))
    {

        $row=3;
        $objExcel= new PHPExcel;
        //Set sheet
        $objExcel->setActiveSheetIndex(0);
        //Set nhãn cho sheet
        $sheet=$objExcel->getActiveSheet()->setTitle('Danh sách khách hàng');
        $selectkh="SELECT * FROM khachhang ";
        $result=selectListItems($selectkh);

        //Set cột
        $sheet->setCellValue('A1',"Danh sách khách hàng");
        $sheet->setCellValue('A3',"Mã khách hàng");
        $sheet->setCellValue('B3',"Tên đăng nhập");
        $sheet->setCellValue('C3',"Mật khẩu");
        $sheet->setCellValue('D3',"Họ và tên");
        $sheet->setCellValue('E3',"Email");
        $sheet->setCellValue('F3',"Số điện thoại");
        $sheet->setCellValue('G3',"Địa chỉ");
        $sheet->setCellValue('H3',"Ngày sinh");

        //Hợp nhất ô
        $sheet->mergeCells('A1:D2');
        $sheet->getColumnDimension("A")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("B")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("C")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("D")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("E")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("F")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("G")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("H")->setAutoSize(true);// set auto kich cp
        
        //Set đổ màu heder
        $sheet->getStyle('A3:H3')->getFill()->setFillType(\PHPExcel_Style_Fill:: FILL_SOLID)
        ->getStartColor()->setARGB('00ffff00');

        //Set in đậm
        $sheet->getStyle('A3:H3')->getFont()->setBold(true);

        //Căn giũa
        $sheet->getStyle('A1')->getAlignment()->applyFromArray(
            array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );


        foreach ($result as $dt) {
            $row++;
            $sheet->setCellValue('A'.$row,$dt['MaKH']);
            $sheet->setCellValue('B'.$row,$dt['Tendangnhap']);
            $sheet->setCellValue('C'.$row,$dt['Matkhau']);
            $sheet->setCellValue('D'.$row,$dt['fullname']);
            $sheet->setCellValue('E'.$row,$dt['Email']);
            $sheet->setCellValue('F'.$row,$dt['sdt']);
            $sheet->setCellValue('G'.$row,$dt['Diachi']);
            $sheet->setCellValue('H'.$row,$dt['Ngaysinh']);
        }

        //Set border
        $styleArray=array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );        
        $sheet->getStyle('A3:H'.$row.'')->applyFromArray($styleArray);

        //Căn giữa
        $sheet->getStyle('A3:H'.$row.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //tạo obj PHPExcel_Writer_Excel2007
        $objWriter= new PHPExcel_Writer_Excel2007($objExcel);
        //đặt tên file
        $fileName='khachhang.xlsx';

        //Save file excel
        $objWriter->save($fileName);
        //Dowload file bằng php
        //header: viết tắt header() is used to send a raw HTTP header
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        //cho biết liệu nội dung có được mong đợi được hiển thị nội dòng trong trình duyệt hay không
        header('Content-Disposition: attachment; filename='.basename($fileName));
        //được sử dụng để chỉ định một kiểu mã hoá bổ trợ được áp dụng cho 
        //dữ liệu để cho phép nó đi qua các cơ chế vận chuyển thư có thể có các giới hạn về bộ ký tự hoặc dữ liệu.
        header('Content-Transfer-Encoding: binary');
        //cho phép nhà phát triển web cho trình duyệt biết liệu tài nguyên trên trang web 
        //có cần được yêu cầu từ nguồn hay không hoặc có thể tìm nạp tài nguyên đó từ bộ nhớ cache của trình duyệt hay không.
        header('Expires: 0');
        //Cache-control là một tiêu đề HTTP được sử dụng để chỉ định các chính sách bộ nhớ đệm của trình duyệt 
        //trong cả yêu cầu của máy khách và phản hồi của máy chủ. 
        header('Cache-Control: must-revalidate');
        //pragma có nghĩa là trình duyệt thông báo cho máy chủ 
        //và bất kỳ bộ đệm trung gian nào rằng nó muốn có phiên bản mới của tài nguyên và ngược lại là không đúng.
        header('Pragma: public');
        //Set size
        header('Content-Length: ' . filesize($fileName));
        //xóa tất cả nội dung của bộ đệm đầu ra trên cùng, ngăn không cho chúng được gửi đến trình duyệt.
        ob_clean();
        flush();
        //readfile đọc một tập tin và ghi nó vào bộ đệm đầu ra.
        readfile($fileName);
        return;
    }
?>