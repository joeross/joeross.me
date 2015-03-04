<div id="s1" class="steper">
    <button class="button button-primary button-primary-large" onclick="return CreatedPolls();"><?php _e("Use created poll", GFontsEngine::PLUGIN_SLUG); ?></button>&nbsp;<span class="poll-or"><?php _e("or", GFontsEngine::PLUGIN_SLUG); ?></span>&nbsp;
    <button class="button button-primary button-primary-large" onclick="return NewPollBuilder();"><?php _e("Create new poll", GFontsEngine::PLUGIN_SLUG); ?></button>
</div>
<div id="s2" style="display: none;" class="steper">
    <form method="post">
        <br/>
        <strong><?php _e("Select created and active polls", GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/>
        <select name="gf_poll_id" id="gf_poll_id" style="width: 200px;">
            <option value="0"><?php _e('-- select --', GFontsEngine::PLUGIN_SLUG); ?></option>
            <?php
            $Polls = GFontsDB::GetActivePolls();
            foreach ($Polls as $poll) {
                echo '<option value="' . $poll->id . '">' . $poll->title . '</option>';
            }
            ?>
        </select><br/>
        <strong><?php _e('Poll chart width', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/><input type="text" id="gf_poll_width" value="450" style="width: 200px;"/><br/>
        <strong><?php _e('Poll chart height', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/><input type="text" id="gf_poll_height" value="300" style="width: 200px;"/><br/>
        <br/>
        <strong><?php _e('Poll chart legend (only for Pie and Donut)', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/>
        <select style="width: 200px;" id="gf_poll_legend">
            <option value="none"><?php _e('none', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="left"><?php _e('left', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="right"><?php _e('right', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="top"><?php _e('top', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="bottom"><?php _e('bottom', GFontsEngine::PLUGIN_SLUG); ?></option>
        </select>
        <br/><br/>
        <button class="button button-primary button-primary-large" onclick="return GfGoToStep('s1');"><?php _e('Back to previous step', GFontsEngine::PLUGIN_SLUG); ?></button>
        &nbsp;&nbsp;&nbsp;
        <button class="button button-primary button-primary-large" onclick="return AcceptCreatedPoll();"><?php _e('Use poll', GFontsEngine::PLUGIN_SLUG); ?></button>
    </form>
</div>
<div id="b2" style="display: none;" class="steper">
    <?php 
    $pollname = "";
            $polltitle = "";
            $polltype = "0";
            $voting_end_date = date("Y-m-d", mktime(0, 0, 0, date("m") + 1, date("d"), date("Y")));
            $voting_enabled = true;
            $results_type = 0;
            $client_mode = 1; // 0 - cookie, 1 - ip based
            $button_title = 'Vote';
    GFontsEngine::PollFormBuilder($pollname, $polltitle, $polltype, $results_type, $results_type, $voting_end_date, $voting_enabled, $client_mode, $button_title); ?>
    <br/><br/>
    <button class="button button-primary button-primary-large" onclick="return GfGoToStep('s1');"><?php _e('Back to previous step', GFontsEngine::PLUGIN_SLUG); ?></button>
    &nbsp;&nbsp;&nbsp;
    <button class="button button-primary button-primary-large" onclick="return GfGoToAnswers();"><?php _e('Add answers', GFontsEngine::PLUGIN_SLUG); ?></button>
</div>
<div id="b3"  style="display: none;" class="steper">
    <strong><?php _e('Fill poll answers - answer per line', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/>
    <textarea id="gf_new_poll_answers" style="width: 525px; height: 250px;"></textarea>    
    <br/>
        <strong><?php _e('Poll chart width', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/><input type="text" id="gf_new_poll_width" value="600" style="width: 200px;"/><br/>
        <strong><?php _e('Poll chart height', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/><input type="text" id="gf_new_poll_height" value="400" style="width: 200px;"/><br/>
        <br/>
        <strong><?php _e('Poll chart legend (only for Pie and Donut)', GFontsEngine::PLUGIN_SLUG); ?></strong><br/><br/>
        <select style="width: 200px;" id="gf_new_poll_legend">
            <option value="none"><?php _e('none', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="left"><?php _e('left', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="right"><?php _e('right', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="top"><?php _e('top', GFontsEngine::PLUGIN_SLUG); ?></option>
            <option value="bottom"><?php _e('bottom', GFontsEngine::PLUGIN_SLUG); ?></option>
        </select><br/><br/>
    <button class="button button-primary button-primary-large btnHide" onclick="return GfGoToStep('b2');"><?php _e('Back to previous step', GFontsEngine::PLUGIN_SLUG); ?></button>
    &nbsp;&nbsp;&nbsp;
    <button class="button button-primary button-primary-large btnHide" onclick="return CreateNewPollAndAdd();"><?php _e('Create and use this poll', GFontsEngine::PLUGIN_SLUG); ?></button>
    <span id="gf_new_poll_wait" style="display: none;"><?php _e('Please wait... Adding new poll...', GFontsEngine::PLUGIN_SLUG); ?></span>
</div>
