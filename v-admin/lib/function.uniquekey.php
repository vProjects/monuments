<?php
	
	include('class.uniqueKey.php');
	
	include('PHPExcel.php');
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Create a new uniqueKey Object
	$uniqueKey = new uniqueKey();
	
	// Set document properties
$objPHPExcel->getProperties()->setCreator("Vyrazu Labs")
							 ->setLastModifiedBy("Vyrazu Labs")
							 ->setTitle("Keys for Living Monument")
							 ->setSubject("Keys for Living Monument")
							 ->setDescription("Keys for Living Monument")
							 ->setKeywords("Keys for Living Monument")
							 ->setCategory("Keys for Living Monument");
	
	
	
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		switch ($_POST['request']) {
			case 'Generate Key':
					
				$uniqueKey->uniqueKeyGenerator();
				header('Location: ../short.php');
			
				break;
				
			case 'Download Excel':
				
					$from = $_POST['excelFrom'];
					$to = $_POST['excelTo'];
					
					//gets the key data from the database
					$keyValues = $uniqueKey->getKeys($from, $to);
					
					// Adding headers to the excel sheet
					$objPHPExcel->setActiveSheetIndex(0)
					            ->setCellValue('A1', 'unique keys')
					            ->setCellValue('B1', 'corresponding urls');
					
					$rowValue = 2;
					
					foreach ($keyValues as $key => $value) {
									$objPHPExcel->setActiveSheetIndex(0)
												->setCellValue('A'.$rowValue,$value['uniqueKey'])
												->setCellValue('B'.$rowValue,'http://www.livingmonument.org/registration.php?id='.$value['uniqueKey']);
									$rowValue++;			
								}
					
					
					// Rename worksheet
					$objPHPExcel->getActiveSheet()->setTitle('Simple');
					
					
					// Set active sheet index to the first sheet, so Excel opens this as the first sheet
					$objPHPExcel->setActiveSheetIndex(0);
					
					
					// Redirect output to a client’s web browser (Excel2007)
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment;filename="01simple.xlsx"');
					header('Cache-Control: max-age=0');
					// If you're serving to IE 9, then the following may be needed
					header('Cache-Control: max-age=1');
					
					// If you're serving to IE over SSL, then the following may be needed
					header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
					header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
					header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
					header ('Pragma: public'); // HTTP/1.0
					
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
					$objWriter->save('php://output');
					exit;
				
				
				break;
			default:
				
				break;
		}
		
		
		
		
/*
		if($_POST['uniqueKey'] == 'Generate Key'){
				$uniqueKey->uniqueKeyGenerator();
				header('Location: ../short.php');
			
					
				}
				else 
		if($_POST['DownloadExcel'] == 'Download Excel'){
			
			$from = $_POST['excelFrom'];
			$to = $_POST['excelTo'];
			
			//gets the key data from the database
			$keyValues = $uniqueKey->getKeys($from, $to);
			
			// Adding headers to the excel sheet
			$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A1', 'unique keys')
			            ->setCellValue('B1', 'corresponding urls');
			
			$rowValue = 2;
			
			foreach ($keyValues as $key => $value) {
							$objPHPExcel->setActiveSheetIndex(0)
										->setCellValue('A'.$rowValue,$value['uniqueKey'])
										->setCellValue('B'.$rowValue,'http://www.livingmonument.org/registration.php?id='.$value['uniqueKey']);
							$rowValue++;			
						}
			
			
			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle('Simple');
			
			
			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			
			
			// Redirect output to a clientâ€™s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="01simple.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
			
			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
			
			
		}
*/
	}



?>