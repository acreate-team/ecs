<?php

namespace app\models;

use Yii;

class CalendarGS {
	public function generateGKS($startYear) {
		$data = [];
		$data['startYear'] = $startYear;
		$data['endStartYear'] = $startYear + 1;

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
			if($i == 55) $data['table-1']['year'] = $startCalendarDay->format('Y');
		}

		$dayCount = 364;
		$startCalendarDay = $startCalendarDate->modify('-1 day');
		for ($t = 2; $t <= 4; $t++) {
			if($t == 2) $startCalendarDay = $startCalendarDay->modify('+1 day');
			$keyData = 'table-'.$t;
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
				if($i == 55) $data[$keyData]['year'] = $startCalendarDay->format('Y');
			}
		}

		return $data;
	}

}
