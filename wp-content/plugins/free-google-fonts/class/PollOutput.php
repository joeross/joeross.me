<?php

class GF_Poll_Output {

    static public function GeneratePollOutput($oPoll, $area, $width = 270, $height = 180, $legend = 'none') {
        $r = '';
        switch ($oPoll->type) {
            case '0' : $r = self::GeneratePollOutputForPieChart($oPoll, $area, $width, $height, $legend);
                break;
            case '1' : $r = self::GeneratePollOutputForBarChart($oPoll, $area, $width, $height, $legend);
                break;
            case '2' : $r = self::GeneratePollOutputForColumnChart($oPoll, $area, $width, $height, $legend);
                break;
            case '3' : $r = self::GeneratePollOutputForPieChart($oPoll, $area, $width, $height, $legend, "0.4");
                break;
            default:
                $r = self::GeneratePollOutputForPieChart($oPoll, $area, $width, $height, $legend);
                break;
        }
        return $r;
    }

    static public function GeneratePollOutputForPieChart($oPoll, $area, $width = 270, $height = 180, $legend = 'none', $piehole = false) {
        $kod = array();
        $kod[] = "<script type=\"text/javascript\">";
        $kod[] = "      google.load(\"visualization\", \"1\", {packages:[\"corechart\"], callback:drawChart});";
        $kod[] = "      google.setOnLoadCallback(drawChart);";
        $kod[] = "      function drawChart() {";
        $kod[] = "        var data = google.visualization.arrayToDataTable([";
        $kod[] = "          ['Answer', 'Votes'],";
        $answers = GFontsDB::GetAnswersForPoll($oPoll->id);
        $maxHits = 0;
        foreach ($answers as $answer) {
            $kod[] = "          ['" . $answer->answer . "'," . $answer->hits . "],";
            if ($answer->hits > $maxHits)
                $maxHits = $answer->hits;
        }
        $kod[] = "        ]);";
        $kod[] = "";
        $kod[] = "        var options = {";
        if ($piehole === false) {
            $kod[] = "          is3D: true,";
        }
        $kod[] = "          width: " . $width . ",";
        $kod[] = "          height: " . $height . ",";
        $kod[] = "          backgroundColor: 'transparent',";
        $kod[] = "          legend: {position: '" . $legend . "'},";
        $kod[] = self::ChartLegendBuilder($legend);

        $printmode = 'label';
        switch ($oPoll->results_type) {
            case 0 : $printmode = 'percentage';
                break;
            case 1 : $printmode = 'value';
                break;
            case 2 : $printmode = 'label';
                break;
        }
        $kod[] = "          pieSliceText: '" . $printmode . "',";
        if ($piehole !== false) {
            $kod[] = "          pieHole: 0.4,";
        }
        $kod[] = "        };";
        $kod[] = "";

        $kod[] = "        var chart = new google.visualization.PieChart(document.getElementById('" . $area . "'));";
        $kod[] = "        chart.draw(data, options);";
        $kod[] = "      }";
        $kod[] = "    </script>";
        return implode("\n", $kod);
    }

