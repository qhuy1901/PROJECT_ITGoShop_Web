<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Style\Alignment;

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
                $event->sheet->insertNewRowBefore(1, 5);
                // merge cells for full-width
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->mergeCells('A2:H2');
                $event->sheet->mergeCells('A3:H3');
                $event->sheet->mergeCells('A4:H4');
                $event->sheet->mergeCells('A5:H5');
                // assign cell values
                $event->sheet->setCellValue('A1','CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ ITGOSHOP');
                $event->sheet->setCellValue('A2','Tầng 5, Số 117-119-121 Nguyễn Du, Phường Bến Thành, Quận 1, Thành Phố Hồ Chí Minh');
                $event->sheet->setCellValue('A4','BÁO CÁO KIỂM KÊ - TỒN KHO');
                $event->sheet->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A3:N4')->applyFromArray([
                    'font' => [
                        'size' =>  12,
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A6:N6')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A4')->getAlignment()->applyFromArray(
                    array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,)
                );
                
            },
        ];
    }
}
