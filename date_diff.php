<?php
define("LONG_FORMAT", 1);
define("SHORT_FORMAT", 2);

function span($class){
	if(trim($class) == ""){
		return "<span>";
	}else{
		return "<span class='" . $class . "'>";
	}
}

function closeSpan(){
	return "</span>";
}

function get_date_diff($start = "", $end = "", $format = SHORT_FORMAT){
	if($start != "" && $end != ""){
		$now = new DateTime($start);
		$end = new DateTime($end);
		$dateDiff = $end->diff($now);
		$yil = $dateDiff->y;
		$ay = $dateDiff->m;
		$gun = $dateDiff->d;
		$saat = $dateDiff->h;
		$dakika = $dateDiff->i;
		$saniye = $dateDiff->s;

		$difText = "";

		if($format == LONG_FORMAT){
			if($yil > 0)
				$difText .= span('yearSpan') . $yil . closeSpan() . 'yıl ';
			if($ay > 0)
				$difText .= span('monthSpan') . $ay . closeSpan() . 'ay ';
			if($gun > 0)
				$difText .= span('daySpan') . $gun . closeSpan() . 'gün ';
			if($saat > 0)
				$difText .= span('hourSpan') . $saat . closeSpan() . 'saat ';
			if($dakika > 0)
				$difText .= span('minuteSpan') . $dakika . closeSpan() . 'dakika ';
			if($saniye > 0)
				$difText .= span('secondSpan') . $saniye . closeSpan() . 'saniye ';
		}else if($format == SHORT_FORMAT){
			if($yil > 0){
				if($ay >= 6){
					$difText = "yaklaşık " . ($yıl+1) ." yıl";
				}else{
					$difText = $yil . " yıl";
				}
			}else if($ay > 0){
				if($gun >= 15){
					$difText = "yaklaşık " . ($ay+1) . " ay";
				}else{
					$difText = $ay . "ay";
				}
			}else if($gun > 0){
				$difText = $gun . " gün";
			}else if($saat > 0){
				$difText = $saat . " saat";
			}else{
				$difText = "$dakika dakika $saniye saniye";
			}
			return $difText;
		}else{
			return null;
		}

	}else{
		return null;
	}

}

?>