<?php

namespace app\models;

use Yii;

class CalendarGS {
	public function generateGKS($startYear) {
		$data = [];
		$data['startYear'] = sprintf("%04d", $startYear);
		$data['endStartYear'] = sprintf("%04d", $startYear + 1);

		$startYearDate = date_create($data['startYear'].'-01-01');
		$endYearDate = date_create($data['startYear'].'-12-31');
		$startDayWeek = $startYearDate->format('N');
		$startCalendarDate = $startYearDate;

		for ($i=1; $i < $startDayWeek ; $i++) { 
			$startCalendarDate->modify('-1 day');
		}

		$dayCount = 371;
		$startCalendarDay = $startCalendarDate->modify('-1 day');
		for ($i = 0; $i < $dayCount; $i++) {
			$startCalendarDay = $startCalendarDay->modify('+1 day');
			$week = $startCalendarDay->format('N');
			$month = $startCalendarDay->format('m');
			$year = $startCalendarDay->format('Y');
			$data['table-1'][$week][$i] = [
				'day' => $startCalendarDay->format('d'),
				'month' => $month,
				'week' => $week,
				'daysInMonth' => cal_days_in_month(CAL_GREGORIAN, $month, $year),
				'year' => $year,
			];
			if($i == 55) {
				$data['table-1']['year'] = $startCalendarDay->format('Y');
				$data['table-1']['century'] = ceil($startCalendarDay->format('Y') / 100);
			}
		}

		$dayCount = 364;
		for ($t = 2; $t <= 4; $t++) {
			$keyData = 'table-'.$t;
			$data['startYear']++;

			$data['startYear'] = sprintf("%04d", $data['startYear']);

			//if($data['startYear']) {
				//$dayCount = 371;
			//}

			$startYearDate = date_create($data['startYear'].'-01-01');
			$endYearDate = date_create($data['startYear'].'-12-31');
			$startDayWeek = $startYearDate->format('N');
			$startCalendarDate = $startYearDate;

			for ($i=1; $i < $startDayWeek ; $i++) { 
				$startCalendarDate->modify('-1 day');
			}

			$startCalendarDay = $startCalendarDate->modify('-1 day');
			for ($i = 0; $i < $dayCount; $i++) {
				$startCalendarDay = $startCalendarDay->modify('+1 day');
				$week = $startCalendarDay->format('N');
				$month = $startCalendarDay->format('m');
				$year = $startCalendarDay->format('Y');
				$data[$keyData][$week][$i] = [
					'day' => $startCalendarDay->format('d'),
					'month' => $month,
					'week' => $week,
					'daysInMonth' => cal_days_in_month(CAL_GREGORIAN, $month, $year),
					'year' => $year,
				];
				if($i == 55) {
					$data[$keyData]['year'] = $startCalendarDay->format('Y');
					$data[$keyData]['century'] = ceil($startCalendarDay->format('Y') / 100);
					$data[$keyData]['lil'] = ceil($startCalendarDay->format('Y') / 400);
					$data[$keyData]['sed'] = ceil($startCalendarDay->format('Y') / 22400);
				}
			}
		}

		//print_r($data);
		//exit();

		return $data;
	}

}
