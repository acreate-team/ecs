<?php

namespace app\models;

use Yii;

class CalendarGS {
	public function generateGKS($startYear) {
		//данные
		$data = [];
		$data['startYear'] = $startYear;
		$data['endStartYear'] = $startYear + 1;

		//первый день года
		$startYearDate = date_create($data['startYear'].'-01-01');
		//последний день года
		$endYearDate = date_create($data['startYear'].'-12-31');
		//день недели первого дня года
		$startDayWeek = $startYearDate->format('N');
		////$this->getInfo('Первый день года', $startYearDate);
		////$this->getInfo('Последний день года', $endYearDate);

		//вычисляем начало календаря с ПН (таблица 1)
		$startCalendarDate = $startYearDate;

		for ($i=1; $i < $startDayWeek ; $i++) { 
			$startCalendarDate->modify('-1 day');
		}
		////$this->getInfo('Первый день таблицы 1', $startCalendarDate);

		//создадим массив данных о днях (таблица 1)
		$dayCount = 371; //количество ячейк в одной таблице
		$startCalendarDay = $startCalendarDate->modify('-1 day'); //-1 для цикла
		for ($i = 0; $i < $dayCount; $i++) {
			$startCalendarDay = $startCalendarDay->modify('+1 day'); //+1 день в цикле
			$week = $startCalendarDay->format('N');
			$data['table-1'][$week][$i] = [
				'day' => $startCalendarDay->format('d'),
				'month' => $startCalendarDay->format('m'),
				'year' => $startCalendarDay->format('Y'),
			]; //передадим дату ячейки
			if($i == 55) $data['table-1']['year'] = $startCalendarDay->format('Y');
		}
		////$this->getInfo('Последний день таблицы 1', $data['table-1'][count($data['table-1'])-1], false);

		//создадим массив данных о днях (таблица 2,3,4)
		$dayCount = 364; //количество ячейк в одной таблице
		$startCalendarDay = $startCalendarDate->modify('-1 day'); //-1 для цикла
		for ($t = 2; $t <= 4; $t++) { //цикл для таблиц 2,3,4
			if($t == 2) $startCalendarDay = $startCalendarDay->modify('+1 day'); //+1 день поправки для цикла
			$keyData = 'table-'.$t;
			for ($i = 0; $i < $dayCount; $i++) {
				$startCalendarDay = $startCalendarDay->modify('+1 day'); //+1 день в цикле
				$week = $startCalendarDay->format('N');
				$data[$keyData][$week][$i] = [
					'day' => $startCalendarDay->format('d'),
					'month' => $startCalendarDay->format('m'),
					'year' => $startCalendarDay->format('Y'),
				];
				if($i == 55) $data[$keyData]['year'] = $startCalendarDay->format('Y');
			}

			////$this->getInfo('Первый день таблицы '.$t, $data[$keyData][0], false);
			////$this->getInfo('Последний день таблицы '.$t, $data[$keyData][count($data[$keyData])-1], false);
		}

		return $data; //передадим данные
	}

	public function getInfo($name, $date, $d = true) {
		if($d) echo '<b>'.$name . '</b>:<br/> '.$date->format('d.m.Y') . ' / День недели: '.$date->format('N') . "<br /><br />";
		else echo '<b>'.$name . '</b>:<br/> '.$date . "<br /><br />";
	}

}