    static public function GeneratePollOutputForBarChart($oPoll, $area, $width = 270, $height = 180, $legend = 'none') {
        $kod = array();
        $kod[] = "<script type=\"text/javascript\">";
        $kod[] = "      google.load(\"visualization\", \"1\", {packages:[\"corechart\"], callback:drawChart});";
        $kod[] = "      google.setOnLoadCallback(drawChart);";
        $kod[] = "      function drawChart() {";
        $kod[] = "        var data = google.visualization.arrayToDataTable([";
        $printmode = 'label';
        switch ($oPoll->results_type) {
            case 0 : $printmode = 'percentage';
                break;
            case 1 : $printmode = 'value';
                break;
            case 2 : $printmode = 'label';
                break;
        }
        $percText = ($printmode == 'percentage') ? __(' in %', GFontsEngine::PLUGIN_SLUG) : "";
        $kod[] = "          ['Answer', 'Votes" . $percText . "'],";
        $answers = GFontsDB::GetAnswersForPoll($oPoll->id);
        $maxHits = 0;
        $sumHits = 0;

        foreach ($answers as $answer) {
            $sumHits += $answer->hits;
        }
        foreach ($answers as $answer) {
            if ($printmode != 'percentage') {
                $kod[] = "          ['" . $answer->answer . "'," . $answer->hits . "],";
            } else {
                if (round(($answer->hits * 100) / $sumHits) > $maxHits) {
                    $maxHits = round(($answer->hits * 100) / $sumHits);
                }
                $kod[] = "          ['" . $answer->answer . "'," . round(($answer->hits * 100) / $sumHits) . "],";
            }
        }
        $kod[] = "        ]);";
        $kod[] = "";
        $kod[] = "        var options = {";
        $kod[] = "          is3D: true,";
        $kod[] = "          width: " . $width . ",";
        $kod[] = "          height: " . $height . ",";
        $kod[] = "          backgroundColor: 'transparent',";
        $kod[] = "          legend: {position: 'none'},";
        $kod[] = "          chartArea:{height:\"100%\"}, ";
        $maxHits = 0;
        if ($printmode == 'percentage') {
            //$kod[] = "          hAxis: { ticks: [0, 100]},";
            $kod[] = "          hAxis: { ticks: [0, " . $maxHits . "]},";
        } else {
            $kod[] = "          hAxis: { ticks: [0, " . $maxHits . "]},";
        }
        $kod[] = "          pieSliceText: '" . $printmode . "',";
        $kod[] = "        };";
        $kod[] = "";

        $kod[] = "        var chart = new google.visualization.BarChart(document.getElementById('" . $area . "'));";
        $kod[] = "        chart.draw(data, options);";
        $kod[] = "      }";
        $kod[] = "    </script>";
        return implode("\n", $kod);
    }

    static public function GeneratePollOutputForColumnChart($oPoll, $area, $width = 270, $height = 180, $legend = 'none') {
        $kod = array();
        $kod[] = "<script type=\"text/javascript\">";
        $kod[] = "      google.load(\"visualization\", \"1\", {packages:[\"corechart\"], callback:drawChart});";
        $kod[] = "      google.setOnLoadCallback(drawChart);";
        $kod[] = "      function drawChart() {";
        $kod[] = "        var data = google.visualization.arrayToDataTable([";
        $printmode = 'label';
        switch ($oPoll->results_type) {
            case 0 : $printmode = 'percentage';
                break;
            case 1 : $printmode = 'value';
                break;
            case 2 : $printmode = 'label';
                break;
        }
        $percText = ($printmode == 'percentage') ? __(' in %', GFontsEngine::PLUGIN_SLUG) : "";
        $kod[] = "          ['Answer', 'Votes" . $percText . "'],";
        $answers = GFontsDB::GetAnswersForPoll($oPoll->id);
        $maxHits = 0;
        $sumHits = 0;

        foreach ($answers as $answer) {
            $sumHits += $answer->hits;
        }
        foreach ($answers as $answer) {
            if ($printmode != 'percentage') {
                $kod[] = "          ['" . $answer->answer . "'," . $answer->hits . "],";
            } else {
                if (round(($answer->hits * 100) / $sumHits) > $maxHits) {
                    $maxHits = round(($answer->hits * 100) / $sumHits);
                }
                $kod[] = "          ['" . $answer->answer . "'," . round(($answer->hits * 100) / $sumHits) . "],";
            }
        }
        $kod[] = "        ]);";
        $kod[] = "";
        $kod[] = "        var options = {";
        $kod[] = "          is3D: true,";
        $kod[] = "          width: " . $width . ",";
        $kod[] = "          height: " . $height . ",";
        $kod[] = "          backgroundColor: 'transparent',";
        $kod[] = "          legend: {position: 'none'},";
        $kod[] = "          chartArea:{width:\"100%\"}, ";
        if ($printmode == 'percentage') {
            //$kod[] = "          hAxis: { ticks: [0, 100]},";
            $maxHits = 0;
            $kod[] = "          vAxis: { ticks: [0," . $maxHits . "]},";
        } else {
            $kod[] = "          vAxis: { ticks: [0, " . $maxHits . "]},";
        }
        $kod[] = "          pieSliceText: '" . $printmode . "',";
        $kod[] = "        };";
        $kod[] = "";

        $kod[] = "        var chart = new google.visualization.ColumnChart(document.getElementById('" . $area . "'));";
        $kod[] = "        chart.draw(data, options);";
        $kod[] = "      }";
        $kod[] = "    </script>";
        return implode("\n", $kod);
    }

