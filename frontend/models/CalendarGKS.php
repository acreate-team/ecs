<?php

namespace app\models;

use Yii;

class CalendarGKS {
	protected $days_in_month = [31,28,31,30,31,30,31,31,30,31,30,31];

	public function generateGS($yga) {
		$data = [];
		
		if($yga != 1) $startYear = ($yga * 4) - 3;
		else $startYear = 1;
		
		$startWeekDay = $this->startWeekDayInYear($yga);

		$fix = false;

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
		for ($i=0; $i < $prevDay - 2; $i++) { 
			$startDecDay--;
		}

		for ($i=0; $i < $prevDay; $i++) { 
			$startWeekDay--;
		}

		//начальный месяц и день
		if($startDecDay != 31) {
			$startMonth = 12;
			$startDay = $startDecDay;
		} else if($prevDay <= 1) {
			$startMonth = 1;
			$startDay = 1;
		} else {
			$startMonth = 12;
			$startDay = $startDecDay;			
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
		$data['table-1']['weeks'] = 53;	

		if($startDay > 1) {
			$startDay = 32 - (7 - ($startDay - $startWeekDay));
			$startWeekDay = 1;
			$startMonth = 12;		
		}

		//t-2
		$dayCount = 371;
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
		$data['table-2']['weeks'] = 53;

		if($startDay > 1) {
			$startDay = 32 - (7 - ($startDay - $startWeekDay));
			$startWeekDay = 1;
			$startMonth = 12;		
		}

		//t-3
		$dayCount = 371;
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
		$data['table-3']['weeks'] = 53;

		if($startDay > 1) {
			$startDay = 32 - (7 - ($startDay - $startWeekDay));
			$startWeekDay = 1;
			$startMonth = 12;		
		}

		//t-4
		$dayCount = 371;
		if($yearData == 22399) {
			$dayCount = 364;
		}

		for ($i = 0; $i < $dayCount; $i++) {
			$yearData = $startYear + 3;

			if($i < 7) {
				if($startMonth == 12) {
					$yearData = $startYear + 2;
				}
			}

			if($startMonth == 2) {
				if($yearData == 22400) {
					$data['table-4'][$startWeekDay][$i] = [
						'day' => $startDay,
						'month' => $startMonth,
						'week' => $startWeekDay,
						'daysInMonth' => 22,
						'year' => $yearData,
					];
				} else {
					if(is_int($yearData / 100) && !is_int($yearData / 400)) {
						$data['table-4'][$startWeekDay][$i] = [
							'day' => $startDay,
							'month' => $startMonth,
							'week' => $startWeekDay,
							'daysInMonth' => $this->days_in_month[$startMonth-1],
							'year' => $yearData,
						];
					} else {
						$data['table-4'][$startWeekDay][$i] = [
							'day' => $startDay,
							'month' => $startMonth,
							'week' => $startWeekDay,
							'daysInMonth' => $this->days_in_month[$startMonth-1]+1,
							'year' => $yearData,
						];
					}
				}
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
				} else {
					if($startDay == 22 && $yearData == 22400) {
						$startDay = 0;
						$startMonth++;
					}
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
		$data['table-4']['weeks'] = 53;

		if($yearData == 22400) {
			$data['table-4']['weeks'] = 52;
		}

		return $data;
	}

	public function generateDS($yga) {
		$data = [];

		if($yga == 100) $yga = 1;

		$sed = ceil($yga * 4 / 100);
		$lil = ceil($yga / 100);
		$ygaStart = ($lil - 1) * 100 + 1;

		$data['century'] = ceil($ygaStart * 4 / 100);
		$data['sed'] = ceil(($yga * 4) / 22400);
		$data['lil'] = $lil;
		$data['yga'] = $ygaStart;

		$yearStart = $ygaStart * 4 - 3;
		$data['year'] = $yearStart;
		$startWeekDay = 1;
		$dayTotalCount = 0;

		if($lil > 1) $dayTotalCount = 146097 * ($lil - 1);

		$yearStart--;

		for($m = 1; $m <= 25; $m++) {
			for($i = 1; $i <= 4; $i++) {
				if($i != 4) $dayCount = 365;
				else $dayCount = 366;

				if($m == 25) {
					$dayCount = 365;
				}

				$dayTotalCount += $dayCount;

				if($startWeekDay > 7) {
					$startWeekDay = $startWeekDay - 7;
				}

				$data['lil-1'][] = [
					'yga' => $ygaStart,
					'year' => $yearStart + $i,
					'dayCount' => $dayCount,
					'weekDay' => $startWeekDay,
					'dayTotalCount' => $dayTotalCount,
				];

				$startWeekDay++;

				if($i == 4) {
					$yearStart = $yearStart + $i;
					$startWeekDay++;
					$ygaStart++;
				}
			}
		}

		$startWeekDay--;

		for($m = 1; $m <= 25; $m++) {
			for($i = 1; $i <= 4; $i++) {
				if($i != 4) $dayCount = 365;
				else $dayCount = 366;

				if($m == 25) {
					$dayCount = 365;
				}

				$dayTotalCount += $dayCount;

				if($startWeekDay > 7) {
					$startWeekDay = $startWeekDay - 7;
				}

				$data['lil-2'][] = [
					'yga' => $ygaStart,
					'year' => $yearStart + $i,
					'dayCount' => $dayCount,
					'weekDay' => $startWeekDay,
					'dayTotalCount' => $dayTotalCount,
				];

				$startWeekDay++;

				if($i == 4) {
					$yearStart = $yearStart + $i;
					$startWeekDay++;
					$ygaStart++;
				}
			}
		}

		$startWeekDay--;

		for($m = 1; $m <= 25; $m++) {
			for($i = 1; $i <= 4; $i++) {
				if($i != 4) $dayCount = 365;
				else $dayCount = 366;

				if($m == 25) {
					$dayCount = 365;
				}

				$dayTotalCount += $dayCount;

				if($startWeekDay > 7) {
					$startWeekDay = $startWeekDay - 7;
				}

				$data['lil-3'][] = [
					'yga' => $ygaStart,
					'year' => $yearStart + $i,
					'dayCount' => $dayCount,
					'weekDay' => $startWeekDay,
					'dayTotalCount' => $dayTotalCount,
				];

				$startWeekDay++;

				if($i == 4) {
					$yearStart = $yearStart + $i;
					$startWeekDay++;
					$ygaStart++;
				}
			}
		}

		$startWeekDay--;

		for($m = 1; $m <= 25; $m++) {
			for($i = 1; $i <= 4; $i++) {
				if($i != 4) $dayCount = 365;
				else $dayCount = 366;

				if($m == 25) {
					$dayCount = 365;
				}

				if($m == 25 && $i == 4) {
					$dayCount = 366;
				}

				$dayTotalCount += $dayCount;

				if($startWeekDay > 7) {
					$startWeekDay = $startWeekDay - 7;
				}

				if($yearStart + $i == 22400) {
					$dayTotalCount -= 7;
					$dayCount -= 7;
				}

				$data['lil-4'][] = [
					'yga' => $ygaStart,
					'year' => $yearStart + $i,
					'dayCount' => $dayCount,
					'weekDay' => $startWeekDay,
					'dayTotalCount' => $dayTotalCount,
				];

				$startWeekDay++;

				if($i == 4) {
					$yearStart = $yearStart + $i;
					$startWeekDay++;
					$ygaStart++;
				}
			}
		}

		return $data;
	}

	public function startWeekDayInYear($yga) {
		if($yga >= 100000) {
			$yga = intval(substr($yga, 4, 5));
		} else if($yga >= 10000) {
			$yga = intval(substr($yga, 3, 4));
		} else if($yga >= 1000) {
			$yga = intval(substr($yga, 2, 3));
		} else if($yga > 100) {
			$yga = intval(substr($yga, 1, 2));
		}

		if($yga == 0) $yga = 100;

		$block = $yga / 25;

		if(is_int($yga / 7)) {
			$weekDay = 3;
		} else {
			for($i = 1; $i <= 7; $i++) {
				if(is_int(($yga - $i) / 7)) {
					$yga_week = $yga - $i;
				}
			}

			$yga_diff = $yga - $yga_week;
			if($yga_diff == 1) $weekDay = 1;
			if($yga_diff == 2) $weekDay = 6;
			if($yga_diff == 3) $weekDay = 4;
			if($yga_diff == 4) $weekDay = 2;
			if($yga_diff == 5) $weekDay = 7;
			if($yga_diff == 6) $weekDay = 5;
		}

		if($block > 1) {
			$weekDay = $weekDay - floor($block);
		}

		if(is_int($block) && $block != 1) {
			$weekDay++;
		}

		if($weekDay == 0) $weekDay = 7;
		if($weekDay == -1) $weekDay = 6;
		if($weekDay == -2) $weekDay = 5;
		if($weekDay == -3) $weekDay = 4;
		if($weekDay == -4) $weekDay = 3;
		if($weekDay == -5) $weekDay = 2;
		if($weekDay == -6) $weekDay = 1;

		return $weekDay;
	}
}
