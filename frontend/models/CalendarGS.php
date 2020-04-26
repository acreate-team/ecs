<?php

namespace app\models;

use Yii;

class CalendarGS {
	protected $days_in_month = [31,28,31,30,31,30,31,31,30,31,30,31];

	public function generateGKS($startYear, $startWeekDay) {
		$data = [];
		//$data['startYear'] = sprintf("%04d", $startYear);
		//$data['endStartYear'] = sprintf("%04d", $startYear + 1);

		//дней до пн
		if($startWeekDay == 0) {
			$startWeekDay = 7;
			$prevDay = 6;
		} else {
			$prevDay = $startWeekDay;
			$fix = true;
		}

		//начало календаря
		$startDecDay = 31;
		for ($i=0; $i < $prevDay - 1; $i++) { 
			$startDecDay--;
		}

		for ($i=0; $i < $prevDay; $i++) { 
			$startWeekDay--;
		}

		//начальный месяц и день
		if($startDecDay != 31) {
			$startMonth = 12;
			$startDay = $startDecDay;
		} else {
			$startMonth = 1;
			$startDay = 1;
		}

		if($startWeekDay == 0) {
			$startWeekDay = 1;
			$fix = false;
		}

		//t-1
		if($fix) $dayCount = 372;
		else $dayCount = 371;
		for ($i = 0; $i < $dayCount; $i++) {
			$yearData = $startYear;

			if($i < 7) {
				if($startMonth == 12) {
					$yearData = $startYear - 1;
				}
			}

			$data['table-1'][$startWeekDay][$i] = [
				'day' => $startDay,
				'month' => $startMonth,
				'week' => $startWeekDay,
				'daysInMonth' => $this->days_in_month[$startMonth-1],
				'year' => $yearData,
			];

			if($startDay == $this->days_in_month[$startMonth-1]) {
				$startDay = 0;
				if($startMonth == 12) $startMonth = 1;
				else $startMonth++;
			}

			if($startWeekDay == 7) $startWeekDay = 0;

			$startDay++;
			$startWeekDay++;			
		}

		$data['table-1']['year'] = $yearData;
		$data['table-1']['century'] = ceil($yearData / 100);
		$data['table-1']['lil'] = ceil($yearData / 400);
		$data['table-1']['sed'] = ceil($yearData / 22400);		

		if($startDay > 1) {
			$startDay = 32 - (7 - ($startDay - $startWeekDay));
			$startWeekDay = 1;
			$startMonth = 12;		
		}

		//t-2
		$dayCount = 364;
		for ($i = 0; $i < $dayCount; $i++) {
			$yearData = $startYear + 1;

			if($i < 7) {
				if($startMonth == 12) {
					$yearData = $startYear;
				}
			}

			$data['table-2'][$startWeekDay][$i] = [
				'day' => $startDay,
				'month' => $startMonth,
				'week' => $startWeekDay,
				'daysInMonth' => $this->days_in_month[$startMonth-1],
				'year' => $yearData,
			];

			if($startDay == $this->days_in_month[$startMonth-1]) {
				$startDay = 0;
				if($startMonth == 12) $startMonth = 1;
				else $startMonth++;
			}

			if($startWeekDay == 7) $startWeekDay = 0;

			$startDay++;
			$startWeekDay++;			
		}

		$data['table-2']['year'] = $yearData;
		$data['table-2']['century'] = ceil($yearData / 100);
		$data['table-2']['lil'] = ceil($yearData / 400);
		$data['table-2']['sed'] = ceil($yearData / 22400);

		//t-3
		$dayCount = 364;
		for ($i = 0; $i < $dayCount; $i++) {
			$yearData = $startYear + 2;

			if($i < 7) {
				if($startMonth == 12) {
					$yearData = $startYear + 1;
				}
			}

			$data['table-3'][$startWeekDay][$i] = [
				'day' => $startDay,
				'month' => $startMonth,
				'week' => $startWeekDay,
				'daysInMonth' => $this->days_in_month[$startMonth-1],
				'year' => $yearData,
			];

			if($startDay == $this->days_in_month[$startMonth-1]) {
				$startDay = 0;
				if($startMonth == 12) $startMonth = 1;
				else $startMonth++;
			}

			if($startWeekDay == 7) $startWeekDay = 0;

			$startDay++;
			$startWeekDay++;			
		}

		$data['table-3']['year'] = $yearData;
		$data['table-3']['century'] = ceil($yearData / 100);
		$data['table-3']['lil'] = ceil($yearData / 400);
		$data['table-3']['sed'] = ceil($yearData / 22400);

		//t-4
		$dayCount = 364;
		for ($i = 0; $i < $dayCount; $i++) {
			$yearData = $startYear + 3;

			if($i < 7) {
				if($startMonth == 12) {
					$yearData = $startYear + 2;
				}
			}

			if($startMonth == 2) {
				$data['table-4'][$startWeekDay][$i] = [
					'day' => $startDay,
					'month' => $startMonth,
					'week' => $startWeekDay,
					'daysInMonth' => $this->days_in_month[$startMonth-1]+1,
					'year' => $yearData,
				];
			} else {
				$data['table-4'][$startWeekDay][$i] = [
					'day' => $startDay,
					'month' => $startMonth,
					'week' => $startWeekDay,
					'daysInMonth' => $this->days_in_month[$startMonth-1],
					'year' => $yearData,
				];
			}

			if($startMonth == 2) {
				if($startDay == $this->days_in_month[$startMonth-1]+1) {
					$startDay = 0;
					if($startMonth == 12) $startMonth = 1;
					else $startMonth++;
				}
			} else {
				if($startDay == $this->days_in_month[$startMonth-1]) {
					$startDay = 0;
					if($startMonth == 12) $startMonth = 1;
					else $startMonth++;
				}
			}

			if($startWeekDay == 7) $startWeekDay = 0;

			$startDay++;
			$startWeekDay++;			
		}

		$data['table-4']['year'] = $yearData;
		$data['table-4']['century'] = ceil($yearData / 100);
		$data['table-4']['lil'] = ceil($yearData / 400);
		$data['table-4']['sed'] = ceil($yearData / 22400);

		return $data;
	}

}
