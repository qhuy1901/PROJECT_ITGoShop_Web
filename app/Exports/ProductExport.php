<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Session;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

use DB;
class ProductExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return DB::table('product')
        ->select('ProductId', 'ProductName', 'CategoryName', 'BrandName', 'Cost', 'Price', 'Sold', 'Quantity')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->get();
    }
    public function headings(): array
    {
        return ["Mã sản phẩm", "Tên sản phẩm", "Danh mục sản phẩm", "Thương hiệu", "Giá vốn", "Giá bán", "Đã bán", "Tồn kho khả dụng"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // at row 1, insert 2 rows
                $numberProduct = count(DB::table('product')->get());
                $ProductArea = $numberProduct + 7;

                $event->sheet->insertNewRowBefore(1, 6);
                $fullsheet = $ProductArea + 10;
                $event->sheet->getDelegate()->getStyle('A1:H'.$fullsheet.'')->getFont()->setName('Times New Roman');

                // merge cells for full-width
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->mergeCells('A2:H2');
                $event->sheet->mergeCells('A3:H3');
                $event->sheet->mergeCells('A4:H4');
                $event->sheet->mergeCells('A5:H5');
                $event->sheet->mergeCells('A6:H6');

                // assign cell values
                $event->sheet->setCellValue('A1','CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ ITGOSHOP');
                $event->sheet->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'bold' => true
                    ]
                ]);

                $event->sheet->setCellValue('A2','Tầng 5, Số 117-119-121 Nguyễn Du, Phường Bến Thành, Quận 1, Thành Phố Hồ Chí Minh');
                $event->sheet->getStyle('A2:N2')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                    ]
                ]);

                $event->sheet->setCellValue('A4','PHIẾU KIỂM KHO');
                $event->sheet->getStyle('A4:N4')->applyFromArray([
                    'font' => [
                        'size' =>  16,
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A4')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,)
                );

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $event->sheet->setCellValue('A5','(Ngày kiểm kho: '.date('H:i d-m-Y').')');
                $event->sheet->getStyle('A5:N5')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'italic' => true
                    ]
                ]);
                $event->sheet->getStyle('A5')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,)
                );

                // $event->sheet->getDelegate()->getStyle('A7')->getFont()->getColor()
                // ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                $event->sheet->getStyle('A7:H'.$ProductArea.'')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,)
                );
                $event->sheet->getDelegate()->getStyle('A7:H7')->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FF00FFFF');
                $event->sheet->getStyle('A7:N7')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'bold' => true
                    ]
                ]);
                for($x = 7; $x <= $ProductArea; $x++){
                    $event->sheet->getStyle('A7:N'.$ProductArea.'')->getActiveSheet()->getRowDimension(''.$x.'')->setRowHeight(25);
                }
                $event->sheet->getStyle('A7:N'.$ProductArea.'')->getActiveSheet()->getStyle('A7:H'.$ProductArea.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
                
                

                $ngaythang = $ProductArea + 3;
                $event->sheet->mergeCells('E'.$ngaythang.':G'.$ngaythang.'');
                $event->sheet->setCellValue('E'.$ngaythang.'','Ngày . . .  tháng . . . năm . . .');
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,)
                );
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->applyFromArray([
                    'font' => [
                        'size' =>  12
                    ]
                ]);

                $ngaythang += 1;
                $event->sheet->mergeCells('E'.$ngaythang.':G'.$ngaythang.'');
                $event->sheet->setCellValue('E'.$ngaythang.'','Nhân viên kiểm kho');
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,)
                );
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'bold' => true
                    ]
                ]);

                $ngaythang += 1;
                $event->sheet->mergeCells('E'.$ngaythang.':G'.$ngaythang.'');
                $event->sheet->setCellValue('E'.$ngaythang.'','(Kí, ghi rõ họ tên)');
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,)
                );
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'italic' => true
                    ]
                ]);
                
                $FirstName = Session::get('FirstName');
                $LastName = Session::get('LastName');
                $ngaythang += 5;
                $event->sheet->mergeCells('E'.$ngaythang.':G'.$ngaythang.'');
                $event->sheet->setCellValue('E'.$ngaythang.'',''.$LastName.' '.$FirstName.'');
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,)
                );
                $event->sheet->getStyle('E'.$ngaythang.':G'.$ngaythang.'')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                    ]
                ]);
            },
        ];
    }
}