    static public function PollOutputForShortCode($poll_id, $width, $height, $legend = 'none') {
        $output = "";
        $oPoll = GFontsDB::GetPoll($poll_id);
        if ($oPoll) {
            $client_mode = $oPoll->client_mode;
            $allowed = true;
            $ip = $_SERVER['REMOTE_ADDR'];
            if (isset($_SERVER['HTTP_X_REAL_IP'])) {
                $ip = $_SERVER['HTTP_X_REAL_IP'];
            }

            $allowed = ($oPoll->voting_enabled == 1);
            if ($allowed) {
                $enddate = strtotime($oPoll->voting_end_date);
                $today = time();
                if ($enddate < $today) {
                    $allowed = false;
                }
            }

            if ($client_mode == 0) {
                $w = $_COOKIE;
                if (isset($_COOKIE['poll_vote_' . $poll_id])) {
                    $allowed = false;
                }
            } else {
                $c = GFontsDB::CheckVoteIpForPoll($poll_id, $ip);
                if ($c > 0) {
                    $allowed = false;
                }
            }
            $args['widget_id'] = uniqid();
            if (!$allowed) {
                $output .= $oPoll->title . "<br/>";
                $output .= '<span id="wgarea_' . $args['widget_id'] . '_' . $poll_id . '" style="width: 100%;">';
                $output .= GF_Poll_Output::GeneratePollOutput($oPoll, 'wgarea_' . $args['widget_id'] . '_' . $poll_id, $width, $height, $legend);
                $output .= '</span>';
            } else {

                wp_enqueue_script('gf-poll-service-' . $poll_id, PLUGIN_URL . "js/gf-poll.php?id=" . $poll_id . '&wid=' . $args['widget_id'] . '&width=' . $width . '&height=' . $height . '&legend=' . $legend);
                $trans = array(
                    'noanswer' => GFontsLang::GetTranslation('Please select answer'),
                    'ajaxerror' => GFontsLang::GetTranslation('Some error happened'),
                    'ajaxurl' => admin_url('admin-ajax.php')
                );
                wp_localize_script('gf-poll-service-' . $poll_id, 'objPollServiceTrans', $trans);
                $output .= $oPoll->title . '<br/>';
                $output .= '<span id="wgarea_' . $args['widget_id'] . '_' . $poll_id . '">';
                $answers = GFontsDB::GetAnswersForPoll($poll_id);
                if (is_array($answers)) {
                    $output .= '<span style="text-align: left; float: left;">';
                    foreach ($answers as $answer) {
                        $output .= '<input type="radio" name="poll_' . $args['widget_id'] . '" id="poll_' . $args['widget_id'] . '-' . $answer->id . '" value="' . $answer->id . '" style="-webkit-appearance: radio;"/>&nbsp;<label for="poll_' . $args['widget_id'] . '-' . $answer->id . '">' . stripslashes($answer->answer) . '</label><br/>';
                    }
                    $output .= '</span><br/><br/><center><input type="submit" value="' . __((trim($oPoll->button_title) != '') ? $oPoll->button_title : 'Vote') . '" id="btn_' . $poll_id . '_' . $args['widget_id'] . '"/></center>';
                }
            }
        }
        $output .= '</span>';
        return $output;
    }

    static public function ChartLegendBuilder($legend) {
        $ca_left = 0;
        $ca_top = 0;
        $ca_width = "100%";
        $ca_height = "97%";
        switch($legend) {
            case "top":
                $ca_top = 20;
                break;
            case "bottom":
                $ca_height = "90%";
                break;
            case "left":
                $ca_left = 20;
                break;
        }
        return "          chartArea:{left:\"" . $ca_left . "\",top:\"" . $ca_top . "\",width:\"" . $ca_width . "\",height:\"" . $ca_height . "\"}, ";
    }

}
