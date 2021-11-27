<?php
    require "../Shared_Element/DB.php";
    require "../Shared_Element/PHPExcel-1.8/Classes/PHPExcel.php";
    if(isset($_POST['btnExcel']))
    {
        $row=3;
        $objExcel= new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet=$objExcel->getActiveSheet()->setTitle('Điện thoại');
        $selectDT="SELECT * FROM `sanpham` sp INNER JOIN tbldongsanpham dsp on dsp.Madong =sp.maDong";
        $result=selectListItems($selectDT);


        $sheet->setCellValue('A1',"Điện thoại");
        $sheet->setCellValue('A3',"Mã sản phẩm");
        $sheet->setCellValue('B3',"Tên sản phẩm");
        $sheet->setCellValue('C3',"Dòng sản phẩm");
        $sheet->setCellValue('D3',"Giá");

        $sheet->mergeCells('A1:D2');
        $sheet->getColumnDimension("A")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("B")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("C")->setAutoSize(true);// set auto kich cp
        $sheet->getColumnDimension("D")->setAutoSize(true);// set auto kich cp
        
       
        $sheet->getStyle('A3:D3')->getFill()->setFillType(\PHPExcel_Style_Fill:: FILL_SOLID)
        ->getStartColor()->setARGB('00ffff00');


        $sheet->getStyle('A3:D3')->getFont()->setBold(true);

        $sheet->getStyle('A1')->getAlignment()->applyFromArray(
            array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );


        foreach ($result as $dt) {
            $row++;
            $sheet->setCellValue('A'.$row,$dt['MaSP']);
            $sheet->setCellValue('B'.$row,$dt['TenSP']);
            $sheet->setCellValue('C'.$row,$dt['Tendong']);
            $sheet->setCellValue('D'.$row,$dt['Gia']);
        }

        $styleArray=array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $sheet->getStyle('A3:D'.$row.'')->applyFromArray($styleArray);

        $sheet->getStyle('A3:D'.$row.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objWriter= new PHPExcel_Writer_Excel2007($objExcel);
        $fileName='dienthoai.xlsx';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <button name="btnExcel" type="submit">Xuất excel</button>
    </form>
</body>
</html>