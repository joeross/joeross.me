<?php

class GF_Poll_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'gf_poll_widget', // Base ID
                __('Power Posts Poll Widget', GFontsEngine::PLUGIN_SLUG), array('description' => __('Add poll widget', GFontsEngine::PLUGIN_SLUG),)
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        //$kod[] = "<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>";
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        $poll_id = (!empty($instance['poll_id'])) ? intval($instance['poll_id']) : -1;
        if ($poll_id > 0) {
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

                if (!$allowed) {
                    echo "<div>" . $oPoll->title . "</div>";
                    ?><div id="wgarea_<?php echo $args['widget_id']; ?>_<?php echo $poll_id; ?>"><?php
                    echo GF_Poll_Output::GeneratePollOutput($oPoll, 'wgarea_' . $args['widget_id'] . '_' . $poll_id, $instance['chwidth'], $instance['chheight'], $instance['chlegend']);
                    ?></div><br/><?php
                } else {

                    wp_enqueue_script('gf-poll-service-' . $poll_id, PLUGIN_URL . "js/gf-poll.php?id=" . $poll_id . '&wid=' . $args['widget_id'] . '&width=' . $instance['chwidth'] . '&height=' . $instance['chheight'] . '&legend=' . $instance['chlegend']);
                    $trans = array(
                        'noanswer' => GFontsLang::GetTranslation('Please select answer'),
                        'ajaxerror' => GFontsLang::GetTranslation('Some error happened'),
                        'ajaxurl' => admin_url('admin-ajax.php')
                    );
                    wp_localize_script('gf-poll-service-' . $poll_id, 'objPollServiceTrans', $trans);
                    echo "<div>" . $oPoll->title . "</div>";
                    ?>
                    <div id="wgarea_<?php echo $args['widget_id']; ?>_<?php echo $poll_id; ?>"><?php
                    $answers = GFontsDB::GetAnswersForPoll($poll_id);
                    if (is_array($answers)) {
                        ?>
                            <form method="post" action="#"><?php
                        foreach ($answers as $answer) {
                            ?><input type="radio" name="poll_<?php echo $args['widget_id']; ?>" id="poll_<?php echo $args['widget_id'] . '-' . $answer->id; ?>" value="<?php echo $answer->id; ?>"/>&nbsp;<label for="poll_<?php echo $args['widget_id'] . '-' . $answer->id; ?>"><?php echo stripslashes($answer->answer); ?></label><br/><?php
                        }
                        ?>
                            </form><br/><center><input type="submit" value="<?php _e((trim($oPoll->button_title) != '') ? $oPoll->button_title : 'Vote'); ?>" id="btn_<?php echo $poll_id; ?>_<?php echo $args['widget_id']; ?>"/></center>
                            <?php
                        }
                        ?></div><br/><?php
                    }
                }

        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'text_domain');
        }

        if (isset($instance['poll_id'])) {
            $poll_id = $instance['poll_id'];
        } else {
            $poll_id = -1;
        }

        if (isset($instance['chwidth'])) {
            $chwidth = intval($instance['chwidth']);
        } else {
            $chwidth = 270;
        }

        if (isset($instance['chheight'])) {
            $chheight = intval($instance['chheight']);
        } else {
            $chheight = 220;
        }

        if ($chwidth == 0) {
            $chwidth = 270;
        }

        if ($chheight == 0) {
            $chheight = 220;
        }

        if (isset($instance['chlegend'])) {
            $chlegend = $instance['chlegend'];
        } else {
            $chlegend = 'none';
        }

        $polls = GFontsDB::GetAllPolls();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', GFontsEngine::PLUGIN_SLUG); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            <br/><br/>
            <label for="<?php echo $this->get_field_id('poll_id'); ?>"><?php _e('Select poll:', GFontsEngine::PLUGIN_SLUG); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('poll_id'); ?>" name="<?php echo $this->get_field_name('poll_id'); ?>">
                <option value="-1"><?php _e('-- select --', GFontsEngine::PLUGIN_SLUG); ?></option>
                <?php
                foreach ($polls as $poll) {
                    ?><option value="<?php echo $poll->id; ?>"<?php if ($poll->id == $poll_id)
                    echo " selected"; ?>><?php echo $poll->name; ?></option><?php
            }
            ?>
            </select>
            <br/>
            <br/>
            <label for="<?php echo $this->get_field_id('chwidth'); ?>"><?php _e('Chart width:', GFontsEngine::PLUGIN_SLUG); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('chwidth'); ?>" name="<?php echo $this->get_field_name('chwidth'); ?>" type="text" value="<?php echo esc_attr($chwidth); ?>" />
            <br/>
            <br/>
            <label for="<?php echo $this->get_field_id('chheight'); ?>"><?php _e('Chart height:', GFontsEngine::PLUGIN_SLUG); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('chheight'); ?>" name="<?php echo $this->get_field_name('chheight'); ?>" type="text" value="<?php echo esc_attr($chheight); ?>" />
            <br/>
            <br/>
            <label for="<?php echo $this->get_field_id('chlegend'); ?>"><?php _e('Chart legend (only for Pie and Donut):', GFontsEngine::PLUGIN_SLUG); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('chlegend'); ?>" name="<?php echo $this->get_field_name('chlegend'); ?>">
                <option value="none"<?php if ($chlegend == 'none') { echo ' selected'; } ?>><?php _e('none', GFontsEngine::PLUGIN_SLUG); ?></option>
                <option value="left"<?php if ($chlegend == 'left') { echo ' selected'; } ?>><?php _e('left', GFontsEngine::PLUGIN_SLUG); ?></option>
                <option value="right"<?php if ($chlegend == 'right') { echo ' selected'; } ?>><?php _e('right', GFontsEngine::PLUGIN_SLUG); ?></option>
                <option value="top"<?php if ($chlegend == 'top') { echo ' selected'; } ?>><?php _e('top', GFontsEngine::PLUGIN_SLUG); ?></option>
                <option value="bottom"<?php if ($chlegend == 'bottom') { echo ' selected'; } ?>><?php _e('bottom', GFontsEngine::PLUGIN_SLUG); ?></option>
            </select>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['poll_id'] = (!empty($new_instance['poll_id']) ) ? $new_instance['poll_id'] : -1;
        $instance['chwidth'] = (intval($new_instance['chwidth']) > 0) ? intval($new_instance['chwidth']) : 270;
        $instance['chheight'] = (intval($new_instance['chheight']) > 0) ? intval($new_instance['chheight']) : 220;
        $instance['chlegend'] = (!empty($new_instance['chlegend']) ) ? $new_instance['chlegend'] : 'none';
        return $instance;
    }

}